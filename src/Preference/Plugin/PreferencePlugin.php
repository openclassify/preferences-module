<?php namespace Anomaly\PreferencesModule\Preference\Plugin;

use Anomaly\PreferencesModule\Preference\Plugin\Command\GetPreference;
use Anomaly\PreferencesModule\Preference\Plugin\Command\GetPreferenceValue;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PreferencePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Plugin
 */
class PreferencePlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'preference',
                function ($key) {
                    return $this->dispatch(new GetPreference($key));
                }
            ),
            new \Twig_SimpleFunction(
                'preference_value',
                function ($key) {
                    return $this->dispatch(new GetPreferenceValue($key));
                }
            )
        ];
    }
}
