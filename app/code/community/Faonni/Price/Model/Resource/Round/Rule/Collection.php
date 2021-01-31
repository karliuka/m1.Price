<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
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
