<?php namespace Anomaly\PreferencesModule\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use TwigBridge\Bridge;

/**
 * Class AddPreferencesPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Command
 */
class AddPreferencesPlugin implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Bridge $twig
     */
    public function handle(Bridge $twig)
    {
        $twig->addExtension('Anomaly\PreferencesModule\PreferencesModulePlugin');
    }
}
