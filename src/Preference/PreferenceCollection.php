<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\PreferencesModule\Exception\PreferenceDoesNotExistException;

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
 