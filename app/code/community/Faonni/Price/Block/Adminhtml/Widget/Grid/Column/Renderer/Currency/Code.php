<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Block_Adminhtml_Widget_Grid_Column_Renderer_Currency_Code
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Currency
{
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {
        return Mage::app()->getStore($row->getStoreId())
            ->getDefaultCurrency()
            ->getCurrencyCode();
    }
}
