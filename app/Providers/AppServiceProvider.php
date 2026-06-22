<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\CursoPolicy; // Garanta que sua Policy está importada
use Illuminate\Support\Facades\Gate; // A importação correta do Gate

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
        // Registra explicitamente a relação entre o modelo e a policy
        Gate::policy(Curso::class, CursoPolicy::class);
    }

    
}
