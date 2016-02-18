<?php namespace Anomaly\PreferencesModule;

use Anomaly\PreferencesModule\Preference\Command\GetPreferenceValue;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PreferencesModulePlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModulePlugin extends Plugin
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
                'preference_value',
                function ($key) {
                    return $this->dispatch(new GetPreferenceValue($key));
                }
            )
        ];
    }
}
