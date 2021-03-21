<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; 
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function role()
    {
                               //Foreign key  
    return $this->hasOne('App\Role','roleID');
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public static $permissions = [
        'acces-index' => ['1','2'],
        'access-Registerview' => ['1'],
        'access-about' => ['1', '1'],
    ];

    public function boot()
    {

        
        $this->registerPolicies();

        // Roles based authorization

        /*Gate::before(
            function ($user, $ability) {
                if ($user->role ==='admin') {
                    return true;
                }
            }
        );*/
    
        foreach (self::$permissions as $action=> $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->roleID, $roles)) {
                        return true;
                    }
                }
            );
        }


        /*foreach (self::$permissions as $action=> $roles) {
            Gate::define(
                $action,
                
                $user =  User::find(1)->role,
                dd($user),

                function ($user) use ($roles) {

                    if (in_array($user, $roles)) {
                        return true;
                    }
                }
            );
        }*/


   
        /* define user roles


        Gate::define('admin', function($user) {
           return $user->roleID == '1';
        });
       

         Gate::define('canjes', function($user) {
             return $user->roleID == '2';
         });
      

        Gate::define('other', function($user) {
            return $user->roleID == '3';
        }); */

    }
}
