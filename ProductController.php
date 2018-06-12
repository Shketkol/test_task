<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 12.06.18
 * Time: 6:00
 */

require ("ElasticSearchDriver.php");
require ("MySQLDriver.php");
require ("IncreaseCountRequest.php");

class ProductController implements ElasticSearchDriver, MySQLDriver, IncreaseCountRequest
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

            //Save in cache
            $this->saveProduct($product);
        }

        //Save count request
        $this->increaseCountRequest($id);

        return json_encode($product);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function findById($id): array
    {
       $products = [
           20 => [
               'id' => 20,
               'name' => 'test'
           ],
           21 => [
               'id' => 21,
               'name' => 'test'
           ]
       ];

        $result = ($products[$id]) ?? [];

        return $result;
    }

    /**
     * @param $id
     * @return array|null
     */
    public function findProduct($id): array
    {
        $products = [
            1 => [
                'id' => 1,
                'name' => 'test'
            ],
            2 => [
                'id' => 2,
                'name' => 'test'
            ]
        ];

        $result = ($products[$id]) ?? [];

        return $result;
    }

    /**
     * @param $data
     * @return void
     */
    public function saveProduct($data): void
    {
        $products[$data['id']] = $data;
    }


    /**
     * ProductController constructor.
     * @param int $product
     */
    public function increaseCountRequest(int $product) :void
    {
        $file = file_get_contents('request.txt');
        $file = json_decode($file, true);
        $countRequest = (!empty($file[$product])) ? $file[$product] : 0;
        $file[$product] =  $countRequest+1;
        $file = json_encode($file);
        file_put_contents('request.txt', $file);
    }
}