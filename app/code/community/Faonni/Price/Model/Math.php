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
class Faonni_Price_Model_Math
{
    /**
     * Round fractions up constant
     */	
	const TYPE_CEIL = 'ceil';
	
    /**
     * Round fractions down constant
     */	
	const TYPE_FLOOR = 'floor';
	
    /**
     * Swedish Round fractions up constant
     */	
	const TYPE_SWEDISH_CEIL = 'swedish_ceil';
	
    /**
     * Swedish Round fractions
     */	
	const TYPE_SWEDISH_ROUND = 'swedish_round';
	
    /**
     * Swedish Round fractions down constant
     */	
	const TYPE_SWEDISH_FLOOR = 'swedish_floor';
	
    /**
     * Excel Round Fractions Up
     */	
	const TYPE_EXCEL_CEIL = 'excel_ceil';
	
    /**
     * Excel Round Fractions
     */	
	const TYPE_EXCEL_ROUND = 'excel_round';	
	
    /**
     * Excel Round Fractions Down
     */	
	const TYPE_EXCEL_FLOOR = 'excel_floor';

    /**
     * Retrieve the Rounded Price
     * 
     * @param float $price
     * @return float
     */
    public function round($price)
    {
		$helper = Mage::helper('faonni_price');
		$fraction = $helper->getSwedishFraction();
		$precision = $helper->getPrecision();
		$multiplier = pow(10, abs($precision));
		
		switch ($helper->getRoundType()) {
			case self::TYPE_CEIL:
				$price = round($price, $precision, PHP_ROUND_HALF_UP);
				break;
			case self::TYPE_FLOOR:
				$price = round($price, $precision, PHP_ROUND_HALF_DOWN);
				break;
			case self::TYPE_SWEDISH_CEIL:
				$price = ceil($price/$fraction) * $fraction;
				break;
			case self::TYPE_SWEDISH_ROUND:
				$price = round($price/$fraction) * $fraction;
				break;
			case self::TYPE_SWEDISH_FLOOR:
				$price = floor($price/$fraction) * $fraction;
				break;
			case self::TYPE_EXCEL_CEIL:
				$price = $precision < 0 
					? ceil($price/$multiplier) * $multiplier 
					: ceil($price * $multiplier)/$multiplier;
				break;
			case self::TYPE_EXCEL_ROUND:
				$price = $precision < 0 
					? round($price/$multiplier) * $multiplier 
					: round($price * $multiplier)/$multiplier;
				break;
			case self::TYPE_EXCEL_FLOOR:
				$price = $precision < 0 
					? floor($price/$multiplier) * $multiplier 
					: floor($price * $multiplier)/$multiplier;
				break;						
		}
		return $price;
    }	
}