<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePreferences_100_alpha_CreatePreferencesStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePreferences_100_alpha_CreatePreferencesStreams extends Migration
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'slug'   => 'preferences',
        'locked' => true
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'user'  => [
            'required' => true
        ],
        'key'   => [
            'required' => true
        ],
        'value' => []
    ];

}
