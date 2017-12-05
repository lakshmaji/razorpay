<?php

/*
|--------------------------------------------------------------------------
| Razorpay class for implementing razorpay API features with laravel 
|--------------------------------------------------------------------------
|
*/
namespace Lakshmaji\Razorpay;

use Exception;


/**
 * Razorpay - A package for razorpay integration with Laravel 
 *
 * @author     lakshmaji 
 * @package    Razorpay
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class Razorpay
{

    /**
     * Razorpay
     *
     * @var     Razorpay\Api\Api
     * @access  private
     * @since   1.0.0
     * @version 1.0.0
     *
     */
	private $api;

    // ------------------------------------------------------------------------


    /**
     * Razorpay class constructor
     *
     * @access  public
     * @param   Razorpay            $api
     * @since   Constructor available since Release 1.0.0
     * @version 1.0.0
     * @author  Lakshmaji 
     *
     */
	public function __construct($api) {
		$this->api = $api;
	}
    
    // ------------------------------------------------------------------------


	/*
	|--------------------------------------------------------------------------
	| Payments
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Get Payment details in Razorpay system
     * OR
     * Capture the payment (update status)
     *
     * @access  public
     * @param   string  $payment_id
     * @param   array   $capture
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getPaymentDetails($payment_id, $capture = []) {
    	$payment = $this->api->payment->fetch($payment_id);
    	if(!!count($capture)) {
    		$payment->capture($capture);
    	}
    	return $payment;
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all payment entries
     *
     * @access  public
     * @param   array   $options
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
	public static function getAllPayments($options = []) {
    	return $this->api->payment->all($options);
    }

    // ------------------------------------------------------------------------


	/*
	|--------------------------------------------------------------------------
	| Orders
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Create Order entry in Razorpay system
     *
     * The generated order id will be used for payment process
     *  
     * @access  public
     * @param   array   $contents
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function createOrder($contents = []) {
		return $this->api->order->create($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns Order entry details in Razorpay system
     *
     * @access  public
     * @param   string   $order_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getOrderDetails($order_id) {
		return $this->api->order->fetch($order_id);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all Order entries in Razorpay system with
     * applied filters
     *
     * @access public
     * @param  array   $contents
     * @return mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getAllOrders($options = []) {
		return $this->api->order->all($options);
    }

    // ------------------------------------------------------------------------


	/*
	|--------------------------------------------------------------------------
	| Refunds
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Create Refund entry in Razorpay system
     *
     * @access  public
     * @param   array   $contents
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function createRefund($contents = []) {
		return $this->api->refund->create($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns Refund entry details in Razorpay system
     *
     * @access  public
     * @param   string   $refund_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getRefundDetails($refund_id) {
		return $this->api->refund->fetch($refund_id);
    }

    // ------------------------------------------------------------------------


	/*
	|--------------------------------------------------------------------------
	| Cards
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Returns a particular card
     *
     * @access  public
     * @param   string   $card_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getCardDetails($card_id) {
		return $this->api->card->fetch($card_id);
    }

    // ------------------------------------------------------------------------



	/*
	|--------------------------------------------------------------------------
	| Customers
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Create Customer entry in Razorpay system
     *
     *  
     * @access  public
     * @param   array   $contents
     * @param   boolean $is_edit
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function addOrUpdateUser($contents = [], $is_edit = false) {
    	if($is_edit)
    		return $this->api->customer->edit($contents);
		return $this->api->customer->create($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns Customer entry details in Razorpay system
     *
     * @access  public
     * @param   string   $customer_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getCustomerDetails($customer_id) {
		return $this->api->customer->fetch($customer_id);
    }

    // ------------------------------------------------------------------------


	/*
	|--------------------------------------------------------------------------
	| Tokens
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Returns a particular token
     *  
     * @access  public
     * @param   string   $token_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getTokenDetails($token_id) {
		return $this->api->customer->token()->fetch($token_id);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all token entries in Razorpay system
     *
     * @access  public
     * @param   array   $options
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getAllTokens($options = []) {
		return $this->api->customer->token()->all($options);
    }

    // ------------------------------------------------------------------------


    /**
     * Delete token entry in Razorpay system with
     * applied filters
     *
     * @access  public
     * @param   string   $token_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function delete($token_id) {
		return $this->api->customer->token()->delete($token_id);
    }

    // ------------------------------------------------------------------------

	/*
	|--------------------------------------------------------------------------
	| Transfers
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Create transfer
     *  
     * @access  public
     * @param   array   $contents
     * @param   string  $payment_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function createTransfer($payment_id, $contents = []) {
		return $this->api->payment->fetch($payment_id)->transfer($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all transfer entries in Razorpay system
     *
     * @access  public
     * @param   array   $options
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getAllTransfers($options = []) {
		return $this->api->transfer->all($options);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all transfers created on a payment
     *
     * @access  public
     * @param   string   $payment_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getAllTransfersById($payment_id) {
		return $this->api->payment->fetch($payment_id)->transfers();
    }

    // ------------------------------------------------------------------------


    /**
     * Reverse or edit transfers by transfer id
     *
     * @access  public
     * @param   string   $transfer_id
     * @param   boolean  $is_edit
     * @param   array    $options
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function editOrReverseTransfer($transfer_id, $is_edit = false, $options = []) {
    	if($is_edit)
    		return $this->api->transfer->fetch($transfer_id)->edit($options);
    	return $this->api->transfer->fetch($transfer_id)->reverse();
    }

    // ------------------------------------------------------------------------

	/*
	|--------------------------------------------------------------------------
	| Payment Links
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Returns all payment links
     *  
     * @access  public
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getAllPaymentLinks() {
		return $this->api->all();
    }

    // ------------------------------------------------------------------------


	/*
	|--------------------------------------------------------------------------
	| Subscriptions
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * Create plan
     *  
     * @access  public
     * @param   array $contents
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function createPlan($contents) {
		return $this->api->plan->create($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns Plan details by Id
     *
     * @access  public
     * @param   string $plan_id
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getPlanDetailsById($plan_id) {
		return $this->api->plan->fetch($plan_id);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all plan entries in Razorpay system
     *
     * @access  public
     * @param   array  $options
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getAllPlans($options) {
		return $this->api->plan->all($options);
    }

    // ------------------------------------------------------------------------


    /**
     * Create subscription on specified plan
     *
     * @access  public
     * @param   array   $contents
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function createSubscription($contents) {
		return $this->api->subscription->create($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Get subscription details by subscription id
     * OR
     * Cancel subscription
     *
     * @access  public
     * @param   string   $subscription_id
     * @param   boolean  $cancel
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function fetchOrCancelSubscription($subscription_id, $cancel = false) {
    	if($cancel)
    		return $this->api->subscription->fetch($subscription_id)->cancel();
    	return $this->api->subscription->fetch($subscription_id);
    }

    // ------------------------------------------------------------------------


    /**
     * Returns all subscriptions
     *
     * @access  public
     * @param   array  $options
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function getSubscriptions($options = []) {
    	return $this->api->subscription->all($options);
    }

    // ------------------------------------------------------------------------


    /**
     * Create Addon
     *  
     * @access  public
     * @param   string $subscription_id
     * @param   array  $contents
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function createAddon($subscription_id, $contents = []) {
		return $this->api->subscription->fetch($subscription_id)->createAddon($contents);
    }

    // ------------------------------------------------------------------------


    /**
     * Get addon details by addon id
     * OR
     * Delete addon
     *
     * @access  public
     * @param   string   $addon_id
     * @param   boolean  $delete
     * @return  mixed 
     * @since   Method available since Release 1.0.0
     * @version 1.0.0
     */
    public static function fetchOrDeleteAddon($addon_id, $delete = false) {
    	if($cancel)
    		return $this->api->addon->fetch($addon_id)->delete();
    	return $this->api->addon->fetch($addon_id);
    }

    // ------------------------------------------------------------------------

    // TODO
    // Payment Links (remaing methods)
    // Invoices
    // Virtual Accounts


}
// end of Razorpay class
// end of file Razorpay.php
