<?php namespace Anomaly\PreferencesModule\Preference\Listener;

use Anomaly\PreferencesModule\Preference\Listener\Command\SetDatetime;
use Anomaly\PreferencesModule\Preference\Listener\Command\SetLocale;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ConfigureStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
