<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Model_Round_Rule
    extends Mage_Core_Model_Abstract
{
    /**
     * Status Disabled Constants
     */
    const STATUS_DISABLE = 0;

    /**
     * Status Enabled Constants
     */
    const STATUS_ENABLE = 1;

    /**
     * The Event Prefix Name
     *
     * @var string
     */
    protected $_eventPrefix = 'faonni_price_round_rule';

    /**
     * The Event Object Name
     *
     * @var string
     */
    protected $_eventObject = 'rule';

    /**
     * Set Resource Name
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('faonni_price/round_rule');
    }

    /**
     * Check is Rule Available
     *
     * @return bool
     */
    public function isAvailable()
    {
        return (bool)$this->getData('status') == self::STATUS_ENABLE;
    }
}
