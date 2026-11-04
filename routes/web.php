<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientLogoController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Corporate Website Routes
Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/careers', [SiteController::class, 'careers'])->name('careers');
Route::get('/career', [SiteController::class, 'careers'])->name('career');
Route::post('/careers/apply', [SiteController::class, 'submitCareerApplication'])->name('careers.apply');
Route::get('/solutions', [SiteController::class, 'solutions'])->name('solutions');
Route::get('/services', [SiteController::class, 'solutions'])->name('services');

// 5 Dedicated Single Service Static Pages
Route::get('/services/plastic-epr-compliance', [SiteController::class, 'serviceEpr'])->name('service.epr');
Route::get('/services/plastic-neutral-programme', [SiteController::class, 'servicePlasticNeutral'])->name('service.plastic-neutral');
Route::get('/services/esg-csr-projects', [SiteController::class, 'serviceEsgCsr'])->name('service.esg-csr');
Route::get('/services/e-waste-battery-management', [SiteController::class, 'serviceEwasteBattery'])->name('service.ewaste-battery');
Route::get('/services/industrial-agriculture-waste-management', [SiteController::class, 'serviceIndustrialAgriWaste'])->name('service.industrial-agri-waste');

// Dedicated Static Product Pages (4 Core Products)
Route::get('/products', [SiteController::class, 'products'])->name('products');
Route::get('/products/bio-energy-fuel', [SiteController::class, 'productBioEnergy'])->name('product.bio-energy');
Route::get('/products/refuse-derived-fuel', [SiteController::class, 'productRdf'])->name('product.rdf');
Route::get('/products/rhdpe-blow-resin', [SiteController::class, 'productRhdpe'])->name('product.rhdpe');
Route::get('/products/rpp-injection-copolymer', [SiteController::class, 'productRpp'])->name('product.rpp');

Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [SiteController::class, 'blogSingle'])->name('blog.show');
Route::get('/blog-single', [SiteController::class, 'blogSingleFallback'])->name('blog.single');
Route::get('/product-single', function () {
    return view('site.product-single');
})->name('product.single');
Route::get('/service-single', [SiteController::class, 'serviceSingleFallback'])->name('service.single');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [SiteController::class, 'submitContact'])->name('contact.submit');
Route::post('/consultation/submit', [SiteController::class, 'submitConsultation'])->name('consultation.submit');
Route::get('/coming-soon', [SiteController::class, 'comingSoon'])->name('coming-soon');

Route::get('/sitemap.xml', [SitemapController::class, 'showXml'])->name('sitemap.xml');

// Public Policy Pages (Dynamic Slug)
Route::get('/policy/{slug}', [SiteController::class, 'policy'])->name('policy.show');

// Guest Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Admin Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'showProfile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        Route::get('/change-password', [AdminController::class, 'showChangePassword'])->name('change-password');
        Route::post('/change-password', [AdminController::class, 'updatePassword'])->name('update-password');

        // General Settings Management
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

        // Policy Pages Management
        Route::get('/policies', [PolicyController::class, 'index'])->name('policies.index');
        Route::get('/policies/create', [PolicyController::class, 'create'])->name('policies.create');
        Route::post('/policies', [PolicyController::class, 'store'])->name('policies.store');
        Route::get('/policies/{policy}/edit', [PolicyController::class, 'edit'])->name('policies.edit');
        Route::put('/policies/{policy}', [PolicyController::class, 'update'])->name('policies.update');
        Route::delete('/policies/{policy}', [PolicyController::class, 'destroy'])->name('policies.destroy');

        // Client Testimonials Management
        Route::patch('/testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');
        Route::resource('testimonials', TestimonialController::class)->except(['show']);

        // Client Logos Management
        Route::patch('/client-logos/{client_logo}/toggle-status', [ClientLogoController::class, 'toggleStatus'])->name('client-logos.toggle-status');
        Route::resource('client-logos', ClientLogoController::class)->except(['show']);

        // Blog Posts & Blog Categories Management
        Route::resource('blogs', BlogController::class);
        Route::resource('blog-categories', BlogCategoryController::class)->except(['create', 'show', 'edit']);

        // Media Manager Routes
        Route::get('/media', [MediaController::class, 'index'])->name('media.index');
        Route::get('/media/picker', [MediaController::class, 'picker'])->name('media.picker');
        Route::post('/media/picker-upload', [MediaController::class, 'pickerUpload'])->name('media.picker.upload');
        Route::post('/media/upload', [MediaController::class, 'upload'])->name('media.upload');
        Route::get('/media/{medium}/download', [MediaController::class, 'download'])->name('media.download');
        Route::delete('/media/{medium}', [MediaController::class, 'destroy'])->name('media.destroy');

        // Sitemap Generator Routes
        Route::get('/sitemap', [SitemapController::class, 'index'])->name('sitemap.index');
        Route::post('/sitemap/generate', [SitemapController::class, 'generate'])->name('sitemap.generate');
        Route::post('/sitemap/add', [SitemapController::class, 'addUrl'])->name('sitemap.add');
        Route::delete('/sitemap/{id}', [SitemapController::class, 'deleteUrl'])->name('sitemap.delete');
        Route::get('/sitemap/download', [SitemapController::class, 'download'])->name('sitemap.download');

        // Client Enquiries & Consultation Requests
        Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/{id}', [EnquiryController::class, 'show'])->name('enquiries.show');
        Route::patch('/enquiries/{id}/status', [EnquiryController::class, 'updateStatus'])->name('enquiries.status');
        Route::delete('/enquiries/{id}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');
    });
});
