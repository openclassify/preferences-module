<?php namespace Anomaly\PreferencesModule\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Application;

/**
 * Class SetLocale
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Command
 */
class SetLocale implements SelfHandling
{

    /**
     * Configure the application.
     *
     * @param Repository                    $config
     * @param Application                   $application
     * @param PreferenceRepositoryInterface $preferences
     */
    public function handle(Repository $config, Application $application, PreferenceRepositoryInterface $preferences)
    {
        $locale = $preferences->get('streams.locale');

        if ($locale) {
            $config->set('app.locale', $locale);
            $application->setLocale($locale);
        }
    }
}
