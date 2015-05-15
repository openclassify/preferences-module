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
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = 'Anomaly\PreferencesModule\Preference\Form\PreferenceFormFields@handle';

    /**
     * The form actions.
     *
     * @var string
     */
    protected $actions = [
        'save'
    ];

    /**
     * The form buttons.
     *
     * @var string
     */
    protected $buttons = [
        'cancel'
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'breadcrumb' => false
    ];

}
