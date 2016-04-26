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
class Faonni_RoundPriceConvert_Model_Adminhtml_System_Config_Source_Type
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
		return array(
			array(
				'value' => Faonni_RoundPriceConvert_Model_Type::ROUND, 
				'label' => Mage::helper('faonni_roundpriceconvert')->__('Standart')
			),
			array(
				'value' => Faonni_RoundPriceConvert_Model_Type::CEIL, 
				'label' => Mage::helper('faonni_roundpriceconvert')->__('Round fractions up')
			),
			array(
				'value' => Faonni_RoundPriceConvert_Model_Type::FLOOR, 
				'label' => Mage::helper('faonni_roundpriceconvert')->__('Round fractions down')
			)
		);
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
		return array(
			Faonni_RoundPriceConvert_Model_Type::ROUND => Mage::helper('faonni_roundpriceconvert')->__('Standart'),
			Faonni_RoundPriceConvert_Model_Type::CEIL  => Mage::helper('faonni_roundpriceconvert')->__('Round fractions up'),
			Faonni_RoundPriceConvert_Model_Type::FLOOR => Mage::helper('faonni_roundpriceconvert')->__('Round fractions down')
		);
    }
}