<?php

namespace App\Providers;

use App\Contracts\Parser;
use App\Contracts\Social;
use App\Services\NewsParserService;
use App\Services\SocialService;
use Contracts\SocialAuth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Services\SocialAuthService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Parser::class, NewsParserService::class);

        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
