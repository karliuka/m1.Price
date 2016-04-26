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
class Faonni_RoundPriceConvert_Model_Currency 
	extends Mage_Directory_Model_Currency
{
    /**
     * Convert price to currency format
     *
     * @param float $price
     * @param null|string|Mage_Directory_Model_Currency $toCurrency
     * @return float
     */
    public function convert($price, $toCurrency = null)
    {	
		$price = parent::convert($price, $toCurrency);
	
		if (is_null($toCurrency)) {
            return $price;
        } elseif (is_string($toCurrency) && $toCurrency == $this->getCode()) {
			return $price;
		} elseif ($toCurrency instanceof Mage_Directory_Model_Currency && $toCurrency->getCode() == $this->getCode()) {
			return $price;
		} else {		
			$helper = Mage::helper('faonni_roundpriceconvert');
			
			if ($helper->isEnabled()) 
			{
				switch ($helper->getRoundType()) {
					case Faonni_RoundPriceConvert_Model_Type::CEIL:
						$price = ceil($price);
						break;
					case Faonni_RoundPriceConvert_Model_Type::FLOOR:
						$price = floor($price);
						break;
					case Faonni_RoundPriceConvert_Model_Type::ROUND:
						$price = round($price);
						break;
				}
				
				if ($helper->isSubtract()) {
					$price = $price - $helper->getAmount();
				}
			}
			return (0 < $price) ? $price : 0;
		}
    }
}