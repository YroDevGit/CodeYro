<?php
if(! function_exists("CY_ASSIGN_USER")){
    function CY_ASSIGN_USER($roles = ["id"=>null, "type" => null, "role" => null]){ 
        if(! is_array($roles)){die("Roles should be an array");}
        /** CodeYRO assign user.
         * $roles value is depends on what you put in SET_LOGIN(true, $data);
         */
        
         $ACTIVATE = FALSE; //Set to true when you want to use user role filtering.// <<====


         if($ACTIVATE){
        //Conditions below, you can remove and add your own condtions, codes above is just a reference but you can use it too.
         
         /** When using id to assign*/
         
         // when user id is not 1
         if(isset($roles['id']) && $roles['id']!=1){
            //CY_REDIRECT("");  //<== when user id is NOT 1, redirect to controller[parameter].
         }


         /** When using id to assign*/

         // when user role is not "ADMIN"
         if(isset($roles['role']) && $roles["role"] != "ADMIN"){
            //CY_REDIRECT("");  //<== when user id is NOT 2, redirect to controller[parameter].
         }

         //You can add more condtion or configure conditions above.






         }
    }
}


?>