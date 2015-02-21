<?php namespace Anomaly\PreferencesModule\Preference\Contract;

use Anomaly\PreferencesModule\Preference\PreferenceCollection;

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
     * Find a preference by it's key
     * or return a new instance.
     *
     * @param $key
     * @return PreferenceInterface
     */
    public function findOrNew($key);

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

    /**
     * Get all preferences for a namespace.
     *
     * @param $getNamespace
     * @return PreferenceCollection
     */
    public function getAll($namespace);
}
