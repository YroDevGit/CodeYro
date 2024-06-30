<?php
if(! function_exists("ENCRYPT")){
    function ENCRYPT($value){
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
    
        $enc = ENCRYPTION_CODE;
    
        $encryption_key = SECURE_KEY;
    
        $encryption = openssl_encrypt($value, $ciphering,
        $encryption_key, $options, $enc);
        
        return $encryption;
    }
}

if(! function_exists("DECRYPT")){
    function DECRYPT($value){
        $dec = ENCRYPTION_CODE;
        $ciphering = "AES-128-CTR";
        $options = 0;
        $decryption_key = SECURE_KEY;
        $decryption=openssl_decrypt ($value, $ciphering, 
        $decryption_key, $options, $dec);
    
        return $decryption;
    }
}


?>