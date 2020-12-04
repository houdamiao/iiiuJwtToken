<?php
/**
 * Created by PhpStorm.
 * User: uuui
 * Date: 2020/12/3
 * Time: 17:22
 */

namespace iiiuJwtToken\Token;

/**
 * Class Index
 * @package iiiuJwtToken\Token
 * @property \iiiuJwtToken\Token\Jwt;
 */
class Index
{

    public function __construct()
    {
    }
    public function make($name){
        $app = "\\iiiuJwtToken\\Token\\{$name}";
        return new $app();
    }
    public function __call($name, $arguments)
    {
        return $this->make($name);
    }
}