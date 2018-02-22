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
class Faonni_Price_Block_Adminhtml_Round_Rule_Edit 
	extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Initialize block
	 *
     * @return void
     */
	public function __construct()
	{
		parent::__construct();
		
		$this->_objectId = 'round_rule_id';
		$this->_blockGroup = 'faonni_price';
		$this->_controller = 'adminhtml_round_rule';

		$this->_addButton('saveandcontinue', array(
			'label'   => $this->__('Save And Continue Edit'),
			'onclick' => "saveAndContinueEdit('" . $this->getSaveAndContinueUrl() . "');",
			'class'   => 'save',
		), -100);
	}
	
    /**
     * Getter of url for Save and Continue button
     * tab_id will be replaced by desired by JS later
	 *
     * @return string
     */	
	public function getSaveAndContinueUrl()
    {
        return $this->getUrl('*/*/save', array(
            '_current'   => true,
            'back'       => 'edit',
            'tab'        => '{{tab_id}}',
            'active_tab' => null
        ));
    }
	
    /**
     * Prepare layout
	 *
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
		$tabsBlockJsObject = 'round_rule_tabsJsTabs';
		$tabsBlockPrefix   = 'round_rule_tabs_';

        $this->_formScripts[] = "
            function saveAndContinueEdit(urlTemplate) {
                var tabsIdValue = " . $tabsBlockJsObject . ".activeTab.id;
                var tabsBlockPrefix = '" . $tabsBlockPrefix . "';
                if (tabsIdValue.startsWith(tabsBlockPrefix)) {
                    tabsIdValue = tabsIdValue.substr(tabsBlockPrefix.length)
                }
                var template = new Template(urlTemplate, /(^|.|\\r|\\n)({{(\w+)}})/);
                var url = template.evaluate({tab_id:tabsIdValue});
                editForm.submit(url);
            }
        ";
        return parent::_prepareLayout();
    }
	
    /**
     * Return header text in price round_rule to create or edit page
	 *
     * @return string
     */		
	public function getHeaderText()
	{
		if(Mage::registry('current_faonni_price_round_rule') && 
			Mage::registry('current_faonni_price_round_rule')->getId()){
			return $this->__(
				"Edit Rule '%s'", 
				$this->htmlEscape(Mage::registry('current_faonni_price_round_rule')->getName())
			);
		} 
		else return $this->__('Add Rule');
	}
}