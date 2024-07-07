<?php
$succ = 0;
$link = "";
$nm = "";
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $nm = $name;
    $phpFile = "../../../Back_End/application/controllers/".$name.".php"; // Name of the PHP file to be created
    $link = "../../../Back_End/index.php/".$name;

    include "../../../data.php";
    $link_name_file = $SERVER_NAME."/".$APP_NAME."/Back_End/index.php/".$name;

    $phpContent = <<<EOT
        <?php 
    class $name extends CY_Controller {
    
        public function __construct() {
            parent::__construct();
            /**
             * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
             *  you can load libraries and files here..
             * \$this->load->library('session');
             */
        }

        //This is Back_End controller where you can create API's, Please don't delete this comment, you can use this in the future.
        //STATIC API:   /Back_End/index.php/$name   <== add this to your project/app parent link. 
        //Examples: 
        //LOCAL API: [SERVER]/[APPNAME]/Back_End/index.php/$name   //Replace the [SERVER]  with your servername and [APPNAME] with you projectname
        //===>LOCAL API Example use: $link_name_file
        //SERVER API: [HOST:PORT]/Back_End/index.php/$name    //Replace the [HOST:PORT]  with your HOST and PORT, Example localhost:8000
        // ===>SERVER API Example use: localhost:8000/Back_End/index.php/$name
        //PRODUCTION API: [SITENAME]/Back_End/index.php/$name 
        //===> PRODUCTION API Example use: https://CodeYRO.com/Back_End/index.php/$name 
        
        
        public function index()
        {
            //Please remove the sample code, it is just a test code
             \$data = ['AppName' => "First CodeYRO project"];
             print_r(\$data);
             //Remove the comment and replace your own code. thanks: CodeYro
        }
    
        /**
         * You can add more functions here
         */
    }

    ?>
    EOT;
    
    if (file_exists($phpFile)) {
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
                        <small>Let us start with your project details</small>
                    </div>
            </div>
        </div>
        <div>
        <form action="" method="post">
    <table>
        <tr>
            <td><label for="">Front End Controller name:</label><br><input type="text" name="name"  placeholder="Enter controller name"></td>
        </tr>
        <tr>
            <td align="right"><button type="submit" name="btn">Submit</button></td>
        </tr>
        <?php if(intval($succ)==1): ?>
            <tr>
            <td><h3 style="color:white;">Controller created.</h3><a style="color:yellow;" href="<?= $link; ?>" ><?= ($link=="")? "": "Show ".$nm." Controller" ?></a></td>
            </tr>
        <?php elseif(intval($succ)==2): ?>
            <tr>
            <td><h3 style="color:red;">File exist.</h3></td>
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
</div>
</html>

<style>
    .card-form{
        background-color: black;
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
