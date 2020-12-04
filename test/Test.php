<?php
/**
 * Created by PhpStorm.
 * User: uuui
 * Date: 2020/12/3
 * Time: 17:06
 */
namespace iiiuToken;
require_once "../vendor/autoload.php";

$a = Application::Token()->Jwt();
$sign = $a::getToken(array('a'=>'2'));
var_dump($sign);
var_dump("======================");
$verify = $a::verifyToken($sign);
var_dump($verify);