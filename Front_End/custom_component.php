<?php
/**
 * CodeYro Custom component
 *  
 */

 //You can call this function as CY_INPUT_FIELD('username);
if(! function_exists("CY_INPUT_FIELD")){ 
    function CY_INPUT_FIELD($name, $id='', $class='', $type="text"){
        ?>
        <input type="<?= $type ?>" name="<?=$name?>" class="<?=$class?>" id="<?=$id?>">
        <?php
    }
}

//add custom component here, see reference above or you can copy, paste and modify it

?>