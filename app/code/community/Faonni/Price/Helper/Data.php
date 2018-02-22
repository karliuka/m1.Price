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
     * Enabled config path
     */
    const XML_ROUND_ENABLED = 'currency/price/enabled';
    
    /**
     * Subtract config path
     */
    const XML_ROUND_SUBTRACT = 'currency/price/subtract';    
    
    /**
     * Rounding base price config path
     */
    const XML_ROUND_BASE_PRICE = 'currency/price/base_price';  
     
    /**
     * Rounding type config path
     */
    const XML_ROUND_TYPE = 'currency/price/type';  
      
    /**
     * Rounding subtract amount config path
     */
    const XML_ROUND_AMOUNT = 'currency/price/amount';  
      
    /**
     * Rounding precision config path
     */
    const XML_ROUND_PRECISION = 'currency/price/precision';  
      
    /**
     * Show decimal zeros config path
     */
    const XML_DECIMAL_ZERO = 'currency/price/show_decimal_zero';
         
    /**
     * Replace zero price config path
     */
    const XML_ZERO_PRICE = 'currency/price/replace_zero_price';
         
    /**
     * Text of replace config path
     */
    const XML_ZERO_PRICE_TEXT = 'currency/price/zero_price_text'; 
	
    /**
     * swedish rounding fraction config path
     */
    const XML_SWEDISH_ROUND_FRACTION = 'currency/price/swedish_fraction'; 	
                              	
    /**
     * Check round price convert functionality should be enabled
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
     * Check subtract 0.01 functionality should be enabled
     *
     * @return bool
     */
    public function isSubtract()
    {
        return Mage::getStoreConfig(self::XML_ROUND_SUBTRACT);
    }
    
    /**
     * Check decimal zero functionality should be enabled
     *
     * @return bool
     */
    public function isShowDecimalZero()
    {
        return Mage::getStoreConfig(self::XML_DECIMAL_ZERO);
    }
    
    /**
     * Check replace zero price functionality should be enabled
     *
     * @return bool
     */
    public function isReplaceZeroPrice()
    {
        return Mage::getStoreConfig(self::XML_ZERO_PRICE);
    }
            
    /**
     * Check rounding base price
     *
     * @return string
     */
    public function isRoundingBasePrice()
    {
        return Mage::getStoreConfig(self::XML_ROUND_BASE_PRICE);
    }    
	
    /**
     * Retrieve rounding type
     *
     * @return string
     */
    public function getRoundType()
    {
        return Mage::getStoreConfig(self::XML_ROUND_TYPE);
    }
	
    /**
     * Retrieve subtract amount
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
     * Retrieve precision
     *
     * @return int
     */
    public function getPrecision()
    {
        return (int)Mage::getStoreConfig(self::XML_ROUND_PRECISION);
    }
	
    /**
     * Retrieve text of replace
     *
     * @return string
     */
    public function getZeroPriceText()
    {
        return Mage::getStoreConfig(self::XML_ZERO_PRICE_TEXT);
    }
	
    /**
     * Retrieve swedish round fraction
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