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
class Faonni_Price_Model_Resource_Round_Rule_Collection 
	extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    /**
     * Set Model Name For Collection Items
	 *
     * @return void
     */
	public function _construct()
	{
		$this->_init('faonni_price/round_rule');
	}
	
    /**
     * Add Store Availability Filter
     *
     * @param integer $storeId
     * @return Faonni_Price_Model_Resource_Round_Rule_Collection
     */
    public function addStoreFilter($storeId)
    {
        return $this->addFieldToFilter(
			'main_table.store_id', 
			$storeId
		);
    }
    
    /**
     * Add Status Filter
	 *
     * @return Faonni_Price_Model_Resource_Round_Rule_Collection
     */
    public function addStatusFilter()
    {
        return $this->addFieldToFilter(
			'main_table.status', 
			Faonni_Price_Model_Round_Rule::STATUS_ENABLE
		);
    }    
}