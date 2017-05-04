<?php

namespace App\Providers;

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
        $articles = Article::all();

        view()->share(['colors' => $colors,
                       'styles' => $styles,
                       'placements' => $placements,
                       'articles' => $articles,
                      ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
