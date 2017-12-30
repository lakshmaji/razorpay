<?php

namespace Lakshmaji\Razorpay\Providers;

use Illuminate\Support\ServiceProvider;
use Lakshmaji\Razorpay;

/**
 * PaymentServiceProvider
 *
 * @author     lakshmaji 
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class PaymentServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Lakshmaji\Razorpay\Razorpay', function($app) {
            $config = $app->make('config');
            return new Api(config('razorpay.KEY_ID'), config('razorpay.KEY_SECRET'));
        });
    }
}
// end of class PaymentServiceProvider
// end of file PaymentServiceProvider.php