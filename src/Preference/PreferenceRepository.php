<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceInterface;
use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
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
     * Create a new PreferenceRepositoryInterface instance.
     *
     * @param PreferenceModel $model
     * @param Repository      $config
     */
    public function __construct(PreferenceModel $model, Repository $config, Guard $auth)
    {
        $this->auth   = $auth;
        $this->model  = $model;
        $this->config = $config;
    }

    /**
     * Find a preference by it's key
     * or return a new instance.
     *
     * @param $key
     * @return PreferenceInterface
     */
    public function findOrNew($key)
    {
        $preference = $this->model->where('user_id', $this->auth->id())->where('key', $key)->first();

        if (!$preference) {
            return $this->model->newInstance();
        }

        return $preference;
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
        $preference = $this->model->where('user_id', $this->auth->id())->where('key', $key)->first();

        if (!$preference) {
            return $this->config->get($key, $default);
        }

        return $preference->value;
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
        $preference = $this->model->where('user_id', $this->auth->id())->where('key', $key)->first();

        if (!$preference) {

            $preference = $this->model->newInstance();

            $preference->user_id = $this->auth->id();

            $preference->key = $key;
        }

        $preference->value = $value;

        $preference->save();

        return $this;
    }

    /**
     * Get all preferences for a namespace.
     *
     * @param $getNamespace
     * @return PreferenceCollection
     */
    public function getAll($namespace)
    {
        $preferences = $this->model->where('key', 'LIKE', $namespace . '::%')->get();

        return new PreferenceCollection($preferences->lists('value', 'key'));
    }
}
