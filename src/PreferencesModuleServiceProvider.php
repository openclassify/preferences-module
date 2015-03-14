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
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded' => [
            'Anomaly\PreferencesModule\Listener\AddPreferencesPlugin',
            'Anomaly\PreferencesModule\Listener\SetLocale'
        ]
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/preferences' => 'Anomaly\PreferencesModule\Http\Controller\Admin\PreferencesController@edit'
    ];

}
