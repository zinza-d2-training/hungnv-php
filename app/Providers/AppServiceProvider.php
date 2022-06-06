<?php

namespace App\Providers;

use App\Models\Company;
use App\Observers\CompanyObserver;
use App\Services\UploadFileService;
use App\Services\UploadFileServiceInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UploadFileServiceInterface::class, UploadFileService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe(CompanyObserver::class);
    }
}
