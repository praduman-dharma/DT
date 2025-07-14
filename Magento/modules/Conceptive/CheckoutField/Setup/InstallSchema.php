<?php

namespace Conceptive\CheckoutField\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();

        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'agree',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'visible'  => true,
                'default' => 0,
                'comment' => 'Custom Condition'
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'agree',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'visible'  => true,
                'default' => 0,
                'comment' => 'Custom Condition'
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            'agree',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'visible' => true,
                'default' => 0,
                'comment' => 'Custom Condition'
            ]
        );
    }
}