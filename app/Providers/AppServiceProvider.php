<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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

if (!Schema::hasTable('settings')) {
         
        Schema::create('settings', function (Blueprint $table) {
           $table->id();
                    $table->string('name');
                    $table->string('owner');
                    $table->string('activity');
                    $table->string('phone',20)->nullable();
                    $table->string('tax_number')->nullable();
                    $table->string('address')->nullable();
                    $table->string('logo')->nullable()->default('image');
                    $table->string('user')->nullable();
                    $table->timestamps();
                });
            }
        $setting=Setting::first();
        if($setting){
            $logo=$setting->logo;
            $compony_name=$setting->name;
            view()->share('logo', $logo);
            view()->share('compony_name', $compony_name);
        }
       
        Gate::before(function ($user, $ability) {
            return $user->hasRole('owner') ? true : null;
        });
        
        Paginator::useBootstrap();
        DB::listen(function ($query) {
            Log::info($query->sql, $query->bindings);
        });

    }
}
