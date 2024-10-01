<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }


    public static function slugCheck(string $text, $model, $existingSlug = "")
{
    $slug = Str::slug($text);
    $existingItem = $model::where('slug', $slug);
    
    // Eğer mevcut bir slug varsa, onu hariç tutarak kontrol edin
    if ($existingSlug) {
        $existingItem->where('slug', '!=', $existingSlug);
    }
    
    $existingItem = $existingItem->first();
    
    // Eğer mevcut bir slug varsa, slug'a zaman ekleyin
    if ($existingItem) {
        $slug = $slug . '-' . time();
    }

    return $slug;
}

}
