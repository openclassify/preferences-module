<?php namespace Anomaly\PreferencesModule\Listener;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;

/**
 * Class SetLocale
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Command
 */
class SetLocale
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $application;

    /**
     * The preferences repository.
     *
     * @var PreferenceRepositoryInterface
     */
    protected $preferences;

    /**
     * Create a new SetLocale instance.
     *
     * @param Repository                    $config
     * @param Application                   $application
     * @param PreferenceRepositoryInterface $preferences
     */
    public function __construct(
        Repository $config,
        Application $application,
        PreferenceRepositoryInterface $preferences
    ) {
        $this->config      = $config;
        $this->application = $application;
        $this->preferences = $preferences;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        if ($locale = $this->preferences->get('streams::locale')) {
            $this->application->setLocale($locale);
            $this->config->set('app.locale', $locale);
        }
    }
}
