<?php namespace Anomaly\PreferencesModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleTag;

/**
 * Class PreferencesTag
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Tag\Preferences
 */
class PreferencesModuleTag extends ModuleTag
{

    /**
     * Get a preference value.
     *
     * @return mixed
     */
    public function get()
    {
        return app('streams.preferences')->get(
            $this->getAttribute('key'),
            $this->getAttribute('default')
        );
    }
}
 
