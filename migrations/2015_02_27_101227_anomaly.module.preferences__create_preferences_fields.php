<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePreferencesCreatePreferencesFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModulePreferencesCreatePreferencesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'user'  => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'     => 'lookup',
                'relation' => \Anomaly\UsersModule\User\UserModel::class
            ]
        ],
        'key'   => 'anomaly.field_type.text',
        'value' => 'anomaly.field_type.textarea'
    ];

}
