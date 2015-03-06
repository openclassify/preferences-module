<?php namespace Anomaly\PreferencesModule\Preference;

use Illuminate\Support\ServiceProvider;

/**
 * Class PreferenceServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference
 */
class PreferenceServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\PreferencesModule\Preference\PreferenceModel',
            'Anomaly\PreferencesModule\Preference\PreferenceModel'
        );

        $this->app->singleton(
            'Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface',
            'Anomaly\PreferencesModule\Preference\PreferenceRepository'
        );

        $this->app->register('Anomaly\PreferencesModule\PreferencesModuleEventProvider');
        $this->app->register('Anomaly\PreferencesModule\Preference\PreferenceRouteProvider');
    }
}
