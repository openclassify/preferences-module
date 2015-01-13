<?php namespace Anomaly\PreferencesModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class PreferencesModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule
 */
class PreferencesModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\PreferencesModule\Installer\PreferencesFieldInstaller',
        'Anomaly\PreferencesModule\Installer\PreferencesStreamInstaller',
    ];

}
