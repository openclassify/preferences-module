<?php namespace Anomaly\PreferencesModule\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class PreferencesFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Preferences\Module\Installer
 */
class PreferencesFieldInstaller extends FieldInstaller
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