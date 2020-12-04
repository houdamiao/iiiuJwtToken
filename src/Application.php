<?php
/**
 * Created by PhpStorm.
 * User: uuui
 * Date: 2020/12/3
 * Time: 16:51
 */

namespace iiiuToken;

/**
 * Class Application
 * @package iiiuJwtToken
 * @method \iiiuToken\Token\Index Index()
 */
class Application
{
    
    public function __construct()
    {
    }
    
    public static function make($name){
        $app = "\\iiiuToken\\{$name}\\Index";
        return new $app();
    }
    
    public static function __callStatic($name, $arguments)
    {
        var_dump($name);
        return self::make($name);
    }
}