<?php

if(! function_exists("ENCRYPT")){
    function ENCRYPT($value){
       $string = $value;
       $length = strlen($string);
       $ret = "";
       for ($i = 0; $i < $length; $i++) {
           $ret .= SETCODE($string[$i]);
       }
      return base64_encode($ret); 
   }
}


if(! function_exists('DIST')){
   function SETCODE($value){
       $ret = "";
       $char = UCODE(1);
       $code = UCODE(2);
       $index = array_search($value, $char);

       if ($index !== false) {
           $ret = $code[intval($index)];
       } else {
           echo "'a' is not found in the array.";
       }
       return $ret;
   }
}

if(! function_exists("DECODE")){
   function DECODE($value){
       $val = base64_decode($value);
       $char = UCODE(1);
       $code = UCODE(2);
       $parts = explode('*', $val);
       $ret = "";
       foreach ($parts as $part) {
           if ($part !== '') {
               if(! in_array($part."*", $code)){
                   redirect(base_url()."");
               }
               else{
               $index = array_search($part."*", $code);
               $ret .= $char[$index];
               }
           }
       }
       return $ret;
   }
}

if(! function_exists("UCODE")){
   function UCODE($num){
       $ret = [];
       if($num==1){
           $ret = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',"'","!","?","@",'"'," ", ",", ".","-","=","/",";",":","^","?","*","^",'_'];
       }
       if($num==2){
           $ret =  [
            "XaB*", "QdS*", "JkO*", "QrS*", "sTu*", "PdS*", "ZaB*", "JmL*", "WnY*", "AbC*",
            "KlO*", "MnQ*", "aBc*", "NpL*", "OpR*", "TuV*", "HjK*", "UvW*", "JmK*", "PqS*",
            "CeF*", "QrS*", "GfK*", "aBc*", "XaC*", "BeG*", "TqV*", "TsV*", "DeF*", "ZaF*",
            "pQr*", "GhI*", "MnO*", "OpQ*", "GhJ*", "WzY*", "dEf*", "IjK*", "LmQ*", "NoP*",
            "aBd*", "MnO*", "KjL*", "BdH*", "WnX*", "KlM*", "GfJ*", "CdA*", "UtV*", "TuW*",
            "XyD*", "TsU*", "PrQ*", "LmN*", "XaY*", "HiJ*", "FgI*", "ZaC*", "KpL*", "MnQ*",
            "aBc*", "XyZ*", "WnY*", "XaJ*", "XyZ*", "CdG*", "dEf*", "EfG*", "XaB*", "KlM*",
            "AbC*", "ZaB*", "JmL*", "NpQ*", "GhI*", "RsT*", "GfJ*", "NoP*", "WzY*", "PiS*",
            "HiK*", "CdM*", "IjK*", "QrS*", "JkO*", "BcD*", "pQr*", "KpL*", "FgH*", "DeF*",
            "TuV*", "EfG*", "aBc*", "CeF*", "QrS*", "VwX*", "JmK*", "KjL*", "WnX*", "XyZ*"
        ];
       }
       return $ret;
   }
}

?>