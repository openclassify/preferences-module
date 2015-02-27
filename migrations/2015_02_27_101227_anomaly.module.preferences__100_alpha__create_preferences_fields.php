<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePreferences_100_alpha_CreatePreferencesFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePreferences_100_alpha_CreatePreferencesFields extends Migration
{

    /**
     * Fields to install.
     *
     * @var array
     */
    protected $fields = [
        'user'  => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\UsersModule\User\UserModel'
            ]
        ],
        'key'   => [
            'type' => 'anomaly.field_type.text'
        ],
        'value' => [
            'type' => 'anomaly.field_type.textarea'
        ]
    ];

}
