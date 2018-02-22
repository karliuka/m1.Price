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
class Faonni_Price_Block_Adminhtml_Round_Rule_Grid 
	extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Initialize grid
	 *
     * Set sort settings
     */
	public function __construct()
	{
		parent::__construct();
		
		$this->setId('round_ruleGrid');
		$this->setDefaultSort('rule_id');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
	}
	
    /**
     * Initialize grid collection
	 *
     * @return Faonni_Price_Block_Adminhtml_Round_Rule_Grid 
     */
	protected function _prepareCollection()
	{
		$collection = Mage::getResourceModel('faonni_price/round_rule_collection');
		$this->setCollection($collection);
		
		return parent::_prepareCollection();
	}
	
    /**	
     * Add grid columns
	 *
     * @return Faonni_Price_Block_Adminhtml_Round_Rule_Grid
     */			
	protected function _prepareColumns()
	{
		$this->addColumn('rule_id', array(
			'header' => $this->__('ID'),
			'align'  => 'right',
			'width'  => '50px',
			'type'   => 'number',
			'index'  => 'rule_id',
		));	
		
		$this->addColumn('name', array(
			'header' => $this->__('Name'),
			'index'  => 'name',
			'escape' => true,
		));	
		
        $this->addColumn('created_at', array(
            'header' => $this->__('Created At'),
            'align'  => 'left',
            'width'  => '180px',			
            'type'   => 'datetime',
            'index'  => 'created_at',
        ));
		
		$this->addColumn('status', array(
			'header' => $this->__('Status'),
			'index'  => 'status',
			'width'  => '100px',
			'type'   => 'options',
			//'options' => Mage::getSingleton('faonni_price/round_rule_source_status')->getOptions(),
			'frame_callback' => array($this, 'decorateStatus')			
		));

		$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
		$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

		return parent::_prepareColumns();
	}
	
    /**
     * Retrieve row click URL
	 *
     * @param Varien_Object $row
     * @return string
     */
	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}

    /**
     * Add grid mass action
	 *
     * @return Faonni_Price_Block_Adminhtml_Round_Rule_Grid
     */			
	protected function _prepareMassaction()
	{
		$this->setMassactionIdField('rule_id');
		$this->getMassactionBlock()->setFormFieldName('rule_ids');
		$this->getMassactionBlock()->setUseSelectAll(true);
		
		$this->getMassactionBlock()->addItem('remove', array(
				 'label'   => $this->__('Remove'),
				 'url'     => $this->getUrl('*/*/massRemove'),
				 'confirm' => $this->__('Are you sure?')
			));
		return $this;
	}
	
    /**
     * Decorate status column values
	 *
     * @param string $value
     * @param Mage_Index_Model_Process $row
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @param bool $isExport
     * @return string
     */
    public function decorateStatus($value, $row, $column, $isExport)
    {
		$class = '';
        switch($value)
		{
            case Faonni_Price_Model_Round_Rule::STATUS_ENABLED:
                $class = 'grid-severity-notice';
				$value = $this->__('Enabled');
                break;
            case Faonni_Price_Model_Round_Rule::STATUS_DISABLED:
                $class = 'grid-severity-critical';
				$value = $this->__('Disabled');
                break;
        }
        return $isExport 
			? $value 
			: '<span class="' . $class . '"><span>' . $value . '</span></span>';
    }	
}