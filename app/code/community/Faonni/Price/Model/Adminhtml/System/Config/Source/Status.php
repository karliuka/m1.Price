<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Model_Adminhtml_System_Config_Source_Status
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
                'value' => '0',
                'label' => Mage::helper('faonni_price')->__('Disable')
            ),
            array(
                'value' => '1',
                'label' => Mage::helper('faonni_price')->__('Enable')
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
            '0' => Mage::helper('faonni_price')->__('Disable'),
            '1' => Mage::helper('faonni_price')->__('Enable')
        );
    }
}
