<?php
interface MySQLDriver
{
    /**
     * @param $id
     * @return array
     */
    public function findProduct($id) : array;
}