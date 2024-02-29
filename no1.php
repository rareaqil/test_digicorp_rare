<?php
header('Content-type: text/plain');
class TokenManager {
    private static $tokens = [];

    public static function generate($user) {
        $token = self::generateToken();
        if (!isset(self::$tokens[$user])) {
            self::$tokens[$user] = [];
        }

        array_push(self::$tokens[$user], $token);

        if (count(self::$tokens[$user]) > 10) {
            array_shift(self::$tokens[$user]);
        }

        echo "Tokens for user $user:\n";
        
        echo " $token \n"; 
        return $token;
    }

    public static function generateToken($length=10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;  
    }

    public static function printToken($user){
        
        echo "\n";
        if(isset(self::$tokens[$user])){
            echo implode(",",self::$tokens[$user]);
            
        echo "\n";
        }else{
        echo "Token tidak ada \n";
        }
    }

    public static function verifToken($user,$token){
        
        if(isset(self::$tokens[$user])){
        $index = array_search($token, self::$tokens[$user]);
        if($index !== false){
            unset(self::$tokens[$user][$index]);
            echo "$token berhasil diverivikasi\n";
            return true;
        }

        }
        echo "Token tidak Valid \n";
        return false;
    }
}

$user = "rare";
$token1 = TokenManager::generate($user);
$token2 = TokenManager::generate($user);
$token3 = TokenManager::generate($user);
$token4 = TokenManager::generate($user);
$token5 = TokenManager::generate($user);
$token6 = TokenManager::generate($user);
$token7 = TokenManager::generate($user);
$token8 = TokenManager::generate($user);
$token9 = TokenManager::generate($user);
$token10 = TokenManager::generate($user);
$token11 = TokenManager::generate($user);

TokenManager::printToken($user);

// try to verif token 4

$verif1 = TokenManager::verifToken($user,$token4);
$verif3 = TokenManager::verifToken($user,$token5);
$verif2 = TokenManager::verifToken($user,$token4);
$verif4 = TokenManager::verifToken($user,$token6);
$verif5 = TokenManager::verifToken($user,$token5);

TokenManager::printToken($user);
?>