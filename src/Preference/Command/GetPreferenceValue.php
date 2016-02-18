<?php namespace Anomaly\PreferencesModule\Preference\Command;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetPreferenceValue
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\Preference\Command
 */
class GetPreferenceValue implements SelfHandling
{

    /**
     * The preference key.
     *
     * @var string
     */
    protected $key;

    /**
     * The default value.
     *
     * @var mixed
     */
    protected $default;

    /**
     * Create a new GetPreferenceValue instance.
     *
     * @param      $key
     * @param null $default
     */
    public function __construct($key, $default = null)
    {
        $this->key     = $key;
        $this->default = $default;
    }

    /**
     * Handle the command.
     *
     * @param PreferenceRepositoryInterface $preferences
     * @return mixed
     */
    public function handle(PreferenceRepositoryInterface $preferences)
    {
        return $preferences->value($this->key, $this->default);
    }
}
