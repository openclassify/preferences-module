<?php namespace Anomaly\PreferencesModule\Preference\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface PreferenceRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\PreferenceInterface\Contract
 */
interface PreferenceRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Get a preference value.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Set a preference value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value);
}
