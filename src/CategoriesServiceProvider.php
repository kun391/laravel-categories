<?php

namespace Kun\Categories;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Set views path
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'categories');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'categories');

        // // Publish migrations
        $this->publishes([
          __DIR__.'/database' => base_path('database'),
        ], 'migrations');

        $this->publishes([
          __DIR__.'/resources/lang' => base_path('resources/lang/vendor/categories')
        ], 'translations');
        // Publish views
        $this->publishes([
            __DIR__ . '/resources/views' => base_path('resources/views/vendor/categories'),
        ], 'views');

        $this->publishes([
            __DIR__.'/config/category.php' => config_path('category.php'),
        ]);

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/kun-category'),
        ], 'public');

        \View::share('formCategory', \Config::get('category.aliases.form.alias_name'));
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $this->mergeConfigFrom(__DIR__ . '/config/category.php', 'category');
        $providers = \Config::get('category.providers');
        $aliases = \Config::get('category.aliases');
        if (!empty($providers)) {
            foreach ($providers as $provider) {
                $this->app->register($provider);
            }
            if (!empty($aliases)) {
                foreach ($aliases as $alias => $facades) {
                    $loader->alias($facades['alias_name'], $facades['alias']);
                }
            }
        }
    }
}
