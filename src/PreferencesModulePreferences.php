<?php namespace Anomaly\PreferencesModule;

/**
 * Class PreferencesModulePreferences
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModulePreferences extends Preferences
{

    /**
     * Available preferences.
     *
     * @var array
     */
    protected $preferences = [
        'general' => [
            [
                'timezone'    => [
                    'type' => 'select',
                ],
                'date_format' => [
                    'type' => 'text',
                ],
                'time_format' => [
                    'type' => 'text',
                ]
            ],
        ],
    ];

}
 