<?php

namespace App\Providers;

use App\Http\Livewire\Dashboard;
use App\Models\ConnectedAccount;
use App\Models\Song;
use App\Policies\ConnectedAccountPolicy;
use App\Policies\DashboardPolicy;
use App\Policies\SongPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ConnectedAccount::class => ConnectedAccountPolicy::class,
        Song::class => SongPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
