<?php namespace Anomaly\PreferencesModule\Http\Controller\Admin;

use Anomaly\PreferencesModule\Preference\Form\PreferenceFormBuilder;
use Anomaly\PreferencesModule\Preference\Table\AddonTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class AddonsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\Http\Controller\Admin
 */
class AddonsController extends AdminController
{

    /**
     * Return an index of addons with preferences.
     *
     * @param AddonTableBuilder $table
     * @param                   $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AddonTableBuilder $table, $type)
    {
        $table->setType($type);

        return $table->render();
    }

    /**
     * Return a form for editing preferences.
     *
     * @param PreferenceFormBuilder $form
     * @param                       $type
     * @param                       $addon
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PreferenceFormBuilder $form, $type, $addon)
    {
        unset($type);

        return $form->render($addon);
    }
}
