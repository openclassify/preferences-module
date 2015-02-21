<?php namespace Anomaly\PreferencesModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class PreferencesStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Preferences\Module\Installer
 */
class PreferencesStreamInstaller extends StreamInstaller
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
        'user'  => ['required' => true],
        'key'   => ['required' => true],
        'value' => []
    ];

}