<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Slide;
use Illuminate\Support\ServiceProvider;

use App\Models\Color;
use App\Models\Style;
use App\Models\Placement;
use App\Models\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $colors = Color::all();
        $styles = Style::all();
        $placements = Placement::all();
        $article = Article::orderBy('id', 'desc')->first();
        $slides = Slide::all();
        $roles = Role::all();


        view()->share(['colors' => $colors,
                       'styles' => $styles,
                       'placements' => $placements,
                       'article' => $article,
                       'slides' => $slides,
                       'roles' => $roles,
                      ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
