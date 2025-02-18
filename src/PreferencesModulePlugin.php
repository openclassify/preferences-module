<?php namespace Anomaly\PreferencesModule;

use Anomaly\PreferencesModule\Preference\Command\GetPreference;
use Anomaly\PreferencesModule\Preference\Command\GetPreferenceValue;
use Anomaly\PreferencesModule\Preference\Command\GetValueFieldType;
use Anomaly\PreferencesModule\Preference\Contract\PreferenceInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;


/**
 * Class PreferencesModulePlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
                function ($key, $default = null) {
                    return dispatch_now(new GetPreferenceValue($key, $default));
                }
            ),
            new \Twig_SimpleFunction(
                'preference',
                function ($key) {

                    /* @var PreferenceInterface $preference */
                    if (!$preference = dispatch_now(new GetPreference($key))) {
                        return null;
                    }

                    return decorate(dispatch_now(new GetValueFieldType($preference)));
                }
            ),
        ];
    }
}
