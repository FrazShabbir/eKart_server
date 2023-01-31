<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers'], function(){

        Route::post('customerLogin', [App\Http\Controllers\Admin\userController::class, 'customerLogin'])->name('customerLogin');
        Route::get('/',['as' => 'homePage', 'uses' => 'frontController@index']);
        Route::get('articles',['as' => 'articles', 'uses' => 'frontController@articles']);
        Route::get('articles/{type}',['as' => 'article.type', 'uses' => 'frontController@articleByType']);
        Route::get('article/detail/{id}',['as' => 'article.detail', 'uses' => 'frontController@articleDetails']);
        Route::get('about-us',['as' => 'aboutUs', 'uses' => 'frontController@aboutUs']);
        Route::get('press-releases',['as' => 'pressReleases', 'uses' => 'frontController@pressReleases']);
        Route::post('about-us',['as' => 'about.connect', 'uses' => 'frontController@aboutConnect']);
        Route::get('our-clients',['as' => 'ourclients', 'uses' => 'frontController@ourclients']);
        Route::get('company-news',['as' => 'companynews', 'uses' => 'frontController@companynews']);
        Route::get('events',['as' => 'events', 'uses' => 'frontController@events']);
        Route::get('password-forgot',[App\Http\Controllers\frontController::class,'forgotPassword'])->name('userPasswordForgot');
        Route::get('contact',['as' => 'contact', 'uses' => 'frontController@contact']);
        Route::post('contact-submit',['as' => 'postQuery', 'uses' => 'frontController@contactSubmit']);
        Route::post('user-registration', [App\Http\Controllers\Admin\userController::class, 'registration'])->name('registerProcess');
        Route::get('terms-conditions',['as' => 'termsConditions', 'uses' => 'frontController@termsConditions']);
        Route::get('privacy',['as' => 'privacy', 'uses' => 'frontController@privacy']);
        Route::get('disclaimer',['as' => 'disclaimer', 'uses' => 'frontController@disclaimer']);
        Route::get('legal',['as' => 'legal', 'uses' => 'frontController@legal']);
        Route::get('accessibilitys',['as' => 'accessibilitys', 'uses' => 'frontController@accessibilitys']);
        Route::get('industries', [App\Http\Controllers\frontReportController::class, 'industryTemplate'])->name('industry.template');
        Route::get('industry/report/{id}', [App\Http\Controllers\frontReportController::class, 'reportByIndustry'])->name('industry.template.report'); // Industry Report

        Route::get('sub-industry/{id}', [App\Http\Controllers\frontReportController::class, 'subIndustryTemplate'])->name('sub.industry.template');
        Route::get('sub-industry/template/{id}', [App\Http\Controllers\frontReportController::class, 'reportBySubIndustry'])->name('sub.industry.template.report');
        Route::get('sub-industry/report/{id}', [App\Http\Controllers\frontReportController::class, 'singleReport'])->name('report-details');

        Route::get('services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services.index');
        Route::get('service/reports/{id}', [App\Http\Controllers\ServicesController::class, 'report'])->name('front-reports');
        Route::get('service/report/view/{id}', [App\Http\Controllers\ServicesController::class, 'reportView'])->name('service.report.view');

        // Route::get('services', [App\Http\Controllers\frontReportController::class, 'serviceTemplate'])->name('service.template');


        Route::get('sub/service/template/{id}', [App\Http\Controllers\frontReportController::class, 'subServiceTemplate'])->name('service.sub.template');
        // Route::get('service/template/{id}', [App\Http\Controllers\frontReportController::class, 'serviceReport'])->name('front-reports');

        Route::get('regions', [App\Http\Controllers\frontReportController::class, 'regionTemplate'])->name('region.template');
        Route::get('regions/{country}/countries', [App\Http\Controllers\frontReportController::class, 'countryTemplate'])->name('country.template');
        Route::get('country/{country}/report', [App\Http\Controllers\frontReportController::class, 'countryTemplateReport'])->name('country.template.report');
        Route::get('regions/template/report/{id}', [App\Http\Controllers\frontReportController::class, 'reportByRregion'])->name('region.report');

        Route::get('report/region/{id}', [App\Http\Controllers\frontReportController::class, 'regionReport'])->name('region-report');// Region Repor
       // Route::get('single/report/{id}', [App\Http\Controllers\frontReportController::class, 'singleReport'])->name('report-details');
     //   Route::get('region/template', [App\Http\Controllers\frontReportController::class, 'regionTemplate'])->name('region.temp');
        Route::post('loginProcess', [App\Http\Controllers\Admin\userController::class, 'loginProcess'])->name('loginProcess');
        Route::get('cart', [App\Http\Controllers\cartController::class, 'index'])->name('cart.index');
        Route::get('cart/category', [App\Http\Controllers\cartController::class, 'category'])->name('cart.category');
        Route::post('cart/report', [App\Http\Controllers\cartController::class, 'store'])->name('cart.store');
        Route::post('cart/category', [App\Http\Controllers\cartController::class, 'store_category'])->name('cart.category.store');
        Route::get('emptycart', [App\Http\Controllers\cartController::class, 'empty'])->name('cart.empty');
        Route::post('remove/item', [App\Http\Controllers\cartController::class, 'removeItem'])->name('cartItem.remove');
        Route::post('checkout', [App\Http\Controllers\checkoutController::class, 'process'])->name('checkOut');
        Route::get('confirm', [App\Http\Controllers\checkoutController::class, 'confirmOrder'])->name('confirmOrder');
        Route::post('store/log', [App\Http\Controllers\frontReportController::class, 'StoreLog'])->name('store.log');


});

Route::post('/user/profile/update', [

    'uses' => 'UserController@update_profile',
    'as' => 'update.profile'
]);




Route::group(['as'=> 'customer.','prefix'=>'customer','middleware' => 'auth','namespace'=>'App\Http\Controllers\Customer'], function () {

    Route::get('dashboard',     ['as' => 'dashboard','uses' => 'userController@dashboard']);
    Route::get('profile',       ['as' => 'profile','uses' => 'userController@profile']);
    Route::get('work',          ['as' => 'work','uses' => 'userController@work']);
    Route::get('work/add',      ['as' => 'work.add','uses' => 'userController@workAdd']);
    Route::get('orders',        ['as' => 'orders','uses' => 'userController@orders']);
    Route::get('profile/edit',  ['as' => 'profile.edit','uses' => 'userController@editProfile']);
    Route::get('notification',  ['as' => 'notification','uses' => 'userController@notification']);
    Route::get('invoice/{id}',  ['as' => 'invoice','uses' => 'userController@invoice']);
    Route::post('profile/update',  ['as' => 'profile.update','uses' => 'userController@profileUpdate']);
    Route::get('customer/orderDetail/{id}',  ['as' => 'orderDetail','uses' => 'userController@orderDetails']);
    Route::get('customer/report/info/{id}',  ['as' => 'report.info','uses' => 'userController@reportInfo']);
    Route::get('customer/rise/issue/{id}',  ['as' => 'rise.issue','uses' => 'userController@riseIssue']);
    Route::post('customer/rise/issue',  ['as' => 'report.issue.create','uses' => 'userController@storeIssue']);



});


Route::group(['as'=> 'admin.','prefix'=>'admin','middleware' => 'auth', 'namespace'=>'App\Http\Controllers\Admin'], function () {
    Route::get('dashboard',         ['as' => 'dashboard','uses' => 'userController@adminDashboard']);
    Route::get('role',              ['as' => 'roles','uses' => 'roleController@index']);
    Route::post('role/create',       ['as' => 'role.create','uses' => 'roleController@create']);
    Route::post('role/update',       ['as' => 'role.update','uses' => 'roleController@update']);
    Route::get('profile',           ['as' => 'profiles','uses' => 'userController@profile']);
    Route::post('profile/update',    ['as' => 'profile.update','uses' => 'userController@profileUpdate']);
    Route::get('home',              ['as' => 'home','uses' => 'homeController@index']);
    Route::get('about',              ['as' => 'about','uses' => 'homeController@about']);
    Route::get('client',              ['as' => 'client','uses' => 'homeController@client']);
    Route::get('press',              ['as' => 'press','uses' => 'homeController@press']);
    Route::get('news',              ['as' => 'news','uses' => 'homeController@news']);
    Route::get('event',              ['as' => 'event','uses' => 'homeController@event']);

    Route::get('terms-conditions',   ['as' => 'termsconditions','uses' => 'homeController@termsconditions']);
    Route::get('privacy',            ['as' => 'privacy','uses' => 'homeController@privacy']);
    Route::get('disclaimer',         ['as' => 'disclaimer','uses' => 'homeController@disclaimer']);
    Route::get('legal',              ['as' => 'legal','uses' => 'homeController@legal']);
    Route::get('accessibilitys',    ['as' => 'accessibilitys','uses' => 'homeController@accessibilitys']);


    Route::post('about/update',              ['as' => 'about.update','uses' => 'homeController@aboutUpdate']);
    Route::post('press/update',              ['as' => 'press.update','uses' => 'homeController@pressUpdate']);
    Route::post('client/update',              ['as' => 'client.update','uses' => 'homeController@clientUpdate']);
    Route::post('news/update',              ['as' => 'news.update','uses' => 'homeController@newsUpdate']);
    Route::post('event/update',              ['as' => 'event.update','uses' => 'homeController@eventUpdate']);
    Route::post('home/update',       ['as' => 'home.update','uses' => 'homeController@update']);

    Route::post('terms-conditions/update',              ['as' => 'termsconditions.update','uses' => 'homeController@termsconditionsUpdate']);
    Route::post('privacy/update',                       ['as' => 'privacy.update','uses' => 'homeController@privacyUpdate']);
    Route::post('disclaimer/update',                    ['as' => 'disclaimer.update','uses' => 'homeController@disclaimerUpdate']);
    Route::post('legal/update',                         ['as' => 'legal.update','uses' => 'homeController@legalUpdate']);
    Route::post('accessibilitys/update',              ['as' => 'accessibilitys.update','uses' => 'homeController@accessibilitysUpdate']);


    Route::get('user/register',   ['as' => 'registered.users','uses' => 'userController@registerUser']);
    Route::get('user/pending',   ['as' => 'pending.users','uses' => 'userController@pendingUser']);
    Route::get('user/managers',   ['as' => 'managers','uses' => 'userController@managerUsers']);
    Route::get('user/employee',   ['as' => 'employee','uses' => 'userController@employeeUsers']);
    Route::get('user/customers',   ['as' => 'customers','uses' => 'userController@customerUsers']);
    Route::get('user/create',   ['as' => 'user.create','uses' => 'userController@create']);
    Route::get('user/customer/create',   ['as' => 'customer.create','uses' => 'userController@addNewCustomer']);
    Route::post('user/store',   ['as' => 'user.store','uses' => 'userController@store']);
    Route::post('user/status',   ['as' => 'user.status.update','uses' => 'userController@statusUpdate']);
    Route::get('user/customer/edit/{id}',   ['as' => 'user.customer.edit','uses' => 'userController@customerEdit']);
    Route::post('user/delete',   ['as' => 'user.delete','uses' => 'userController@deleteUser']);
    Route::get('user/edit/{id}',   ['as' => 'user.edit','uses' => 'userController@edit']);
    Route::post('user/update',   ['as' => 'user.update','uses' => 'userController@updateUser']);

    Route::get('enquires',          ['as' => 'enquires','uses' => 'contactController@enquires']);
    Route::post('enquires/delete',   ['as' => 'profile','uses' => 'contactController@delete']);
    Route::post('enquires/deleted',   ['as' => 'delete.enquiry','uses' => 'contactController@delete']);
    Route::get('enquires/about',   ['as' => 'about.enquiry','uses' => 'contactController@enquiryAbout']);
    Route::post('enquires/about/delete',   ['as' => 'about.enquiry.delete','uses' => 'contactController@enquiryDelete']);

    Route::get('projects',           ['as' => 'projects','uses' => 'projectController@index']);
    Route::post('projects/add',      ['as' => 'projects.create','uses' => 'projectController@create']);
    Route::post('projects/update',   ['as' => 'projects.update','uses' => 'projectController@update']);
    Route::post('projects/delete',   ['as' => 'projects.delete','uses' => 'projectController@delete']);

    Route::get('service',           ['as' => 'service','uses' => 'serviceController@index']);
    Route::get('service/template',  ['as' => 'service.template','uses' => 'serviceController@template']);
    Route::post('service/template/update',    ['as' => 'service.template.update','uses' => 'serviceController@templateUpdate']);
    Route::post('service/create',    ['as' => 'service.create','uses' => 'serviceController@create']);
    Route::post('service/update',    ['as' => 'service.update','uses' => 'serviceController@update']);
    Route::post('service/delete',    ['as' => 'service.delete','uses' => 'serviceController@delete']);
    Route::get('service/client',    ['as' => 'service.client','uses' => 'serviceController@clients']);
    Route::post('service/client/create',    ['as' => 'service.client.create','uses' => 'serviceController@clientCreate']);
    Route::post('service/client/update',    ['as' => 'service.client.update','uses' => 'serviceController@clientUpdate']);
    Route::post('service/client/delete',    ['as' => 'service.client.delete','uses' => 'serviceController@clientDelete']);
    Route::get('service/testimonial',    ['as' => 'service.testimonial','uses' => 'serviceController@testimonial']);
    Route::post('service/testimonial/create',    ['as' => 'service.testimonial.create','uses' => 'serviceController@testimonialCreate']);
    Route::post('service/testimonial/update',    ['as' => 'service.testimonial.update','uses' => 'serviceController@testimonialUpdate']);
    Route::post('service/testimonial/delete',    ['as' => 'service.testimonial.delete','uses' => 'serviceController@testimonialDelete']);


    Route::get('industry',           ['as' => 'industry','uses' => 'industryController@index']);
    Route::post('industry/create',    ['as' => 'industry.create','uses' => 'industryController@create']);
    Route::post('industry/update',    ['as' => 'industry.update','uses' => 'industryController@update']);
    Route::post('industry/delete',    ['as' => 'industry.delete','uses' => 'industryController@delete']);

    Route::get('subIndustry',           ['as' => 'subIndustry','uses' => 'industryController@subIndustries']);
    Route::post('subIndustry/create',    ['as' => 'subIndustry.create','uses' => 'industryController@subIndustriesCreate']);
    Route::post('subIndustry/update',    ['as' => 'subIndustry.update','uses' => 'industryController@subIndustriesUpdate']);
    Route::post('subIndustry/delete',    ['as' => 'subIndustry.delete','uses' => 'industryController@subIndustriesDelete']);

    Route::get('industry/template',  ['as' => 'industry.template','uses' => 'industryController@template']);
    Route::post('industry/template/update',    ['as' => 'industry.template.update','uses' => 'industryController@templateUpdate']);


    Route::get('industry/client',            ['as' => 'industry.client','uses' => 'industryController@client']);
    Route::post('industry/client/create',    ['as' => 'industry.client.create','uses' => 'industryController@clientCreate']);
    Route::post('industry/client/update',    ['as' => 'industry.client.update','uses' => 'industryController@clientUpdate']);
    Route::post('industry/client/delete',    ['as' => 'industry.client.delete','uses' => 'industryController@clientDelete']);

    Route::get('industry/testimonial',            ['as' => 'industry.testimonial','uses' => 'industryController@testimonial']);
    Route::post('industry/testimonial/create',    ['as' => 'industry.testimonial.create','uses' => 'industryController@testimonialCreate']);
    Route::post('industry/testimonial/update',    ['as' => 'industry.testimonial.update','uses' => 'industryController@testimonialUpdate']);
    Route::post('industry/testimonial/delete',    ['as' => 'industry.testimonial.delete','uses' => 'industryController@testimonialDelete']);

    Route::get('regions',    ['as' => 'region','uses' => 'regionController@index']);
    Route::post('regions/create',    ['as' => 'region.create','uses' => 'regionController@create']);
    Route::post('regions/update',    ['as' => 'region.update','uses' => 'regionController@update']);
    Route::post('regions/delete',    ['as' => 'region.delete','uses' => 'regionController@delete']);
    Route::get('regions/template',    ['as' => 'regions.template','uses' => 'regionTemplateController@index']);
    Route::post('regions/template/update',    ['as' => 'regions.template.update','uses' => 'regionTemplateController@update']);
    Route::post('regions/template/update',    ['as' => 'regions.template.update','uses' => 'regionTemplateController@update']);
    Route::get('region/client',    ['as' => 'regions.client','uses' => 'regionTemplateController@client']);
    Route::post('region/client/create',    ['as' => 'regions.create','uses' => 'regionTemplateController@createClient']);
    Route::post('region/client/update',    ['as' => 'regions.update','uses' => 'regionTemplateController@updateClient']);
    Route::post('region/client/delete',    ['as' => 'regions.delete','uses' => 'regionTemplateController@deleteClient']);

    Route::get('region/testimonial',    ['as' => 'region.testimonial','uses' => 'regionTemplateController@testimonial']);
    Route::post('region/testimonial/create',    ['as' => 'region.testimonial.create','uses' => 'regionTemplateController@testimonialCreate']);
    Route::post('region/testimonial/update',    ['as' => 'region.testimonial.update','uses' => 'regionTemplateController@testimonialUpdate']);
    Route::post('region/testimonial/delete',    ['as' => 'region.testimonial.delete','uses' => 'regionTemplateController@testimonialDelete']);


    Route::get('country',    ['as' => 'country','uses' => 'regionController@index']);
    Route::post('country/create',    ['as' => 'country.create','uses' => 'regionController@createCountry']);
    Route::post('country/update',    ['as' => 'country.update','uses' => 'regionController@updateCountry']);
    Route::post('country/delete',    ['as' => 'country.delete','uses' => 'regionController@deleteCountry']);
    Route::get('orders',    ['as' => 'orders','uses' => 'orderController@index']);
    Route::get('order/detail/{id}',    ['as' => 'orderDetail','uses' => 'orderController@orderDetails']);
    Route::get('order/report-info/{id}',  ['as' => 'order.info','uses' => 'orderController@reportInfo']);
    Route::get('order/invoice/{id}',  ['as' => 'order.invoice','uses' => 'orderController@invoice']);


    Route::get('reports', [App\Http\Controllers\Admin\reportController::class, 'index'])->name('report');


    Route::get('report/create',     ['as' => 'report.create','uses' => 'reportController@create']);
    Route::post('report/progress/status',     ['as' => 'report.progress','uses' => 'reportController@progressStatus']);
    Route::get('report/issues',     ['as' => 'report.issues','uses' => 'reportController@issues']);
    Route::post('report/issues/submit',     ['as' => 'report.issues.submit','uses' => 'reportController@issuesSubmit']);
    Route::post('report/issues/delete',     ['as' => 'report.issues.delete','uses' => 'reportController@issuesDelete']);
    Route::get('report/article',     ['as' => 'report.article.index','uses' => 'reportController@articleIndex']);
    Route::get('report/article/create',     ['as' => 'report.article.create','uses' => 'reportController@article']);
    Route::post('report/article/save',     ['as' => 'report.article.save','uses' => 'reportController@articleSave']);
    Route::get('report/article/edit/{id}',     ['as' => 'report.article.edit','uses' => 'reportController@articleEdit']);
    Route::post('report/article/update',     ['as' => 'report.article.update','uses' => 'reportController@articleUpdate']);
    Route::post('report/article/delete',     ['as' => 'report.article.delete','uses' => 'reportController@articleDelete']);

    //Route::get('reports/create', [App\Http\Controllers\Admin\reportController::class, 'create'])->name('admin.report.create');
    Route::get('reports/users', [App\Http\Controllers\Admin\reportController::class, 'myreport'])->name('my_reports');
    Route::get('reports/edit/{id}', [App\Http\Controllers\Admin\reportController::class, 'edit'])->name('report.edit');
    Route::post('reports/save', [App\Http\Controllers\Admin\reportController::class, 'save'])->name('report.save');
    Route::post('reports/update', [App\Http\Controllers\Admin\reportController::class, 'update'])->name('report.update');
    Route::post('reports/question/delete', [App\Http\Controllers\Admin\reportController::class, 'questionDelete'])->name('question.delete');
    Route::post('reports/update', [App\Http\Controllers\Admin\reportController::class, 'update'])->name('report.update');
    Route::get('report/user/log',     ['as' => 'report.user.track','uses' => 'reportController@trackUser']);
    Route::post('report/fetch/log',  ['as' => 'fetch.log','uses' => 'reportController@fetchLog']);
    Route::post('report/delete',  ['as' => 'report.delete','uses' => 'reportController@delete']);
    Route::post('profileUpdate', [App\Http\Controllers\Admin\userController::class, 'profileUpdate'])->name('updateProfile');
    Route::get('myOrders', [App\Http\Controllers\Admin\orderController::class, 'myorders'])->name('myOrders');
    Route::get('invoice/{id}', [App\Http\Controllers\Admin\orderController::class, 'invoice'])->name('invoice');
    Route::get('find-subindustries', [App\Http\Controllers\Admin\industryController::class, 'getSub'])->name('report.subIndustry');
    Route::get('find-countries', [App\Http\Controllers\Admin\industryController::class, 'getCountry'])->name('report.countries');
    Route::post('reports/status/update', [App\Http\Controllers\Admin\reportController::class, 'status'])->name('update.report.status');
    Route::get('contact/setting',['as' => 'contact.setting','uses' => 'optionController@index']);
    Route::post('contact/setting/update',['as' => 'contact.setting.update','uses' => 'optionController@update']);


    //// Added


    // Route::get('home', [App\Http\Controllers\homePageController::class, 'index'])->name('option');
    // Route::post('homePage/update', [App\Http\Controllers\homePageController::class, 'update'])->name('homePageTextUpdate');
    // Route::get('contactEnquires', [App\Http\Controllers\Admin\contactController::class, 'allquries'])->name('contact-enquires');
    // Route::post('queryDel', [App\Http\Controllers\contactController::class, 'delete'])->name('delete.que');

    // Route::get('projectTypes', [App\Http\Controllers\Admin\projectController::class, 'index'])->name('project-Types');
    // Route::post('projects/add', [App\Http\Controllers\Admin\projectController::class, 'create'])->name('createProjectType');
    // Route::post('projects/update', [App\Http\Controllers\Admin\projectController::class, 'update'])->name('projectType.update');
    // Route::post('projects/delete', [App\Http\Controllers\Admin\projectController::class, 'delete'])->name('projectType.delete');

    // Route::get('services', [App\Http\Controllers\Admin\serviceController::class, 'index'])->name('services-Types');
    // Route::get('services/template', [App\Http\Controllers\Admin\serviceController::class, 'serviceTemplate'])->name('services.template');
    // Route::post('services/template/update', [App\Http\Controllers\Admin\serviceController::class, 'serviceTemplateUpdate'])->name('services.template.update');
    // Route::post('services/add', [App\Http\Controllers\Admin\serviceController::class, 'create'])->name('createServiceType');
    // Route::post('services/delete', [App\Http\Controllers\Admin\serviceController::class, 'delete'])->name('service.delete');
    // Route::post('services/update', [App\Http\Controllers\Admin\serviceController::class, 'update'])->name('serviceType.update');
    // Route::get('services/clients', [App\Http\Controllers\Admin\serviceController::class, 'clients'])->name('services.clients');


    // Route::post('services/client/add', [App\Http\Controllers\Admin\serviceController::class, 'clientsAdd'])->name('services.client.add');
    // Route::post('services/client/update', [App\Http\Controllers\Admin\serviceController::class, 'clientsUpdate'])->name('services.client.update');
    // Route::post('services/client/delete', [App\Http\Controllers\Admin\serviceController::class, 'clientsDelete'])->name('service.client.delete');

    // Route::get('services/testimonial', [App\Http\Controllers\Admin\serviceController::class, 'testimonial'])->name('service.testimonial');
    // Route::post('services/testimonial/save', [App\Http\Controllers\Admin\serviceController::class, 'AddTestimonial'])->name('services.add.testimonial');
    // Route::post('services/testimonial/update', [App\Http\Controllers\Admin\serviceController::class, 'UpdateTestimonial'])->name('services.testimonial.update');
    // Route::post('services/testimonial/delete', [App\Http\Controllers\Admin\serviceController::class, 'testimonialDelete'])->name('services.testimonial.delete');



    // Route::get('industry', [App\Http\Controllers\Admin\industryController::class, 'index'])->name('industries-types');
    // Route::post('industry/add', [App\Http\Controllers\Admin\industryController::class, 'create'])->name('createindustryType');
    // Route::post('industry/update', [App\Http\Controllers\Admin\industryController::class, 'update'])->name('industryType.update');
    // Route::post('industry/delete', [App\Http\Controllers\Admin\industryController::class, 'delete'])->name('industryType.delete');
    // Route::get('subIndustry', [App\Http\Controllers\Admin\industryController::class, 'sub_industries'])->name('subindustries');
    // Route::post('subIndustry/add', [App\Http\Controllers\Admin\industryController::class, 'createsubIndustry'])->name('createsubindustryType');
    // Route::post('subIndustry/delete', [App\Http\Controllers\Admin\industryController::class, 'subDelete'])->name('subindustry.delete');
    // Route::post('subIndustry/update', [App\Http\Controllers\Admin\industryController::class, 'subUpdate'])->name('subindustry.update');

    // Route::get('industry/template', [App\Http\Controllers\industryTemplateController::class, 'index'])->name('industry.template');
    // Route::post('industry/template/update', [App\Http\Controllers\industryTemplateController::class, 'update'])->name('industry.template.update');

    // Route::get('industry/client', [App\Http\Controllers\industryTemplateController::class, 'client'])->name('industry.client');
    // Route::post('industry/client/create', [App\Http\Controllers\industryTemplateController::class, 'clientAdd'])->name('industry.client.add');
    // Route::post('industry/client/update', [App\Http\Controllers\industryTemplateController::class, 'clientUpdate'])->name('industry.client.update');
    // Route::post('industry/client/delete', [App\Http\Controllers\industryTemplateController::class, 'clientDelete'])->name('industry.client.delete');

    // Route::get('industry/testimonial', [App\Http\Controllers\industryTemplateController::class, 'testimonial'])->name('industry.testimonial');
    // Route::post('industry/testimonial/create', [App\Http\Controllers\industryTemplateController::class, 'testimonialAdd'])->name('industry.testimonial.create');
    // Route::post('industry/testimonial/update', [App\Http\Controllers\industryTemplateController::class, 'testimonialUpdate'])->name('industry.testimonial.update');
    // Route::post('industry/testimonial/delete', [App\Http\Controllers\industryTemplateController::class, 'testimonialDelete'])->name('industry.testimonial.delete');

    // Route::get('regions', [App\Http\Controllers\Admin\regionController::class, 'index'])->name('regions');
    // Route::post('regions/update', [App\Http\Controllers\Admin\regionController::class, 'update'])->name('region.update');
    // Route::post('regionsCreate', [App\Http\Controllers\Admin\regionController::class,  'create'])->name('createRegion');

    // Route::post('regions/delete', [App\Http\Controllers\Admin\regionController::class, 'deleteRegion'])->name('region.delete');

    // Route::post('countryCreate', [App\Http\Controllers\Admin\regionController::class,  'createCountry'])->name('creatCountry');
    // Route::post('countryUpdate', [App\Http\Controllers\Admin\regionController::class,  'updateCountry'])->name('country.update');
    // Route::post('countryDelete', [App\Http\Controllers\Admin\regionController::class,  'deleteCountry'])->name('country.delete');


    // Route::get('region/template', [App\Http\Controllers\Admin\regionTemplateController::class, 'index'])->name('region.template');
    // Route::post('region/template/update', [App\Http\Controllers\Admin\regionTemplateController::class, 'update'])->name('region.template.update');

    // Route::get('region/client', [App\Http\Controllers\Admin\regionTemplateController::class, 'client'])->name('region.client');
    // Route::post('region/client/create', [App\Http\Controllers\Admin\regionTemplateController::class, 'clientAdd'])->name('region.client.add');
    // Route::post('region/client/update', [App\Http\Controllers\Admin\regionTemplateController::class, 'clientUpdate'])->name('region.client.update');
    // Route::post('region/client/delete', [App\Http\Controllers\Admin\regionTemplateController::class, 'clientDelete'])->name('region.client.delete');




    // Route::get('region/testimonial', [App\Http\Controllers\Admin\regionTemplateController::class, 'testimonial'])->name('region.testimonial');
    // Route::post('region/testimonial/create', [App\Http\Controllers\Admin\regionTemplateController::class, 'testimonialAdd'])->name('region.testimonial.create');
    // Route::post('region/testimonial/update', [App\Http\Controllers\Admin\regionTemplateController::class, 'testimonialUpdate'])->name('region.testimonial.update');
    // Route::post('region/testimonial/delete', [App\Http\Controllers\Admin\regionTemplateController::class, 'testimonialDelete'])->name('region.testimonial.delete');







});







require __DIR__.'/auth.php';
