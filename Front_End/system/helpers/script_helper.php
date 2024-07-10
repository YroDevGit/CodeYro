<?php

if(! function_exists("ADD_REACT")){
    function ADD_REACT(){
        ?>
        <script src="<?= RESOURCES('react/react.js') ?>"></script>
        <script src="<?= RESOURCES('react/react-dom.js') ?>"></script>
        <script src="<?= RESOURCES('react/babel.js') ?>"></script>
        <script src="<?= RESOURCES('react/axios.js') ?>"></script>
        <script src="<?= RESOURCES('react/reactCustom.js')?>"></script>
        <?php
    }
}

if(! function_exists("ADD_CY_TABLE")){
    function ADD_CY_TABLE(){
        ADD_JQUERY();
        ?>
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/jquery.dataTables.css') ?>">
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/responsive.dataTables.min.css') ?>">
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/buttons.dataTables.min.css') ?>">
            <link rel="stylesheet" href="<?= RESOURCES('jQuery/cytable/cytablecss/all.min.css') ?>">
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/cytable.css') ?>">
  
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/jquery.dataTables.min.js') ?>"></script>         
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/dataTables.responsive.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/dataTables.buttons.min.js') ?>"></script>      
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/jszip.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/buttons.html5.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/buttons.print.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/cytable.js') ?>"></script>

        <?php
    }
}


if(! function_exists("ADD_JQUERY")){
    function ADD_JQUERY(){
        ?>
        <link rel="stylesheet" href="<?= RESOURCES('jQuery/sweetalert2.min.css') ?>">
        <script src="<?= RESOURCES('jQuery/jquery.js') ?>"></script>
        <script src="<?= RESOURCES('jQuery/swal.js') ?>"></script>
        <script src="<?= RESOURCES('jQuery/sweetalert.js') ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_ENCRYPTION")){
    function ADD_ENCRYPTION(){
        ?>
        <script src="<?= SECURITY() ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_CUSTOMS")){
    function ADD_CUSTOMS(){
        ?>
        <script src="<?= RESOURCES('customs/customjs.js') ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_ALL_SCRIPTS")){
    function ADD_ALL_SCRIPTS($arr = ["CY_TABLE"=>"FALSE"]){
        ?>
        <script src="<?= RESOURCES('react/react.js') ?>"></script>
        <script src="<?= RESOURCES('react/react-dom.js') ?>"></script>
        <script src="<?= RESOURCES('react/babel.js') ?>"></script>
        <script src="<?= RESOURCES('react/axios.js') ?>"></script>
        <script src="<?= RESOURCES('react/reactCustom.js') ?>"></script>

        <link rel="stylesheet" href="<?= RESOURCES('jQuery/sweetalert2.min.css') ?>">
        <script src="<?= RESOURCES('jQuery/jquery.js') ?>"></script>
        <script src="<?= RESOURCES('jQuery/swal.js') ?>"></script>
        <script src="<?= RESOURCES('jQuery/sweetalert.js') ?>"></script>

        <script src="<?= SECURITY() ?>"></script>

        <script src="<?= RESOURCES('customs/customjs.js') ?>"></script>
        <?php
        if(in_array("CY_TABLE", $arr)){
            if($arr['CY_TABLE']=="TRUE"){
                ADD_CY_TABLE();
            }
        }
    }
}

?>