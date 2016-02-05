<?php
/*
 * Hipay fullservice SDK
*
* NOTICE OF LICENSE
*
* This source file is subject to the MIT License
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/mit-license.php
*
* @copyright      Copyright (c) 2016 - Hipay
* @license        http://opensource.org/licenses/mit-license.php MIT License
*
*/
namespace Hipay\Fullservice\Gateway\Client;

use Hipay\Fullservice\Gateway\Model\Transaction;
use Hipay\Fullservice\Gateway\Request\Order\OrderRequest;
use Hipay\Fullservice\HTTP\ClientProvider;
use Hipay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use Hipay\Fullservice\Gateway\Model\HostedPaymentPage;
use Hipay\Fullservice\Gateway\Model\Operation;


/**
 * Client interface for all request send to TPP Fullservice.
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface GatewayClientInterface {

	/**
	 * Request a new order
	 * @param OrderRequest $orderRequest
	 * @return Transaction $transaction
	 */
	public function requestNewOrder(OrderRequest $orderRequest);
	
    /**
     * Request Maintenance operation on a transaction
     * Because this api call is simple, we don't use an object request as method parameter
     * 
     * @param string $operationType (capture,refund,cancel,acceptChallenge and denyChallenge)
     * @param float $amount Amount to process
     * @param string $transactionReference Transaction ID related to customer order
     * @return Operation
     */
	public function requestMaintenanceOperation($operationType,$amount,$transactionReference);

    
	/**
	 * Request Hosted Payment Page
	 * @param HostedPaymentPageRequest $hppRequest
	 * @return HostedPaymentPage $hpp
	 */
	public function requestHostedPaymentPage(HostedPaymentPageRequest $hppRequest);
    
	/**
	 * Get Transaction information
	 * 
	 * @param string $operationType
	 * @param float $amount
	 * @param string $transactionReference
	 * @return Operation Operation Model
	 */
	public function requestTransactionInformation();
	
	/**
	 * Return current HTTP client provider
	 * @return ClientProvider The current client provider
	 */
	public function getClientProvider();

}