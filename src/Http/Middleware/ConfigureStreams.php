<?php namespace Anomaly\PreferencesModule\Http\Middleware;

use Anomaly\PreferencesModule\Http\Middleware\Command\SetLocale;
use Closure;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ConfigureStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Http\Middleware
 */
class ConfigureStreams
{

    use DispatchesCommands;

    /**
     * Configure streams using preference values.
     *
     * @param Request  $request
     * @param callable $next
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $this->dispatch(new SetLocale());

        return $next($request);
    }
}
