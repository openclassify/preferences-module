<?php namespace Anomaly\PreferencesModule\Http\Controller\Admin;

use Anomaly\PreferencesModule\Preference\Form\PreferenceFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class PreferencesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Http\Controller\Admin
 */
class PreferencesController extends AdminController
{

    /**
     * Return the form for editing streams preferences.
     *
     * @param PreferenceFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(PreferenceFormBuilder $form)
    {
        return $form->render('streams');
    }
}
