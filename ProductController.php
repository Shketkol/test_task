<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 12.06.18
 * Time: 6:00
 */

class ProductController implements ElasticSearchDriver, MySQLDriver
{
    /**
     * @param integer $id
     * @return string
     */
    public function detail($id)
    {
        $product = $this->findById($id);
        if (empty($product)) {
            $product = $this->findProduct($id);

        }

        return json_encode($product);
    }

    public function findById($id): array
    {
        // TODO: Implement findById() method.
    }

    public function findProduct($id): array
    {
        // TODO: Implement findProduct() method.
    }


}