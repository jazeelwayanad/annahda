<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use ImageKit\ImageKit;
use League\Flysystem\Filesystem;
use TaffoVelikoff\ImageKitAdapter\ImagekitAdapter;
use App\Models;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ImagekitAdapter::class, function ($app, $config) {
            return new ImagekitAdapter(
                new ImageKit(
                    config('filesystems.disks.imagekit.public_key'),
                    config('filesystems.disks.imagekit.private_key'),
                    config('filesystems.disks.imagekit.endpoint_url')
                )
            );
        });

        Storage::extend('imagekit', function ($app, $config) {
            $adapter = $app->make(ImagekitAdapter::class);
            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasAnyRole(['super-admin','developer']) ? true : null;
        });

        $categories = Models\Category::all();
        $pages = Models\Page::all();

        if(count($categories)){
            view()->composer('components.header', function ($view) use ($categories) {
                $view->with([
                    'header_categories' => $categories,
                ]);
            });
            view()->composer('components.footer', function ($view) use ($categories, $pages) {
                $view->with([
                    'footer_categories' => $categories,
                    'footer_pages' => $pages,
                ]);
            });
        }
    }
}
