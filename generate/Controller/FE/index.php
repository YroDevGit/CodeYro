<?php
$succ = 0;
$link = "";
$nm = "";
if (isset($_POST['btn'])) {
    if (isset($_POST['addview'])) {
        $name = $_POST['name'];
        $nm = $name;
        $phpFile = "../../../Front_End/application/controllers/" . $name . ".php"; // Name of the PHP file to be created
        $link = "../../../" . $name;
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
                \$this->load->view('$name');
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

        $viewFile = "../../../Front_End/application/views/" . $name . ".php";
        $viewContent = $phpContent = <<<EOT
            Welcome to CodeYRO
        EOT;

        if (file_exists($viewFile)) {
            $succ = 2;
        } else {
            if (file_put_contents($viewFile, $viewContent) !== false) {
                $succ = 1;
            } else {
                $succ = 3;
            }
        }
    } else {
        $name = $_POST['name'];
        $nm = $name;
        $phpFile = "../../../Front_End/application/controllers/" . $name . ".php"; // Name of the PHP file to be created
        $link = "../../../" . $name;
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
}
?>

<html>
<head>
    <title>CodeYRO</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card-form {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }

        .starting {
            padding-top: 50px;
        }

        .title {
            padding-bottom: 20px;
        }

        .main-title span {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .small small {
            color: #666;
        }

        input[type=text] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="starting">
        <div class="card-form">
            <div class="title">
                <div class="main-title">
                    <span>CodeYro Framework</span>
                </div>
                <div class="small">
                    <small>Let us start with your project details</small>
                </div>
            </div>
            <form action="" method="post">
                <div>
                    <label for="name">Front End Controller name:</label>
                    <input type="text" name="name" placeholder="Enter controller name">
                </div>
                <div style="display: none;">
                    <label for="check">
                        <input type="checkbox" id="check" name="addview">Add view
                    </label>
                </div>
                <div>
                    <button type="submit" name="btn">Submit</button>
                </div>
                <?php if (intval($succ) == 1): ?>
                    <div class="success-message">
                        <p>Controller created.</p>
                        <a href="<?= $link; ?>"><?= ($link == "") ? "" : "Show " . $nm . " Controller" ?></a>
                    </div>
                <?php elseif (intval($succ) == 2): ?>
                    <div class="error-message">
                        <p>File exists.</p>
                    </div>
                <?php elseif (intval($succ) == 3): ?>
                    <div class="error-message">
                        <p>Failed.</p>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
