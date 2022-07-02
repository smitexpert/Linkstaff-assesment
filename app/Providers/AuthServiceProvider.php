<?php

namespace App\Providers;

use App\Policies\CreatePostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post', [CreatePostPolicy::class, 'create']);

        if (! $this->app->routesAreCached()) {
            Passport::routes();

            Passport::tokensExpireIn(now()->addDay());
            Passport::refreshTokensExpireIn(now()->addMonth());
            Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        }
    }
}
