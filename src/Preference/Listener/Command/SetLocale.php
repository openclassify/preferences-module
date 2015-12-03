<?php namespace Anomaly\PreferencesModule\Preference\Listener\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

/**
 * Class SetLocale
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Listener\Command
 */
class SetLocale implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Application                   $app
     * @param Repository                    $config
     * @param Request                       $request
     * @param PreferenceRepositoryInterface $preferences
     */
    function handle(Application $app, Repository $config, Request $request, PreferenceRepositoryInterface $preferences)
    {
        // Set using admin locale if in admin.
        if ($request->segment(1) === 'admin' && $locale = $preferences->value('streams::admin_locale')) {
            $app->setLocale($locale);
            $config->set('app.locale', $locale);
        }

        // Set using public locale if NOT in admin.
        if (!defined('LOCALE') && $request->segment(1) !== 'admin' && $locale = $preferences->value(
                'streams::public_locale'
            )
        ) {
            $app->setLocale($locale);
            $config->set('app.locale', $locale);
        }
    }
}
