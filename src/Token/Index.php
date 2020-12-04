<?php
/**
 * Created by PhpStorm.
 * User: uuui
 * Date: 2020/12/3
 * Time: 17:22
 */

namespace iiiuToken\Token;

/**
 * Class Index
 * @package iiiuJwtToken\Token\Index
 */
class Index
{

    public function __construct()
    {
    }
    public function make($name,$arguments){
        $app = "\\iiiuToken\\Token\\{$name}";
        return new $app($arguments);
    }
    public function __call($name, $arguments)
    {
        return $this->make($name,$arguments);
    }
}