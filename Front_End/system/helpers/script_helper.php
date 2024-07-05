<?php

if(! function_exists("ADD_REACT")){
    function ADD_REACT(){
        ?>
        <script src="<?= RESOURCES ?>react/react.js"></script>
        <script src="<?= RESOURCES ?>react/react-dom.js"></script>
        <script src="<?= RESOURCES ?>react/babel.js"></script>
        <script src="<?= RESOURCES ?>react/axios.js"></script>
        <script src="<?= RESOURCES ?>react/reactCustom.js"></script>
        <?php
    }
}


if(! function_exists("ADD_JQUERY")){
    function ADD_JQUERY(){
        ?>
        <link rel="stylesheet" href="<?= RESOURCES ?>jQuery/sweetalert2.min.css">
        <script src="<?= RESOURCES ?>jQuery/jquery.js"></script>
        <script src="<?= RESOURCES ?>jQuery/swal.js"></script>
        <script src="<?= RESOURCES ?>jQuery/sweetalert.js"></script>
        <?php
    }
}


if(! function_exists("ADD_ENCRYPTION")){
    function ADD_ENCRYPTION(){
        ?>
        <script src="<?= SECURITY ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_CUSTOMS")){
    function ADD_CUSTOMS(){
        ?>
        <script src="<?= RESOURCES ?>customs/customjs.js"></script>
        <?php
    }
}


if(! function_exists("ADD_ALL_SCRIPTS")){
    function ADD_ALL_SCRIPTS(){
        ?>
        <script src="<?= RESOURCES ?>react/react.js"></script>
        <script src="<?= RESOURCES ?>react/react-dom.js"></script>
        <script src="<?= RESOURCES ?>react/babel.js"></script>
        <script src="<?= RESOURCES ?>react/axios.js"></script>
        <script src="<?= RESOURCES ?>react/reactCustom.js"></script>

        <link rel="stylesheet" href="<?= RESOURCES ?>jQuery/sweetalert2.min.css">
        <script src="<?= RESOURCES ?>jQuery/jquery.js"></script>
        <script src="<?= RESOURCES ?>jQuery/swal.js"></script>
        <script src="<?= RESOURCES ?>jQuery/sweetalert.js"></script>

        <script src="<?= SECURITY ?>"></script>

        <script src="<?= RESOURCES ?>customs/customjs.js"></script>
        <?php
    }
}

?>