<?php
interface IncreaseCountRequest
{
    /**
     * IncreaseCountRequest constructor.
     * @param int $product
     */
    public function increaseCountRequest(int $product) : void;
}