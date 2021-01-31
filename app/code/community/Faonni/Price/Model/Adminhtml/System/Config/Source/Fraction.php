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
class Faonni_Price_Model_Adminhtml_System_Config_Source_Fraction
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
                'value' => '0.05',
                'label' => Mage::helper('faonni_price')->__('0.05')
            ),
            array(
                'value' => '0.10',
                'label' => Mage::helper('faonni_price')->__('0.10')
            ),
            array(
                'value' => '0.20',
                'label' => Mage::helper('faonni_price')->__('0.20')
            ),
            array(
                'value' => '0.25',
                'label' => Mage::helper('faonni_price')->__('0.25')
            ),
            array(
                'value' => '0.50',
                'label' => Mage::helper('faonni_price')->__('0.50')
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
            '0.05' => Mage::helper('faonni_price')->__('0.05'),
            '0.10' => Mage::helper('faonni_price')->__('0.10'),
            '0.20' => Mage::helper('faonni_price')->__('0.20'),
            '0.25' => Mage::helper('faonni_price')->__('0.25'),
            '0.50' => Mage::helper('faonni_price')->__('0.50')
        );
    }
}
