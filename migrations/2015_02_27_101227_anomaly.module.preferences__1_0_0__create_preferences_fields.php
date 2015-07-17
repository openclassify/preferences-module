<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePreferences_1_0_0_CreatePreferencesFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePreferences_1_0_0_CreatePreferencesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'user'  => 'anomaly.field_type.user',
        'key'   => 'anomaly.field_type.text',
        'value' => 'anomaly.field_type.textarea'
    ];

}
