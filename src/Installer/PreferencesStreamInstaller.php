<?php namespace Anomaly\PreferencesModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class PreferencesStreamInstaller extends StreamInstaller
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'slug'   => 'preferences',
        'locked' => true,
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'addon_type' => [],
        'addon_slug' => [],
        'key'        => [],
        'user'       => [],
        'value'      => [],
    ];
}