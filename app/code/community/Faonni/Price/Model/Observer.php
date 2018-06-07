<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_Price
 * @copyright   Copyright (c) 2018 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Faonni_Price_Model_Observer 
{
    /**
     * Round Price helper
     *
     * @var Faonni_Price_Helper_Data
     */
    protected $_helper;
    
    /**
     * Initialize model
     */
    public function __construct() 
    {
        $this->_helper = Mage::helper('faonni_price');
    } 
	
    /**
     * Update Price Precision
     *
     * @param $observer Varien_Event_Observer
     * @return void
     */	
    public function updatePrecision(Varien_Event_Observer $observer) 
	{
		if (!$this->_helper->isEnabled() || $this->_helper->isShowDecimalZero()) {
			return;
		}
		$responseObject = $observer->getEvent()->getResponseObject();
		$config = is_array($responseObject->getAdditionalOptions())
			? $responseObject->getAdditionalOptions()
			: array();
			
		$config['priceFormat'] = $this->_getPriceFormat();
		$responseObject->setAdditionalOptions($config);
    }
	
    /**
     * Retrieve the Price Format array
     *
     * @return array
     */
    protected function _getPriceFormat()
    {
		$priceFormat = Mage::app()->getLocale()->getJsPriceFormat();
		$priceFormat['precision'] = 0;
		$priceFormat['requiredPrecision'] = 0;
		
		return $priceFormat;
    }	
}