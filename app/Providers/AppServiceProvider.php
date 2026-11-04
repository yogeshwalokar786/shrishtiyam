<?php

namespace App\Providers;

use App\Models\Enquiry;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (file_exists(app_path('helpers.php'))) {
            require_once app_path('helpers.php');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set modern custom pagination views as application defaults
        Paginator::defaultView('partials.admin.pagination');
        Paginator::defaultSimpleView('partials.admin.pagination-simple');

        View::composer('layouts.admin', function ($view) {
            try {
                if (Schema::hasTable('enquiries')) {
                    $view->with('newEnquiriesCount', Enquiry::where('status', 'new')->count());
                } else {
                    $view->with('newEnquiriesCount', 0);
                }
            } catch (\Throwable $e) {
                $view->with('newEnquiriesCount', 0);
            }
        });
    }
}
