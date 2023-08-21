<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
   /*
    Permission akses ke dashboard untuk beberapa role
   */
    public static $permission = [
        'dashboard' => ['admin', 'superadmin'],
        'user-index' => ['admin']
    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

     foreach(self::$permission as $feature => $roles ) {
         Gate::define($feature, function (User $user) use ($roles) {
             if(in_array($user->role, $roles)) {
                return true;
             };
         });
     }

    //    Gate::define('dashboard', function (User $user) {
    //        if ($user->role == 'superadmin') {
    //            return true;
    //        }
    //    });
    }
}
