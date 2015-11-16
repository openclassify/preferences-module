<?php namespace Anomaly\PreferencesModule\Preference\Listener;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Module\Event\ModuleWasUninstalled;

/**
 * Class DeleteModulePreferences
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Listener
 */
class DeleteModulePreferences
{

    /**
     * The settings repository.
     *
     * @var PreferenceRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new DeleteModulePreferences instance.
     *
     * @param PreferenceRepositoryInterface $settings
     */
    public function __construct(PreferenceRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Handle the event.
     *
     * @param ModuleWasUninstalled $event
     */
    public function handle(ModuleWasUninstalled $event)
    {
        $module = $event->getModule();

        foreach ($this->settings->findAllByNamespace($module->getNamespace()) as $setting) {
            $this->settings->delete($setting);
        }
    }
}
