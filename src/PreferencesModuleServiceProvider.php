<?php namespace Anomaly\PreferencesModule;

use Illuminate\Support\ServiceProvider;
use Anomaly\PreferencesModule\Preference\PreferenceModel;
use Anomaly\PreferencesModule\Preference\PreferenceService;

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
     * Register the service provider.
     */
    public function register()
    {
        $this->registerServiceProviders();
        $this->registerPreferencesService();
    }

    /**
     * Register the service providers.
     */
    protected function registerServiceProviders()
    {
        $this->app->register('Anomaly\PreferencesModule\Provider\RouteServiceProvider');
    }

    /**
     * Register preferences service.
     */
    protected function registerPreferencesService()
    {
        $this->app->singleton(
            'streams.preferences',
            function () {

                return new PreferenceService(new PreferenceModel());

            }
        );
    }

}
 
