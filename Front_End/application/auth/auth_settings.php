<?php
if(! function_exists("CY_LOGIN_STATUS_1005_CHECKER_CODEYRO")){
    function CY_LOGIN_STATUS_1005_CHECKER_CODEYRO(){
        $logged_in = IS_LOGGED_IN();
    /**
     * This is authentication / Login settings
     * Please don't rename function name above, might cause errors.
     * required: SET_LOGIN(true) to be effective.
     */

    //Configuration starts here...

    $authenticate = FALSE; // <<== You can set it to TRUE when you want to add authentication.
    // use SET_LOGIN(true) to any login controllers to make this effective.

    if(! $logged_in && $authenticate){ // This condition is when user is not logged in
    //When user's athentication failed or not logged in, please add code here...



    P("<span style='color:red;font-size:18px;'>User is not authenticated.!</span> <br><br><a href='/'>Back to homepage</a>");

    
    //CY_REDIRECT(""); // You can also redirect to controller that is NOT Authenticated to avoid redirects error.








    


    // End of condition...
    //Please don't remove the exit;
    exit;
    }
    }
}

?>