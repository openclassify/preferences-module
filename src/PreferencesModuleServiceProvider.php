<?php namespace Anomaly\PreferencesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class PreferencesModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon middleware.
     *
     * @var array
     */
    protected $middleware = [
        'Anomaly\PreferencesModule\Http\Middleware\ConfigureStreams'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/preferences' => 'Anomaly\PreferencesModule\Http\Controller\Admin\PreferencesController@edit'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface' => 'Anomaly\PreferencesModule\Preference\PreferenceRepository'
    ];

}
