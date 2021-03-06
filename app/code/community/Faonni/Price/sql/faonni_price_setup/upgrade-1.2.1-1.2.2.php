<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */

/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/** @var $connection Varien_Db_Adapter_Pdo_Mysql */
$connection = $installer->getConnection();

/**
 * Create table 'faonni_price/round_rule'
*/
if (!$connection->isTableExists($installer->getTable('faonni_price/round_rule'))) {
    $table = $connection->newTable(
            $installer->getTable('faonni_price/round_rule')
        )
        ->addColumn(
            'rule_id',
            Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
            'Rule Id'
        )
        ->addColumn(
            'store_id',
            Varien_Db_Ddl_Table::TYPE_SMALLINT,
            null,
            array('unsigned' => true),
            'Store Id'
        )
        ->addColumn(
            'min_amount',
            Varien_Db_Ddl_Table::TYPE_DECIMAL,
            '12,4',
            array(),
            'Min Amount'
        )
        ->addColumn(
            'max_amount',
            Varien_Db_Ddl_Table::TYPE_DECIMAL,
            '12,4',
            array(),
            'Max Amount'
        )
        ->addColumn(
            'type',
            Varien_Db_Ddl_Table::TYPE_TEXT,
            255,
            array('nullable'  => false),
            'Rounding Type'
        )
        ->addColumn(
            'subtract',
            Varien_Db_Ddl_Table::TYPE_SMALLINT,
            null,
            array('unsigned' => true),
            'Subtract'
        )
        ->addColumn(
            'amount',
            Varien_Db_Ddl_Table::TYPE_DECIMAL,
            '12,4',
            array(),
            'Subtract Amount'
        )
        ->addColumn(
            'precision',
            Varien_Db_Ddl_Table::TYPE_SMALLINT,
            null,
            array(),
            'Precision'
        )
        ->addColumn(
            'swedish_fraction',
            Varien_Db_Ddl_Table::TYPE_DECIMAL,
            '12,4',
            array(),
            'Swedish Fraction'
        )
        ->addColumn(
            'status',
            Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array('unsigned' => true, 'default' => '0'),
            'Status'
        )
        ->addIndex(
            $installer->getIdxName('faonni_price/round_rule', array('store_id')),
            array('store_id')
        )
        ->addIndex(
            $installer->getIdxName('faonni_price/round_rule', array('status')),
            array('status')
        )
        ->addForeignKey(
            $installer->getFkName('faonni_price/round_rule', 'store_id', 'core/store', 'store_id'),
            'store_id',
            $installer->getTable('core/store'),
            'store_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE,
            Varien_Db_Ddl_Table::ACTION_CASCADE
        )
        ->setComment(
            'Faonni Price Round Rule Table'
        );
    $connection->createTable($table);
}

$installer->endSetup();
