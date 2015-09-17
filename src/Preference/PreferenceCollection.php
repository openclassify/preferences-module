<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class PreferenceCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference
 */
class PreferenceCollection extends EntryCollection
{

    /**
     * Create a new PreferenceCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        /* @var PreferenceInterface $item */
        foreach ($items as $item) {
            $this->items[$item->getKey()] = $item;
        }
    }
}
