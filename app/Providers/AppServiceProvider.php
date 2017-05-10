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
        $article = Article::orderBy('id', 'desc')->first();


        view()->share(['colors' => $colors,
                       'styles' => $styles,
                       'placements' => $placements,
                       'articles' => $article,
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
