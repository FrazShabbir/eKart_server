<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Service;
use App\Models\Industry;
use App\Models\Region;
use App\Models\HomeText;
use App\Models\Option;
use App\Models\Project;
use App\Models\ReportIssue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $services = Service::get();
        $projectTypes = Project::where('status',1)->get();
        $industries = Industry::get();
        $regions = Region::get();
        $option = Option::first();
        $reportIssue = ReportIssue::count();
        $logo = HomeText::select('logo','footerContent')->first();
        View::share(compact('services', 'industries' ,'regions','logo','projectTypes','reportIssue','option'));
    }
}
