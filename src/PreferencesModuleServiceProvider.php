<?php namespace Anomaly\PreferencesModule;

use Anomaly\PreferencesModule\Command\AddPreferencesPlugin;
use Anomaly\PreferencesModule\Command\SetLocale;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Support\ServiceProvider;

/**
 * Class PreferencesModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModuleServiceProvider extends ServiceProvider
{

    use DispatchesCommands;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->dispatch(new SetLocale());
        $this->dispatch(new AddPreferencesPlugin());
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\PreferencesModule\Preference\PreferenceServiceProvider');
    }
}
