<?php namespace Anomaly\PreferencesModule;

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

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if (app('Anomaly\Streams\Platform\Application\Application')->isInstalled()) {
            $this->app->make('twig')->addExtension(
                $this->app->make('\Anomaly\PreferencesModule\PreferencesModulePlugin')
            );
        }
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
