<?php

namespace App\Providers;

use App\Models\Conductores_a;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Http\Request;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Http\Requests\NovaRequest;

use App\Nova\Buses;
use App\Nova\Conductores;
use App\Nova\Rutas;
use App\Nova\User;
use Illuminate\Support\Facades\Route;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            parent::boot();

            Nova::mainMenu(function (Request $request) {
                return [

                    MenuSection::make('Gestiones', [
                        MenuItem::resource(User::class), 
                        MenuItem::externalLink('Rotativos', 'http://ec2-18-118-186-207.us-east-2.compute.amazonaws.com/rotativos'),
                    ])->icon('cog')->collapsable(),

                    MenuSection::make('Mantenedores', [
                        MenuItem::resource(Buses::class), 
                        MenuItem::resource(Conductores::class), 
                        MenuItem::resource(Rutas::class), 
                    ])->icon('cog')->collapsable(),

                    

                ];
            });

            Nova::initialPath('/resources/users');

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();

    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* \Laravel\Nova\Nova::$initialPath = 'rotativos'; */ //update it to any valid nova path
    }
}
