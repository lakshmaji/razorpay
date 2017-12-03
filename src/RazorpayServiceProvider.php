<?php

namespace Lakshmaji\Razorpay;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;
require_once __DIR__.'/../vendor/autoload.php';

/**
 * The Razorpay Serviceprovider
 *
 * Razorpay - ServicePrivider to support integration with 
 * Laravel framework
 *
 * @author     lakshmaji 
 *             <contributor name> <contributor@your.email>
 * @package    Razorpay
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class RazorpayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/razorpay.php' => config_path('razorpay.php')
        ], 'razorpay');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/config/razorpay.php', 'razorpay');


        if (method_exists(\Illuminate\Foundation\Application::class, 'singleton')) {
            $this->app->singleton('razorpay', function($app) {
                $config = $app->make('config');
                $key = $config->get('razorpay.KEY_ID');
                $secret = $config->get('razorpay.KEY_SECRET');
                $api = new \Razorpay\Api\Api($key, $secret);
                return new Razorpay($api);
            });
        } else {
            $this->app['razorpay'] = $this->app->share(function($app) {
                $config = $app->make('config');
                $key = $config->get('razorpay.KEY_ID');
                $secret = $config->get('razorpay.KEY_SECRET');
                $api = new \Razorpay\Api\Api($key, $secret);
                return new Razorpay($api);
            });
        }

    }

}
// end of RazorpayServiceProvider class
// end of file RazorpayServiceProvider.php
