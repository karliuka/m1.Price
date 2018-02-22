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
class Faonni_Price_Block_Adminhtml_Round_Rule_Edit_Tab_Main 
	extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Add form fields
	 *
     * @return Faonni_Price_Block_Adminhtml_Round_Rule_Edit_Tab_Main
     */
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('round_rule');
		
		$this->setForm($form);
		
		$fieldset = $form->addFieldset(
			'main_section', 
			array('legend' => $this->__('General'))
		);
		
		$fieldset->addField('name', 'text', array(
			'label'    => $this->__('Name'),
			'title'    => $this->__('Name'),	
			'required' => true,
			'name'     => 'name',
		));
		
        $fieldset->addField('status', 'select', array(
            'label'     => $this->__('Status'),
            'title'     => $this->__('Status'),
            'name'      => 'status',
            'required'  => true,
            'options'   => Mage::getSingleton('faonni_price/round_rule_source_status')->getOptions(),
        ));
		
		if(Mage::getSingleton('adminhtml/session')->getCurrentFaonniPriceRoundRule()){
			$form->setValues(Mage::getSingleton('adminhtml/session')->getCurrentFaonniPriceRoundRule());
			Mage::getSingleton('adminhtml/session')->setCurrentFaonniPriceRoundRule(null);
		} 
		elseif(Mage::registry('current_faonni_price_round_rule')){
			$form->setValues(Mage::registry('current_faonni_price_round_rule')->getData());
		}
		
		return parent::_prepareForm();
	}
}