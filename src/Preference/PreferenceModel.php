<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\Streams\Platform\Model\Preferences\PreferencesPreferencesEntryModel;

class PreferenceModel extends PreferencesPreferencesEntryModel
{
    public function newCollection(array $items = [])
    {
        return new PreferenceCollection($items);
    }
}
 