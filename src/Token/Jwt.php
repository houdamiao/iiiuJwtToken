<?php
/**
 * Created by PhpStorm.
 * User: uuui
 * Date: 2020/12/3
 * Time: 17:43
 */

namespace iiiuJwtToken\Token;

/**
 * Class Jwt
 * @package iiiuJwtToken\Token
 * @method \iiiuJwtToken\Jwt
 */

class Jwt
{
    
    protected static $header=[
        "sha"=>"sha256"
    ];
    
    protected static $key = "123123";
    
    public function __construct($key='')
    {
        if(!empty($key)){
            self::$key=$key;
        }
    }
    
    public static function getToken(array $param) : string
    {
        $header64Encode = self::base64Encode(json_encode(self::$header,JSON_UNESCAPED_UNICODE));
        $param64Encode = self::base64Encode(json_encode($param,JSON_UNESCAPED_UNICODE));
        $sign = $header64Encode.'.'.$param64Encode.'.'.self::sign($header64Encode.'.'.$param64Encode,self::$key);
        return $sign;
    }
    
    public static function verifyToken(string $sign){
        $sign = explode(".",$sign);
        if(count($sign) != 3){
            return false;
        }
        list($header,$param,$sign) = $sign;
        
        if(self::sign($header.'.'.$param,self::$key)!=$sign){
            return false;
        }
        $header = json_decode(self::base64Decode($header),JSON_UNESCAPED_UNICODE);
        $param = json_decode(self::base64Decode($param),JSON_UNESCAPED_UNICODE);
        $data=  $header+$param;
        return $data;
    
    }
    public static function sign($input,$key){
        return self::base64Encode(hash_hmac("sha256",$input,$key,true));
    }
    
    
    public static function base64Encode(string $input){
        return str_replace("=",'',strtr(base64_encode($input),'+/','-'));
    }
    
    public static function base64Decode(string $input){
        $len = strlen($input);
        if($len > 1){
            $input.=str_repeat("=",4-($len % 4));
        }
        return base64_decode(strtr($input,"-","+/"));
    }
}