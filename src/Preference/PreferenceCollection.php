<?php namespace Anomaly\PreferencesModule\Preference;

use Illuminate\Support\Collection;

/**
 * Class PreferenceCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\PreferenceInterface
 */
class PreferenceCollection extends Collection
{

    /**
     * Create a new PreferenceCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        foreach ($items as $key => $value) {
            $this->items[substr($key, strpos($key, '::') + 2)] = $value;
        }
    }
}
