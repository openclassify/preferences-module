<?php namespace Anomaly\PreferencesModule\Preference\Listener;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;

/**
 * Class ConfigureSystem
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\Preference\Listener
 */
class ConfigureSystem
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The preferences repository.
     *
     * @var PreferenceRepositoryInterface
     */
    protected $preferences;

    /**
     * Create a new ConfigureSystem instance.
     *
     * @param PreferenceRepositoryInterface $preferences
     * @param Repository                    $config
     */
    public function __construct(PreferenceRepositoryInterface $preferences, Repository $config)
    {
        $this->config = $config;
        $this->preferences = $preferences;
    }


    /**
     * Handle the event.
     */
    public function handle()
    {
        $this->config->set(
            'app.timezone',
            $this->preferences->value('streams::timezone', $this->config->get('app.timezone'))
        );

        $this->config->set(
            'streams::system.per_page',
            $this->preferences->value('streams::per_page', $this->config->get('streams::system.per_page'))
        );
    }
}
