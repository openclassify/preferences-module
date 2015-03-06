<?php namespace Anomaly\PreferencesModule;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

/**
 * Class PreferencesModuleEventProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModuleEventProvider extends EventServiceProvider
{

    /**
     * Event listeners.
     *
     * @var array
     */
    protected $listen = [
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded' => [
            'Anomaly\PreferencesModule\Listener\AddPreferencesPlugin',
            'Anomaly\PreferencesModule\Listener\SetLocale'
        ]
    ];

}
