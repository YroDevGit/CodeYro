<?php
$OK = "";
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $server = $_POST['server'];
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
\$SERVER_NAME = "$server"; // Mandatory - this is the first thing you need to rename
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

if (file_put_contents($phpFile, $phpContent) !== false) {
    $OK = "1";
} else {
    echo "There was an error creating the $phpFile file.";
}
}


function getProjectRootFolderName() {
    $currentDir = __DIR__;
    
    $parentDir = dirname($currentDir);
    
    return basename($parentDir);
}
?>



<html>
    <head>
        <title>CodeYRO</title>
    </head>
<?php if(file_exists("../data.php")): ?>    
<div class="rw"><span class="makesure">Welcome to CodeYRO:</span></div>
<div class="rw"><a href="../" target="_blank">Open Homepage</a></div>
<div class="rw"><a onclick="return confirm('Are you assigned to Front End?')" href="Controller/FE/" target="_blank">Add Front End controller</a></div>
<div class="rw"><a onclick="return confirm('Are you assigned to Back End?')" href="Controller/BE/" target="_blank">Add Back End controller</a></div>
<?php endif; ?>
<?php if(file_exists("../data.php")): ?> 
<div align='center' style="padding:10px 0px 10px 0px">
    <div>
        <span style="color:red;">Warning: File is already generated,<br>You don't need to submit the project details again unless you made some changes in parent folder name and server name.</span>
    </div>
</div>
<?php endif; ?>
<div align="center" class="starting">
    <div class="card-form">
        <div>
            <div class="title">
                    <div class="main-title">
                    <span>CodeYro Framework</span>
                    </div>
                    <div class="small">
                        <small>Let us start with your project details</small>
                    </div>
            </div>
        </div>
        <div>
        <form action="" method="post">
    <table>
        <tr>
            <td><label for="">Project name:</label><br><input type="text" name="name" value="<?= getProjectRootFolderName() ?>" placeholder="Enter project name"></td>
        </tr>
        <tr>
            <td><label for="">Project server:</label><br><input type="text" name="server" value="http://localhost/" placeholder="Enter project name"></td>
        </tr>
        <tr>
            <td align="center"><button type="submit" name="btn">Submit</button></td>
        </tr>
        <?php if($OK != ""): ?>
            <tr style="">
            <td align="right" style="color:white; font-size:16px;padding-top: 20px;">App data has been generated <a style="color:yellow; font-weight:bold; font-size:16px;" href="../" target="_blank">Get started</a></td>
            </tr>
        <?php endif; ?>
    </table>
</form>
        </div>
    </div>
</div>
<footer>
    <div align='center'>
        <div style="padding-top: 20px;">
            <span style="color:gray;">CodeYRO <?= date('Y') ?></span>
        </div>
    </div>
</footer>
</html>



<?php if($OK != ""): ?>
    <div id="modax" align='center'>
    <div class="modax-body">
        <div>
            <div class="rrw">
                <h3 class="success">SUCCESS</h3>
            </div>
            <div class="rrw">
                <span class="success-copy" style="color:black;">Project core and important files has been generated.</span>
            </div>
            <div class="rrw">
                <table>
                    <tr>
                        <td class="tdbt"><a href="index.php"><button class="bt ok">OKAY</button></a></td>
                        <td class="tdbt"><a href="../" target="_blank"><button class="bt start">GET STARTED</button></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<style>
    .tdbt{
        padding: 0px 7px 0px 7px;
    }
    .bt{
        width: 150px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        height: 35px;
    }
    .ok{
        background-color: #b6f7ff;
    }
    .start{
        background-color: #d4ffa1;
    }
    #modax{
        position: fixed;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-color: rgb(0,0,0,0.9);
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .rrw{
        padding: 5px 0px 5px 0px;
    }
    .modax-body{
        display: inline-block;
        padding: 10px 20px 10px 20px;
        background-color: white;
        border-radius: 5px;
    }
    .card-form{
        background-color: gray;
        display: inline-block;
        padding: 15px 20px 15px 20px;
        border-radius: 5px;
    }
    .makesure{
        color:gray;
        font-size: 14px;
        font-family: monospace;
    }

    .starting{
        padding-top: 50px;
    }
    .title{
        padding: 10px 0px 10px 0px;
    }
    span, small, label{
        color: white;
    }
    .main-title span{
        font-size: 19px;
    }
    input[type=text]{
        height: 35px;
        width: 250px;
        font-size: 15px;
    }
    .rw{
        padding-top: 20px;
    }
</style>
