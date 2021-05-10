<?php

namespace App\Providers;

use App\Models\Song;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('whereLike', function (string $attribute, string $searchTerm) {
            return $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        });

        Builder::macro('search', function (string $term) {
            $query = Song::withTrashed()->where('isVerified', true)->where(function ($query) use ($term) {
                $query->whereLike('title', $term)
                    ->whereLike('text', $term);
            });
            if(current_user() && !current_user()->isModerator){
                $query->withoutTrashed();
            }
            return $query;
        });
    }
}
