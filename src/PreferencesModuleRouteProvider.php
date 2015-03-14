<?php namespace Anomaly\PreferencesModule;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PreferencesModuleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModuleRouteProvider extends RouteServiceProvider
{

    /**
     * Map the system preference routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/preferences',
            'Anomaly\PreferencesModule\Http\Controller\Admin\PreferencesController@edit'
        );
    }
}
