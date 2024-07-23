<?php
if(! function_exists("CY_ASSIGNED_ROLES")){
   function CY_ASSIGNED_ROLES(array $roles){//==>Void
      if(HAS_LOGIN_DATA()){
         /** ==> Void
          * User roles filtering.
          */
         //Get the logged in user role
         $user_role = GET_LOGIN_DATA("role");// data is set when you SET_LOGIN(true, array $data);
         //replace role with your user role label/column.

         if(! in_array($user_role, $roles)){

            die("You are not able to access this page.!"); // You can also replace this with CY_REDIRECT// redirect to error page.
            
         }
      }
   }
}

?>