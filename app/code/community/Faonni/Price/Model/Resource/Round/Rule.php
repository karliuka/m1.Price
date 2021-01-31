<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Model_Resource_Round_Rule
    extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Set main entity table name and primary key field name
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('faonni_price/round_rule', 'rule_id');
    }
}
