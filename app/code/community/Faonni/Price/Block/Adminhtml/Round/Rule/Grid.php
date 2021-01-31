<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
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
     * Retrieve application store object
     *
     * @return Mage_Core_Model_Store
     */
    protected function _getStore()
    {
        return Mage::app()->getStore(
            (int)$this->getRequest()->getParam('store', 0)
        );
    }

    /**
     * Add grid columns
     *
     * @return Faonni_Price_Block_Adminhtml_Round_Rule_Grid
     */
    protected function _prepareColumns()
    {
        /* custom renders */
        $currency = 'Faonni_Price_Block_Adminhtml_Widget_Grid_Column_Renderer_Currency';
        $code = 'Faonni_Price_Block_Adminhtml_Widget_Grid_Column_Renderer_Currency_Code';
        /* grid columns */
        $this->addColumn('rule_id', array(
            'header' => $this->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'type' => 'number',
            'index' => 'rule_id',
        ));

        $this->addColumn('min_amount', array(
            'header' => $this->__('Min Amount'),
            'filter' => false,
            'index' => 'min_amount',
            'renderer' => $currency,
        ));

        $this->addColumn('max_amount', array(
            'header' => $this->__('Max Amount'),
            'filter' => false,
            'index' => 'max_amount',
            'renderer' => $currency,
        ));

        $this->addColumn('currency_code', array(
            'header' => $this->__('Currency Code'),
            'filter' => false,
            'renderer' => $code,
        ));

        $this->addColumn('type', array(
            'header' => $this->__('Rounding Type'),
            'index' => 'type',
            'type' => 'options',
            'options' => Mage::getSingleton('faonni_price/adminhtml_system_config_source_type')->toArray()
        ));

        $this->addColumn('subtract', array(
            'header' => $this->__('Subtract'),
            'index' => 'subtract',
            'type' => 'options',
            'options' => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray()
        ));

        $this->addColumn('amount', array(
            'header' => $this->__('Subtract Amount'),
            'filter' => false,
            'index' => 'amount',
            'renderer' => $currency,
            'default' => '0.00',
        ));

        $this->addColumn('precision', array(
            'header' => $this->__('Precision'),
            'index' => 'precision'
        ));

        $this->addColumn('swedish_fraction', array(
            'header' => $this->__('Swedish Fraction'),
            'index' => 'swedish_fraction',
            'type' => 'options',
            'options' => Mage::getSingleton('faonni_price/adminhtml_system_config_source_fraction')->toArray(),
            'renderer' => $currency
        ));

        $this->addColumn('store_id', array(
            'header' => $this->__('Store'),
            'index' => 'store_id',
            'type' => 'store',
            'store_view'=> true,
        ));

        $this->addColumn('status', array(
            'header' => $this->__('Status'),
            'index' => 'status',
            'width' => '100px',
            'type' => 'options',
            'options' => Mage::getSingleton('faonni_price/adminhtml_system_config_source_status')->toArray()
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
                    'label' => $this->__('Remove'),
                    'url' => $this->getUrl('*/*/massRemove'),
                    'confirm' => $this->__('Are you sure?')
            ));
        return $this;
    }
}
