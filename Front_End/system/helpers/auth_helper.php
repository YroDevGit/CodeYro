<?php

if(! function_exists("CODEYRO_AUTH_SETTINGS_1005_YROLEEEMZ_CY")){
    function CODEYRO_AUTH_SETTINGS_1005_YROLEEEMZ_CY(){
        include_once AUTHPATH."/auth_settings.php";
        CY_LOGIN_STATUS_1005_CHECKER_CODEYRO();
    }
}

if(! function_exists("AUTHENTICATE_CY_USER")){
    function AUTHENTICATE_CY_USER($bool){
        /** ==> Void
         * authenticate user.
         * See config at application/auth/auth_settings
         */
        if($bool == true || $bool == TRUE){
            CODEYRO_AUTH_SETTINGS_1005_YROLEEEMZ_CY();
            CODEYRO_ASSIGN_USER_1005_YRO_EMZ();
        }
    }
}

if(!function_exists("CODEYRO_ASSIGN_USER_1005_YRO_EMZ")){
    function CODEYRO_ASSIGN_USER_1005_YRO_EMZ(){
        include_once AUTHPATH."/user_roles.php";
        CY_ASSIGN_USER(GET_LOGIN_DATA());
    }
}

?>