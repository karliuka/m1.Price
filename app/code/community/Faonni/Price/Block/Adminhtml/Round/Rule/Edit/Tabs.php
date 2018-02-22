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