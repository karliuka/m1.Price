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
 * @package     Faonni_RoundPriceConvert
 * @copyright   Copyright (c) 2015 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Faonni_RoundPriceConvert_Helper_Data 
	extends Mage_Core_Helper_Abstract
{
    /**
     * Check Round Price Convert functionality should be enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)Mage::helper('Core')->isModuleEnabled('Faonni_RoundPriceConvert') && 
			Mage::getStoreConfig('catalog/roundpriceconvert/active');
    }
	
    /**
     * Check Subtract 0.01 functionality should be enabled
     *
     * @return bool
     */
    public function isSubtract()
    {
        return (bool)Mage::getStoreConfig('catalog/roundpriceconvert/subtract');
    }
	
    /**
     * Retrieve Rounding Type
     *
     * @return string
     */
    public function getRoundType()
    {
        return (string)Mage::getStoreConfig('catalog/roundpriceconvert/type');
    }
	
    /**
     * Retrieve Subtract Amount
     *
     * @return string
     */
    public function getAmount()
    {
		$amount = Mage::getStoreConfig('catalog/roundpriceconvert/amount');
		return (is_numeric($amount)) ? $amount : 0;
		
    }	
}