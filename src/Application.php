<?php
/**
 * Created by PhpStorm.
 * User: uuui
 * Date: 2020/12/3
 * Time: 16:51
 */

namespace iiiuJwtToken;

/**
 * Class Application
 * @package iiiuJwtToken
 * @method \iiiuJwtToken\Token\Index Index()
 */
class Application
{
    
    public function __construct()
    {
    }
    
    public static function make($name){
        $app = "\\iiiuJwtToken\\{$name}\\Index";
        return new $app();
    }
    
    public static function __callStatic($name, $arguments)
    {
        return self::make($name);
    }
}