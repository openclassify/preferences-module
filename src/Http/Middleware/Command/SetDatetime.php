<?php namespace Anomaly\PreferencesModule\Http\Middleware\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDatetime
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Http\Middleware\Command
 */
class SetDatetime implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                    $config
     * @param PreferenceRepositoryInterface $preferences
     */
    function handle(Repository $config, PreferenceRepositoryInterface $preferences)
    {
        // Set the timezone.
        if ($timezone = $preferences->get('streams::timezone')) {
            $config->set('app.timezone', $timezone);
        }

        // Set the date format.
        if ($format = $preferences->get('streams::date_format')) {
            $config->set('streams::datetime.date_format', $format);
        }

        // Set the time format.
        if ($format = $preferences->get('streams::time_format')) {
            $config->set('streams::datetime.time_format', $format);
        }
    }
}
