<?php namespace Anomaly\PreferencesModule\Preference\Form;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Config\Repository;

/**
 * Class PreferenceFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Form
 */
class PreferenceFormFields
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new PreferenceFormFields instance.
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Return the form fields.
     *
     * @param PreferenceFormBuilder $builder
     */
    public function handle(PreferenceFormBuilder $builder, PreferenceRepositoryInterface $preferences)
    {
        $namespace = $builder->getFormEntry() . '::';

        /**
         * Get the fields from the config system. Sections are
         * optionally defined the same way.
         */
        if (!$fields = $this->config->get($namespace . 'preferences.fields')) {
            $fields = $fields = $this->config->get($namespace . 'preferences', []);
        }

        if ($sections = $this->config->get($namespace . 'preferences.sections')) {
            $builder->setFormOption('sections', $sections);
        }

        /**
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {

            /**
             * Force an array. This is done later
             * too in normalization but we need it now
             * because we are normalizing / guessing our
             * own parameters somewhat.
             */
            if (is_string($field)) {
                $field = [
                    'type' => $field
                ];
            }

            $type = app($field['type']);

            $modifier = $type->getModifier();

            // Make sure we have a config property.
            $field['config'] = array_get($field, 'config', []);

            // Default the label.
            $field['label'] = array_get(
                $field,
                'label',
                $namespace . 'preference.' . $slug . '.label'
            );

            // Default the placeholder.
            $field['config']['placeholder'] = array_get(
                $field['config'],
                'placeholder',
                $namespace . 'preference.' . $slug . '.placeholder'
            );

            // Default the instructions.
            $field['instructions'] = array_get(
                $field,
                'instructions',
                $namespace . 'preference.' . $slug . '.instructions'
            );

            // Get the value defaulting to the default value.
            $field['value'] = $preferences->get($namespace . $slug, array_get($field['config'], 'default_value'));

            // Restore the value with the modifier.
            if ($modifier instanceof FieldTypeModifier) {
                $field['value'] = $modifier->restore($field['value']);
            }
        }

        $builder->setFields($fields);
    }
}
