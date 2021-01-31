<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
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
