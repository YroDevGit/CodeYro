<?php
/** 
 * CodeYRO scripts
 */
if(! function_exists("ADD_REACT_SCRIPTS")){
    function ADD_REACT_SCRIPTS(){
        /** ==> Void
         * ReactJS
         * [React-dom, babel, Axios]
         */
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
        /** ==> Void
         * Required jQuery to be effective
         */
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


if(! function_exists("ADD_JQUERY_SCRIPTS")){
    function ADD_JQUERY_SCRIPTS($arr = ["JQUERY"=>"TRUE"]){
        /** ==> Void
         * 
         */
        ?>
        
        <link rel="stylesheet" href="<?= RESOURCES('jQuery/sweetalert2.min.css') ?>">

        <?php if(isset($arr["JQUERY"])): ?>
            <?php if($arr["JQUERY"]=="TRUE"): ?>
                <script src="<?= RESOURCES('jQuery/jquery.js') ?>"></script>
            <?php endif; ?>
        <?php endif; ?>
        <script src="<?= RESOURCES('jQuery/swal.js') ?>"></script>
        <script src="<?= RESOURCES('jQuery/sweetalert.js') ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_ENCRYPTION")){
    function ADD_ENCRYPTION(){
        /** ==> Void
         * 
         */
        ?>
        <script src="<?= SECURITY() ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_CUSTOMS")){
    function ADD_CY_SCRIPTS(){
        /** ==> Void
         * 
         */
        ?>
        <script src="<?= RESOURCES('customs/customjs.js') ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_ALL_SCRIPTS")){
    function ADD_ALL_SCRIPTS($arr = ["CY_TABLE"=>"FALSE", "JQUERY"=>"TRUE", "REACT"=>"TRUE"]){
        /** ==> Void
         *  Load all CY js scripts
         * [REACT, JQUERY, ENCRYPTION, CY_TABLE]
         */
        ?>
        <?php if(isset($arr["REACT"])): ?>
            <?php if($arr['REACT']=="TRUE"): ?>
                <script src="<?= RESOURCES('react/react.js') ?>"></script>
                <script src="<?= RESOURCES('react/react-dom.js') ?>"></script>
                <script src="<?= RESOURCES('react/babel.js') ?>"></script>
                <script src="<?= RESOURCES('react/axios.js') ?>"></script>
                <script src="<?= RESOURCES('react/reactCustom.js') ?>"></script>
            <?php endif; ?>
        <?php endif; ?>

        <?php ADD_JQUERY_SCRIPTS($arr); ?>

        <script src="<?= SECURITY() ?>"></script>

        <script src="<?= RESOURCES('customs/customjs.js') ?>"></script>
        <?php
        if(isset($arr['CY_TABLE'])){
            if($arr['CY_TABLE']=="TRUE"){
                ADD_CY_TABLE();
            }
        }
    }
}

?>