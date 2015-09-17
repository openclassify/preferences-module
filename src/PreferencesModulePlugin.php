<?php namespace Anomaly\PreferencesModule;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PreferencesModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModulePlugin extends Plugin
{

    /**
     * The preference repository.
     *
     * @var PreferenceRepositoryInterface
     */
    protected $preferences;

    /**
     * Create a new PreferencesModulePlugin instance.
     *
     * @param PreferenceRepositoryInterface $preferences
     */
    public function __construct(PreferenceRepositoryInterface $preferences)
    {
        $this->preferences = $preferences;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('preferences_get', [$this->preferences, 'get']),
            new \Twig_SimpleFunction('preferences_value', [$this->preferences, 'value'])
        ];
    }
}
