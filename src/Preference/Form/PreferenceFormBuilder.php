<?php namespace Anomaly\PreferencesModule\Preference\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PreferenceFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Form
 */
class PreferenceFormBuilder extends FormBuilder
{

    /**
     * No model needed.
     *
     * @var bool
     */
    protected $model = false;

    /**
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = PreferenceFormFields::class;

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'breadcrumb' => false
    ];

}
