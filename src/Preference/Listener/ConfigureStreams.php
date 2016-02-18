<?php namespace Anomaly\PreferencesModule\Preference\Listener;

use Anomaly\PreferencesModule\Preference\Listener\Command\SetDatetime;
use Anomaly\PreferencesModule\Preference\Listener\Command\SetLocale;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ConfigureStreams
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\Preference\Listener
 */
class ConfigureStreams
{

    use DispatchesJobs;

    /**
     * Handle the event.
     */
    public function handle()
    {
        $this->dispatch(new SetLocale());
        $this->dispatch(new SetDatetime());
    }
}
