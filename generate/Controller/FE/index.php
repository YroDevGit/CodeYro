<?php
$succ = 0;
$link = "";
$nm = "";
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $nm = $name;
    $phpFile = "../../../Front_End/application/controllers/".$name.".php"; // Name of the PHP file to be created
    $link = "../../../".$name;
    $phpContent = <<<EOT
    <?php 
    class $name extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
            /**
             * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
             *  you can load libraries and files here..
             * \$this->load->library('session');
             */
        }
        
        // This is a Front_End controller (Manage User interface and fetch data from Back End to display).

        public function index() 
        {
            /**
             * index() function is a class main function.
             * Example: when you call $name controller, it will find and read the index() function
             * You can add view here to display front_end view
             * \$this->load->view('welcome_message'); // will display welcome_message.php
             */
            //Remove sample code: echo "Hello world - CodeYRO";
            echo "Hello world - CodeYRO";
            //This is just a sample text, you can remove comments now.
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
        background-image: linear-gradient(to right, #0028c8, #3800c8);
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
        outline: none;
    }
</style>
