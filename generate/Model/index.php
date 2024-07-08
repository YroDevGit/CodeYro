<?php
$succ = 0;
$link = "";
$nm = "";
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $nm = $name;
    $phpFile = "../../Front_End/application/models/".$name.".php";
    $phpFile1 = "../../Front_End/application/controllers/".$name.".php"; // Name of the PHP file to be created
    $link = "../../../".$name;


    $phpContent = <<<EOT
        <?php
            defined('BASEPATH') OR exit('No direct script access allowed');

            class $name extends CY_Model {

                public function __construct() {
                    parent::__construct();
                    /**
                     * in your controller. add this model
                     *  \$this->load->model('$name');   or   USE_MODEL('$name');
                     * Model usage: 
                     * Example function name: showAll(){ return 1; }
                     *  ==> usage: \$this->\$name->showAll();
                     */

                    \$TABLE = "";  //put your table name inside the double qoute.
                    define("TABLE", \$TABLE);
                }
            
                

                
                /**
                 * Add functions here...
                 * Example: public function showAll(){}
                 * 
                 */

            }
        ?>
    EOT;
    
    if (file_exists($phpFile)||file_exists($phpFile1)) {
        $succ = 2;
    } else {
        if (file_put_contents($phpFile, $phpContent) !== false) {
            $succ = 1;
        } else {
            $succ = 3;
        }
    }
}
?>



<html>
    <head>
        <title>CodeYRO</title>
    </head>

<div align="center" class="starting">
    <div class="card-form">
        <div>
            <div class="title">
                    <div class="main-title">
                    <span>CodeYro Framework</span>
                    </div>
                    <div class="small">
                        <small>ADD MODEL</small>
                    </div>
            </div>
        </div>
        <div>
        <form action="" method="post">
    <table>
        <tr>
            <td><label for="">Model name:</label><br><input type="text" name="name"  placeholder="Enter model name"></td>
        </tr>
        <tr>
            <td align="right"><button type="submit" name="btn">Submit</button></td>
        </tr>
        <?php if(intval($succ)==1): ?>
            <tr>
            <td><h3 style="color:white;">Model created.</h3></td>
            </tr>
        <?php elseif(intval($succ)==2): ?>
            <tr>
            <td><h3 style="color:red;">Filename exist</h3></td>
            </tr>
        <?php elseif(intval($succ)==3): ?>
            <tr>
            <td><h3 style="color:red;">Failed.</h3></td>
            </tr>
        <?php endif; ?>
    </table>
</form>
        </div>
    </div>
    <div align='center' style="padding-top: 20px;">
        <?php if(intval($succ)==2): ?>
            <span style="color :red;">File name should should not be the same with any controller or model names</span>
        <?php endif; ?>
    </div>
</div>
</html>

<style>
    .card-form{
        background-color: orange;
        display: inline-block;
        padding: 15px 20px 15px 20px;
        border-radius: 5px;
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
</style>
