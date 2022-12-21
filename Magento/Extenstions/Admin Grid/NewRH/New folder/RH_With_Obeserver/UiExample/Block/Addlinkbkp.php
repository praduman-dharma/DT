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
        )->where("status", 1);
        $result = $connection->fetchAll($sql);
        // print_r($result);
?>

        <table class='table'>
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Title </th>
                    <th> Description </th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $keys => $values) {  ?>
                    <tr>
                        <td><?= $values["blog_id"] ?></td>
                        <td><?= $values["blog_title"] ?></td>
                        <td><?= $values["blog_description"] ?></td>
                        <td><?= $values["status"] ?></td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
<?php
    }
}
?>