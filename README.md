# iiiuJwtToken
生成token
    namespace iiiuToken;
    
    $t = Application::Token()->Jwt("固定的加密参数");
    $sign = $t::getToken(array('a'=>'2'));//加密的数据
    var_dump($sign);
    var_dump("======================");
    $verify = $t::verifyToken($sign); //验证token并返回接码数据
    var_dump($verify);