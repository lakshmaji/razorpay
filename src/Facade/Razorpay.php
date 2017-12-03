<?php 

namespace Lakshmaji\Razorpay\Facade;

use Illuminate\Support\Facades\Facade;
 
/**
 * Razorpay - Facade to support integration with Laravel framework 
 *
 * @author     lakshmaji 
 * @package    Razorpay
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */ 
class Razorpay extends Facade {
 
    protected static function getFacadeAccessor() { 
    	return 'razorpay'; 
    }
 
}
// end of class Razorpay
// end of file Razorpay.php