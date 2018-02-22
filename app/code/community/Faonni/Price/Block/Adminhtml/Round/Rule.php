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
		$this->_headerText = $this->__('Manage Round Rule');
		
		parent::__construct();
	}
}