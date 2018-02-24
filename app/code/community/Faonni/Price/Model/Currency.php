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
class Faonni_Price_Model_Currency 
	extends Mage_Directory_Model_Currency
{
    /**
     * Round Price helper
     *
     * @var Faonni_Price_Helper_Data
     */
    protected $_helper;
    
    /**
     * Initialize model
     */
    protected function _construct() 
    {
        parent::_construct();
        
        $this->_helper = Mage::helper('faonni_price');
    }    
	
    /**
     * Convert price to currency format
     *
     * @param float $price
     * @param null|string|Mage_Directory_Model_Currency $toCurrency
     * @return float
     */
    public function convert($price, $toCurrency = null)
    {	
		$price = parent::convert($price, $toCurrency);
        
		if ($this->isRoundEnabled($toCurrency)) {
			$price = $this->_round($price);
		}
		return $price;		
    }
    
    /**
     * Returns the formatted price
     *
     * @param float $price
     * @param null|array $options
     * @return string
     */
    public function formatTxt($price, $options = array())
    {
        return ($this->_helper->isEnabled()) 
            ? $this->_formatTxt($price, $options)
            : parent::formatTxt($price, $options);
    }
    
    /**
     * Check round price convert functionality should be enabled
     *
     * @param mixed $toCurrency
     * @return bool
     */
    public function isRoundEnabled($toCurrency)
    {
		if (!$this->_helper->isEnabled()) {
			return false;
		}
		if (!$this->_helper->isRoundingBasePrice()) {
			if (is_null($toCurrency) || 
				$this->_getCurrencyCode($toCurrency) == $this->getCode()
			) {
				return false;
			}
		}		
		return true;
    }
    
    /**
     * Returns the formatted price
     *
     * @param float $price
     * @param null|array $options
     * @return string
     */
    protected function _formatTxt($price, $options = array())
    {
        $price = $this->_getNumber($price);
        
        if (!$this->_helper->isShowDecimalZero() && 
			intval($price) == $price) {
            $options['precision'] = 0;
        }        
        
        if (!$this->_helper->isReplaceZeroPrice() || 0 < $price) {
			return parent::formatTxt($price, $options);
		}
		
        return sprintf(
			'<span class="price-free">%s</span>', 
			$this->_helper->getZeroPriceText()
		);	
    }
    
    /**
     * Retrieve the first found number from an string
     *
     * @param string|float|int $price
     * @return float|null
     */
    protected function _getNumber($price)
    {
        if (!is_numeric($price)) {
            $price = Mage::app()->getLocale()->getNumber($price);
        }
        return $price;
    }
    
    /**
     * Retrieve the rounded price
     * 
     * @param float $price
     * @return float
     */
    protected function _round($price)
    {
		$math = Mage::getSingleton('faonni_price/math');
		return $math->format($math->round($price));
    }
    
    /**
     * Retrieve currency code
     * 
     * @param mixed $toCurrency
     * @return string
     */
    protected function _getCurrencyCode($toCurrency)
    {
        if (is_string($toCurrency)) {
            $code = $toCurrency;
        } elseif ($toCurrency instanceof Mage_Directory_Model_Currency) {
            $code = $toCurrency->getCurrencyCode();
        } else {
            throw Mage::exception(
                'Mage_Directory', 
                $this->_helper->__('Invalid target currency.')
            );
        }       
        return $code;
    }	    
}