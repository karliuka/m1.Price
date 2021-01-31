<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Block_Adminhtml_Round_Rule
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Initialize block
     *
     * @return void
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_round_rule';
        $this->_blockGroup = 'faonni_price';
        $this->_headerText = $this->__('Manage Round Rules');

        parent::__construct();
    }
}
