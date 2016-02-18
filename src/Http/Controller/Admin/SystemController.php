<?php namespace Anomaly\PreferencesModule\Http\Controller\Admin;

use Anomaly\PreferencesModule\Preference\Form\PreferenceFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SystemController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\Http\Controller\Admin
 */
class SystemController extends AdminController
{

    /**
     * Return the form for editing preferences.
     *
     * @param PreferenceFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PreferenceFormBuilder $form)
    {
        return $form->render('streams');
    }
}
