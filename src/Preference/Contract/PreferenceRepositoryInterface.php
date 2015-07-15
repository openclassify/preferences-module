<?php namespace Anomaly\PreferencesModule\Preference\Contract;

/**
 * Interface PreferenceRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\PreferenceInterface\Contract
 */
interface PreferenceRepositoryInterface
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
