<?php namespace Anomaly\PreferencesModule\Preference\Table;

use Anomaly\Streams\Platform\Addon\AddonCollection;

/**
 * Class AddonTableEntries
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Table
 */
class AddonTableEntries
{

    /**
     * Handle the command.
     *
     * @param AddonTableBuilder $builder
     * @param AddonCollection   $addons
     */
    public function handle(AddonTableBuilder $builder, AddonCollection $addons)
    {
        $builder->setTableEntries(
            $addons->{$builder->getType()}->withAnyConfig(['preferences', 'preferences/preferences'])
        );
    }
}
