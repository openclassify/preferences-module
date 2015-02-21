<?php namespace Anomaly\PreferencesModule\Preference\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
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
     * The form actions handler.
     *
     * @var string
     */
    protected $actions = [
        'save'
    ];

    /**
     * The form buttons handler.
     *
     * @var string
     */
    protected $buttons = [
        'cancel'
    ];

    /**
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = 'Anomaly\PreferencesModule\Preference\Form\PreferenceFormFields@handle';

    /**
     * Create a new PreferenceFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        /**
         * Set these explicitly so extending forms won't
         * break automation with normal defaulting patterns.
         */
        $form->setOption('data', 'Anomaly\PreferencesModule\Preference\Form\PreferenceFormData@handle');
        $form->setOption('repository', 'Anomaly\PreferencesModule\Preference\Form\PreferenceFormRepository');
        $form->setOption('wrapper_view', 'anomaly.module.preferences::admin/preferences/form/wrapper');

        parent::__construct($form);
    }
}
