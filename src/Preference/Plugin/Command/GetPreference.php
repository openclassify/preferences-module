<?php namespace Anomaly\PreferencesModule\Preference\Plugin\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Support\Decorator;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetPreference
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Plugin\Command
 */
class GetPreference implements SelfHandling
{

    /**
     * The preference key.
     *
     * @var string
     */
    protected $key;

    /**
     * Create a new GetPreference instance.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Handle the command.
     *
     * @param PreferenceRepositoryInterface $preferences
     * @param Decorator                     $decorator
     * @return mixed
     */
    public function handle(PreferenceRepositoryInterface $preferences, Decorator $decorator)
    {
        return $preferences->value($this->key);
    }
}
