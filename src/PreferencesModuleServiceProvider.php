<?php namespace Anomaly\Streams\Addon\Module\Preferences;

use Illuminate\Support\ServiceProvider;
use Anomaly\Streams\Addon\Module\Preferences\Preference\PreferenceModel;
use Anomaly\Streams\Addon\Module\Preferences\Preference\PreferenceService;

/**
 * Class PreferencesModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Preferences
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
        $this->app->register('Anomaly\Streams\Addon\Module\Preferences\Provider\RouteServiceProvider');
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
 
