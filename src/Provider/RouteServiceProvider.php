<?php namespace Anomaly\PreferencesModule\Provider;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controllers to scan for route annotations.
     *
     * @var array
     */
    protected $scan = [];

    /**
     * All of the module's route middleware keys.
     *
     * @var array
     */
    protected $middleware = [];

    /**
     * Called before routes are registered.
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function before()
    {
        //
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->registerPreferencesRoutes();
    }

    protected function registerPreferencesRoutes()
    {
        get('admin/preferences', 'Anomaly\PreferencesModule\Http\Admin\PreferencesController@index');
    }
}
 