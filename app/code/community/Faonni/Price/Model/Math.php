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
class Faonni_Price_Model_Math
{
    /**
     * Round fractions up constant
     */
    const TYPE_CEIL = 'ceil';

    /**
     * Round fractions down constant
     */
    const TYPE_FLOOR = 'floor';

    /**
     * Swedish Round fractions up constant
     */
    const TYPE_SWEDISH_CEIL = 'swedish_ceil';

    /**
     * Swedish Round fractions
     */
    const TYPE_SWEDISH_ROUND = 'swedish_round';

    /**
     * Swedish Round fractions down constant
     */
    const TYPE_SWEDISH_FLOOR = 'swedish_floor';

    /**
     * Excel Round Fractions Up
     */
    const TYPE_EXCEL_CEIL = 'excel_ceil';

    /**
     * Excel Round Fractions
     */
    const TYPE_EXCEL_ROUND = 'excel_round';

    /**
     * Excel Round Fractions Down
     */
    const TYPE_EXCEL_FLOOR = 'excel_floor';

    /**
     * Round Rule Collection
     *
     * @var Faonni_Price_Model_Resource_Round_Rule_Collection
     */
    protected $_ruleCollection;

    /**
     * Round Price Helper
     *
     * @var Faonni_Price_Helper_Data
     */
    protected $_helper;

    /**
     * Initialize Model
     */
    public function __construct() 
    {
        $this->_helper = Mage::helper('faonni_price');
    }

    /**
     * Retrieve Round Rule Collection
     *
     * @return Faonni_Price_Model_Resource_Round_Rule_Collection
     */
    public function getRuleCollection()
    {
        if (null === $this->_ruleCollection) {
            $this->_ruleCollection = Mage::getResourceModel('faonni_price/round_rule_collection');
            $this->_ruleCollection
                ->addStoreFilter(Mage::app()->getStore()->getStoreId())
                ->addStatusFilter();
        }
        return $this->_ruleCollection;
    }

    /**
     * Retrieve The Rounded Price
     *
     * @param float $price
     * @return float
     */
    public function round($price)
    {
        if ($this->_helper->isRoundManage()) {
            return $this->_roundByRule($price);
        }
        $price = $this->_round(
            $price, 
            $this->_helper->getRoundType(), 
            $this->_helper->getPrecision(), 
            $this->_helper->getSwedishFraction()
        );
        return $this->_subtract(
            $price, 
            $this->_helper->isSubtract(), 
            $this->_helper->getAmount()
        );
    }

    /**
     * Retrieve The Rounded Price
     *
     * @param float $price
     * @return float
     */
    protected function _roundByRule($price)
    {
        foreach ($this->getRuleCollection() as $rule) {
            if ($rule->getMinAmount() <= $price && $price <= $rule->getMaxAmount()) {
                $price = $this->_round(
                    $price, 
                    $rule->getType(), 
                    $rule->getPrecision(), 
                    $rule->getSwedishFraction()
                );
                return $this->_subtract(
                    $price, 
                    $rule->getSubtract(),
                    $rule->getAmount()
                );
            }
        }
        return $price;
    }

    /**
     * Retrieve The Rounded Price
     *
     * @param float $price
     * @param string $type
     * @param integer $precision
     * @param float $fraction
     * @return float
     */
    protected function _round($price, $type, $precision, $fraction)
    {
        $multiplier = pow(10, abs($precision));
        switch ($type) {
            case self::TYPE_CEIL:
                $price = round($price, $precision, PHP_ROUND_HALF_UP);
                break;
            case self::TYPE_FLOOR:
                $price = round($price, $precision, PHP_ROUND_HALF_DOWN);
                break;
            case self::TYPE_SWEDISH_CEIL:
                $price = ceil($price/$fraction) * $fraction;
                break;
            case self::TYPE_SWEDISH_ROUND:
                $price = round($price/$fraction) * $fraction;
                break;
            case self::TYPE_SWEDISH_FLOOR:
                $price = floor($price/$fraction) * $fraction;
                break;
            case self::TYPE_EXCEL_CEIL:
                $price = $precision < 0
                    ? ceil($price/$multiplier) * $multiplier
                    : ceil($price * $multiplier)/$multiplier;
                break;
            case self::TYPE_EXCEL_ROUND:
                $price = $precision < 0
                    ? round($price/$multiplier) * $multiplier
                    : round($price * $multiplier)/$multiplier;
                break;
            case self::TYPE_EXCEL_FLOOR:
                $price = $precision < 0
                    ? floor($price/$multiplier) * $multiplier
                    : floor($price * $multiplier)/$multiplier;
                break;
        }
        return $price;
    }

    /**
     * Formats A Number As A Currency String
     *
     * @param float $price
     * @return string
     */
    public function format($price)
    {
        return sprintf('%0.4F', $price);
    }

    /**
     * Retrieve the price with a subtracted amount
     * 
     * @param float $price
     * @param bool $subtract
     * @param float $amount   
     * @return float
     */
    protected function _subtract($price, $subtract, $amount)
    {
        if ($subtract) {
            $price = $price - $amount;
        }
        return (0 < $price)
            ? $price
            : $this->format(0);
    }
}
