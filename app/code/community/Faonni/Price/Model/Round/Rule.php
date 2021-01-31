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
