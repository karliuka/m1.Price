<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Model_Adminhtml_System_Config_Source_Type
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
                'value' => Faonni_Price_Model_Math::TYPE_CEIL,
                'label' => Mage::helper('faonni_price')->__('Round fractions up')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_FLOOR,
                'label' => Mage::helper('faonni_price')->__('Round fractions down')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_SWEDISH_CEIL,
                'label' => Mage::helper('faonni_price')->__('Swedish Round up')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_SWEDISH_ROUND,
                'label' => Mage::helper('faonni_price')->__('Swedish Round')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_SWEDISH_FLOOR,
                'label' => Mage::helper('faonni_price')->__('Swedish Round down')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_EXCEL_CEIL,
                'label' => Mage::helper('faonni_price')->__('Excel Round up')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_EXCEL_ROUND,
                'label' => Mage::helper('faonni_price')->__('Excel Round')
            ),
            array(
                'value' => Faonni_Price_Model_Math::TYPE_EXCEL_FLOOR,
                'label' => Mage::helper('faonni_price')->__('Excel Round down')
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
            Faonni_Price_Model_Math::TYPE_CEIL  => Mage::helper('faonni_price')->__('Round fractions up'),
            Faonni_Price_Model_Math::TYPE_FLOOR => Mage::helper('faonni_price')->__('Round fractions down'),
            Faonni_Price_Model_Math::TYPE_SWEDISH_CEIL  => Mage::helper('faonni_price')->__('Swedish Round up'),
            Faonni_Price_Model_Math::TYPE_SWEDISH_ROUND => Mage::helper('faonni_price')->__('Swedish Round'),
            Faonni_Price_Model_Math::TYPE_SWEDISH_FLOOR => Mage::helper('faonni_price')->__('Swedish Round down'),
            Faonni_Price_Model_Math::TYPE_EXCEL_CEIL  => Mage::helper('faonni_price')->__('Excel Round up'),
            Faonni_Price_Model_Math::TYPE_EXCEL_ROUND => Mage::helper('faonni_price')->__('Excel Round'),
            Faonni_Price_Model_Math::TYPE_EXCEL_FLOOR => Mage::helper('faonni_price')->__('Excel Round down')
        );
    }
}
