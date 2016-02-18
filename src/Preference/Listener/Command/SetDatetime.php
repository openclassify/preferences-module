<?php namespace Anomaly\PreferencesModule\Preference\Listener\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDatetime
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\Preference\Listener\Command
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
            $config->set('app.timezone', $timezone->getValue());
            $config->set('streams::datetime.timezone', $timezone->getValue());
        }

        // Set the date format.
        if ($format = $preferences->get('streams::date_format')) {
            $config->set('streams::datetime.date_format', $format->getValue());
        }

        // Set the time format.
        if ($format = $preferences->get('streams::time_format')) {
            $config->set('streams::datetime.time_format', $format->getValue());
        }
    }
}
