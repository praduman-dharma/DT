<?php
namespace RH\UiExample\Block;

class Addlink extends \Magento\Framework\View\Element\Template
{
    public function getMessage()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('rh_blog'); //gives table name
        //Select Data from table
        $sql = $connection->select()->from(
                ["tn" => $tableName]
            )->where("status",1);
            $result = $connection->fetchAll($sql); 
            return $result;    
        }
    } 
    ?>