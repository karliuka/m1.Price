<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Block_Adminhtml_Round_Rule_Edit_Tabs
    extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize tabs edit
     *
     * Set settings
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('round_rule_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Rule Information'));
    }

    /**
     * Before rendering html, but after trying to load cache
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _beforeToHtml()
    {
        $this->addTab('main_section', array(
            'label'   => $this->__('General'),
            'title'   => $this->__('General'),
            'content' => $this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_edit_tab_main')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}
