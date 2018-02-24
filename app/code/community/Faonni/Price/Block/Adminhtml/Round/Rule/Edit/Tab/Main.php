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
		
		$fieldset->addField('min_amount', 'text', array(
			'label'    => $this->__('Min Amount'),
			'title'    => $this->__('Min Amount'),	
			'required' => true,
			'name'     => 'min_amount',
		));
		
		$fieldset->addField('max_amount', 'text', array(
			'label'    => $this->__('Max Amount'),
			'title'    => $this->__('Max Amount'),	
			'required' => true,
			'name'     => 'max_amount',
		));
		
        $field = $fieldset->addField('store_id', 'select', array(
            'name'      => 'store_id',
            'label'     => $this->__('Store View'),
            'title'     => $this->__('Store View'),
            'required'  => true,
            'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(),
        ));
        $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
        $field->setRenderer($renderer);
		
        $fieldset->addField('type', 'select', array(
            'label'     => $this->__('Rounding Type'),
            'title'     => $this->__('Rounding Type'),
            'name'      => 'type',
            'required'  => true,
            'options'   => Mage::getSingleton('faonni_price/adminhtml_system_config_source_type')->toArray(),
			'note'      => $this->__('Round fractions up or Round fractions down.')
        ));
		
		$fieldset->addField('precision', 'text', array(
			'label'     => $this->__('Precision'),
			'title'     => $this->__('Precision'),	
			'name'      => 'precision',
			'note'      => $this->__('The optional number of decimal digits to round to.')
		));
		
        $fieldset->addField('swedish_fraction', 'select', array(
            'label'     => $this->__('Swedish Fraction'),
            'title'     => $this->__('Swedish Fraction'),
            'name'      => 'swedish_fraction',
            'options'   => Mage::getSingleton('faonni_price/adminhtml_system_config_source_fraction')->toArray(),
        ));	
		
        $fieldset->addField('subtract', 'select', array(
            'label'     => $this->__('Subtract'),
            'title'     => $this->__('Subtract'),
            'name'      => 'subtract',
            'options'   => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray(),
        ));
		
		$fieldset->addField('amount', 'text', array(
			'label'     => $this->__('Subtract Amount'),
			'title'     => $this->__('Subtract Amount'),		
			'name'      => 'amount',
		));
		
        $fieldset->addField('status', 'select', array(
            'label'     => $this->__('Status'),
            'title'     => $this->__('Status'),
            'name'      => 'status',
            'options'   => Mage::getSingleton('faonni_price/adminhtml_system_config_source_status')->toArray(),
        ));
		
		if(Mage::getSingleton('adminhtml/session')->getCurrentFaonniPriceRoundRule()){
			$form->setValues(Mage::getSingleton('adminhtml/session')->getCurrentFaonniPriceRoundRule());
			Mage::getSingleton('adminhtml/session')->setCurrentFaonniPriceRoundRule(null);
		} 
		elseif(Mage::registry('current_faonni_price_round_rule')){
			$form->setValues(Mage::registry('current_faonni_price_round_rule')->getData());
		}
		
        $this->setChild('form_after', $this->getLayout()
			->createBlock('adminhtml/widget_form_element_dependence')
            ->addFieldMap('type', 'type')
            ->addFieldMap('precision', 'precision')
            ->addFieldMap('swedish_fraction', 'swedish_fraction')
			->addFieldMap('subtract', 'subtract')
			->addFieldMap('amount', 'amount')
            ->addFieldDependence(
                'swedish_fraction',
                'type',
                array(
					Faonni_Price_Model_Math::TYPE_SWEDISH_CEIL,
					Faonni_Price_Model_Math::TYPE_SWEDISH_ROUND,
					Faonni_Price_Model_Math::TYPE_SWEDISH_FLOOR
				)
            )
            ->addFieldDependence(
                'precision',
                'type',
                array(
					Faonni_Price_Model_Math::TYPE_CEIL,
					Faonni_Price_Model_Math::TYPE_FLOOR,
					Faonni_Price_Model_Math::TYPE_EXCEL_CEIL,
					Faonni_Price_Model_Math::TYPE_EXCEL_ROUND,
					Faonni_Price_Model_Math::TYPE_EXCEL_FLOOR				
				)
            )			
            ->addFieldDependence('amount', 'subtract', '1')
        );
		
		return parent::_prepareForm();
	}
}