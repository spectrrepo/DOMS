<?php

namespace App\Providers;

use App\Models\Claim;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Placement;
use App\Models\Role;
use App\Models\Slide;
use App\Models\Style;
use Illuminate\Support\ServiceProvider;
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
        $roles = Role::all()->slice(2)->take(4);
        $numComments = Comment::where('status', '=', 0)->get()->count();
        $numClaims = Claim::where('status', '=', 1)->get()->count();
        $numFeedbacks = Feedback::where('answer', '=', null)->get()->count();
        view()->share([
            'colors' => $colors,
            'styles' => $styles,
            'placements' => $placements,
            'article' => $article,
            'slides' => $slides,
            'roles' => $roles,
            'numComments' => $numComments,
            'numClaims' => $numClaims,
            'numFeedbacks' => $numFeedbacks,
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
