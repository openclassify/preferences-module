<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePreferences_1_0_0_CreatePreferencesStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePreferences_1_0_0_CreatePreferencesStreams extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'preferences'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'user' => [
            'required' => true
        ],
        'key'  => [
            'required' => true
        ],
        'value'
    ];

}
