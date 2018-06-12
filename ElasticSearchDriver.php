<?php
interface ElasticSearchDriver
{
    /**
     * @param $id
     * @return array
     */
    public function findById($id) : array;
}