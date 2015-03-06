<?php namespace Anomaly\PreferencesModule\Listener;

use Illuminate\Container\Container;
use TwigBridge\Bridge;

/**
 * Class AddTwigPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Command
 */
class AddTwigPlugin
{

    /**
     * The twig bridge.
     *
     * @var Bridge
     */
    protected $twig;

    /**
     * The services container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new AddTwigPlugin instance.
     *
     * @param Bridge    $twig
     * @param Container $container
     */
    function __construct(Container $container, Bridge $twig)
    {
        $this->twig      = $twig;
        $this->container = $container;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        $this->twig->addExtension($this->container->make('Anomaly\PreferencesModule\PreferencesModulePlugin'));
    }
}
