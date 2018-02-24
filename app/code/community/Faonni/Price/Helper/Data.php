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
class Faonni_Price_Helper_Data 
	extends Mage_Core_Helper_Abstract
{
    /**
     * Enabled Config Path
     */
    const XML_ROUND_ENABLED = 'currency/price/enabled';
    
    /**
     * Subtract Config Path
     */
    const XML_ROUND_SUBTRACT = 'currency/price/subtract';    
    
    /**
     * Rounding Base Price Config Path
     */
    const XML_ROUND_BASE_PRICE = 'currency/price/base_price';  
     
    /**
     * Rounding Type Config Path
     */
    const XML_ROUND_TYPE = 'currency/price/type';  
      
    /**
     * Rounding Subtract Amount Config Path
     */
    const XML_ROUND_AMOUNT = 'currency/price/amount';  
      
    /**
     * Rounding Precision Config Path
     */
    const XML_ROUND_PRECISION = 'currency/price/precision';  
      
    /**
     * Show Decimal Zeros Config Path
     */
    const XML_DECIMAL_ZERO = 'currency/price/show_decimal_zero';
         
    /**
     * Replace Zero Price Config Path
     */
    const XML_ZERO_PRICE = 'currency/price/replace_zero_price';
         
    /**
     * Text Of Replace Config Path
     */
    const XML_ZERO_PRICE_TEXT = 'currency/price/zero_price_text'; 
	
    /**
     * Swedish Rounding Fraction Config Path
     */
    const XML_SWEDISH_ROUND_FRACTION = 'currency/price/swedish_fraction'; 	
    
    /**
     * Manage Config Path
     */
    const XML_ROUND_MANAGE = 'currency/price/manage';    
                              	
    /**
     * Check Round Price Convert Functionality Should Be Enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return !Mage::app()->getStore()->isAdmin() && 
            Mage::helper('Core')->isModuleEnabled('Faonni_Price') && 
            Mage::getStoreConfig(self::XML_ROUND_ENABLED);
    }
	
    /**
     * Check Subtract 0.01 Functionality Should Be Enabled
     *
     * @return bool
     */
    public function isSubtract()
    {
        return Mage::getStoreConfig(self::XML_ROUND_SUBTRACT);
    }
    
    /**
     * Check Decimal Zero Functionality Should Be Enabled
     *
     * @return bool
     */
    public function isShowDecimalZero()
    {
        return Mage::getStoreConfig(self::XML_DECIMAL_ZERO);
    }
    
    /**
     * Check Replace Zero Price Functionality Should Be Enabled
     *
     * @return bool
     */
    public function isReplaceZeroPrice()
    {
        return Mage::getStoreConfig(self::XML_ZERO_PRICE);
    }
            
    /**
     * Check Rounding Base Price
     *
     * @return string
     */
    public function isRoundingBasePrice()
    {
        return Mage::getStoreConfig(self::XML_ROUND_BASE_PRICE);
    }  
    
    /**
     * Check Round Manage Functionality Should Be Enabled 
     *
     * @return bool
     */
    public function isRoundManage()
    {
        return Mage::getStoreConfig(self::XML_ROUND_MANAGE);
    }    
	
    /**
     * Retrieve Rounding Type
     *
     * @return string
     */
    public function getRoundType()
    {
        return Mage::getStoreConfig(self::XML_ROUND_TYPE);
    }
	
    /**
     * Retrieve Subtract Amount
     *
     * @return string
     */
    public function getAmount()
    {
        $amount = Mage::getStoreConfig(self::XML_ROUND_AMOUNT);
		return is_numeric($amount) 
			? $amount 
			: 0;
    }
	
    /**
     * Retrieve Precision
     *
     * @return int
     */
    public function getPrecision()
    {
        return (int)Mage::getStoreConfig(self::XML_ROUND_PRECISION);
    }
	
    /**
     * Retrieve Text Of Replace
     *
     * @return string
     */
    public function getZeroPriceText()
    {
        return Mage::getStoreConfig(self::XML_ZERO_PRICE_TEXT);
    }
	
    /**
     * Retrieve Swedish Round Fraction
     *
     * @return float
     */
    public function getSwedishFraction()
    {
        $fraction = Mage::getStoreConfig(self::XML_SWEDISH_ROUND_FRACTION);
		return ($fraction > 0)
			? $fraction 
			: 0.05;        
    }    	
}