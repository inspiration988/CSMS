<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Response;

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
        Response::macro('success', function( $data = null) {
            return response()->json([
                'status' => "success",
                'data' => $data,
                'code' => 200
            ]);
        });

        Response::macro('failed', function( $data = null, $code = 500) {
            return response()->json([
                'status' => "failed",
                'data' => $data,
                'code' => $code
            ]);
        });
    }
}
