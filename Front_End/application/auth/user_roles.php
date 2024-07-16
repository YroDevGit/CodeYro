<?php

$CY_ACTIVATE_USER_ROLES = FALSE; //👈Set to true when you want to use user roles filtering.

if(! function_exists("CY_ASSIGN_USER")){
    function CY_ASSIGN_USER($roles = ["id"=>null, "type" => null, "role" => null]){ 
        if(! is_array($roles)){die("Roles should be an array");}
        //👆Heading condtions is sensitive, can cause errors when modified.
        /** CodeYRO assign user.
         * $roles value is depends on what you put in SET_LOGIN(true, $data);
         */
        
        //Conditions below 👇, you can remove and add your own condtions, codes below is just a reference but you can use it too.
         
         /** When using id to assign*/
         
         // when user id is not 1
         if(isset($roles['id']) && $roles['id']!=1){
            //CY_REDIRECT("");  //👈 when user id is NOT 1, redirect to controller[parameter].
         }


         /** When using id to assign*/

         // when user role is not "ADMIN"
         if(isset($roles['role']) && $roles["role"] != "ADMIN"){
            //CY_REDIRECT("");  //👈 when user id is NOT 2, redirect to controller[parameter].
         }

         //You can add more condtion or configure conditions above.







    }
}
//Don't modify code definitions here👇
if(! defined("CY_USER_ROLES_ACTIVATE_1005_YRO")){define("CY_USER_ROLES_ACTIVATE_1005_YRO", $CY_ACTIVATE_USER_ROLES);} 
?>