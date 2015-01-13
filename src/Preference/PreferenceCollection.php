<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\PreferencesModule\Exception\PreferenceDoesNotExistException;
use Anomaly\Streams\Platform\Entry\EntryCollection;

class PreferenceCollection extends EntryCollection
{

    public function findPreference($addonType, $addonSlug, $key, $userId)
    {
        foreach ($this->items as $item) {

            if (
                $addonType == $item->addon_type and
                $addonSlug == $item->addon_slug and
                $key == $item->key and
                $userId == $item->user_id
            ) {

                return $item;
            }
        }

        throw new PreferenceDoesNotExistException("The preference [{$addonType}.{$addonSlug}::{$key}] does not exist.");
    }
}
 