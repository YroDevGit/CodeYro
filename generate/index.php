<?php
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $htaccessFile = '../.htaccess';

$htaccessContent = <<<EOT
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /$name/

    # Rewrite requests to Front_End if they are not for existing files or directories
    RewriteCond %{REQUEST_URI} !^/Front_End/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ Front_End/$1 [L]

    # Rewrite requests to Back_End if they are not for existing files or directories
    RewriteCond %{REQUEST_URI} !^/Back_End/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^back_end/(.*)$ Back_End/$1 [L]

    # Redirect Trailing Slashes...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]
</IfModule>
EOT;


// Write the content to the .htaccess file
if (file_put_contents($htaccessFile, $htaccessContent) !== false) {
    
} else {
    echo "There was an error creating the .htaccess file.";
}


$htaccessFile = '../Front_End/.htaccess';

$htaccessContent = <<<EOT
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /$name/

    # Redirect Trailing Slashes...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Remove index.php from URL
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>

EOT;

if (file_put_contents($htaccessFile, $htaccessContent) !== false) {
    
} else {
    echo "There was an error creating the .htaccess file.";
}


$phpFile = '../data.php'; 

$phpContent = <<<EOT
<?php

/** 
 * 
 * @package    CodeYRO
 * @author     Tyrone Lee Emz
 * @copyright  Copyright (c) 2024 - Tyrone Lee Emz
 * @since      Version 1.0.0
 * @filesource
 * 
*/

// Change app details
\$APP_TITLE = ""; // Optional
\$APP_DESCRIPTION = ""; // Optional
\$YEAR = date("Y-m-d"); // Optional

// When using apache, might need to use the default http://localhost/, might need to rename when server is changed
\$SERVER_NAME = "http://localhost/"; // Mandatory - this is the first thing you need to rename
\$APP_NAME = "$name"; // Mandatory - this is the second thing you need to rename

/**
 * \$MAIN_PAGE
 * Welcome is found at application\\controllers\\Welcome.php 
 * Open Welcome.php inside controllers folder to modify view, if you want to change the main page, you can create new controller and rename the MAIN_PAGE value
 */
\$MAIN_PAGE = "Welcome";
/** END OF MAIN_PAGE */

?>
EOT;

// Write the content to the PHP file
if (file_put_contents($phpFile, $phpContent) !== false) {
    echo "File successfully generated";
    header("Refresh: 1; url=../");
} else {
    echo "There was an error creating the $phpFile file.";
}
}
?>



<html>

<form action="" method="post">
    <table>
        <tr>
            <td><input type="text" name="name" placeholder="Enter project name"><button type="submit" name="btn">Submit</button></td>
        </tr>
    </table>
    
    
</form>

</html>
