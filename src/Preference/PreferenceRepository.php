<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Auth\Guard;
use Illuminate\Config\Repository;

/**
 * Class PreferenceRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\PreferenceInterface
 */
class PreferenceRepository implements PreferenceRepositoryInterface
{

    /**
     * The authentication guard.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The preference model.
     *
     * @var PreferenceModel
     */
    protected $model;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The field type collection.
     *
     * @var FieldTypeCollection
     */
    protected $fieldTypes;

    /**
     * Create a new PreferenceRepositoryInterface instance.
     *
     * @param FieldTypeCollection $fieldTypes
     * @param PreferenceModel     $model
     * @param Repository          $config
     * @param Guard               $auth
     */
    public function __construct(
        FieldTypeCollection $fieldTypes,
        PreferenceModel $model,
        Repository $config,
        Guard $auth
    ) {
        $this->auth       = $auth;
        $this->model      = $model;
        $this->config     = $config;
        $this->fieldTypes = $fieldTypes;
    }

    /**
     * Get a preference value.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        /**
         * First get the preference value from
         * the database or return the default.
         */
        $preference = $this->model->where('user_id', $this->auth->id())->where('key', $key)->first();

        if (!$preference) {
            return $default;
        }

        /**
         * Next try and find the field definition
         * from the preferences.php configuration file.
         */
        if (!$field = config(str_replace('::', '::preferences/preferences.', $key))) {
            $field = config(str_replace('::', '::preferences.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        /**
         * Try and get the field type that
         * the preference uses. If no exists then
         * just return the value as is.
         */
        $type = $this->fieldTypes->get(array_get($field, 'type'));

        if (!$type instanceof FieldType) {
            return $preference->value;
        }

        /**
         * If the type CAN be determined then
         * get the modifier and restore the value
         * before returning it.
         */
        $modifier = $type->getModifier();

        return $modifier->restore($preference->value);
    }

    /**
     * Set a preference value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        /**
         * First get the entry from the database
         * if one exists. We'll want to set the value
         * on that rather than a duplicate entry.
         *
         * If no entry is found simply spin up a new
         * instance and use that.
         */
        $preference = $this->model->where('key', $key)->first();

        if (!$preference) {

            $preference = $this->model->newInstance();

            $preference->user_id = $this->auth->id();

            $preference->key = $key;
        }

        /**
         * Next try and find the field definition
         * from the preferences.php configuration file.
         */
        if (!$field = config(str_replace('::', '::preferences/preferences.', $key))) {
            $field = config(str_replace('::', '::preferences.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        /**
         * Try and get the field type that
         * the preference uses. If no exists then
         * just save the value as it is. If a
         * field type is found then modify the
         * value for storage in the database.
         */
        $type = $this->fieldTypes->get(array_get($field, 'type'));

        if ($type instanceof FieldType) {

            $modifier = $type->getModifier();

            if ($modifier instanceof FieldTypeModifier) {
                $value = $modifier->modify($value);
            }
        }

        $preference->value = $value;

        $preference->save();

        return $this;
    }
}
