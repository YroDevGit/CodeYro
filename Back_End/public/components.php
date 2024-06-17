<?php

function showSuccess(){
    ?>
    <div id="todax" align='center'>
            <div class="todal-body">
                <div>
                    <div class="todal-header">
                        <h4>Data added</h4>
                    </div>
                    <div>
                        <div>
                            <div>
                                <h1>✔</h1>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" type="button" onclick="document.getElementById('todax').style.display='none';">OKAY</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
}

function showDeleted(){
    ?>
    <div id="todax" align='center'>
            <div class="todal-body">
                <div>
                    <div class="todal-header">
                        <h4>Data Deleted</h4>
                    </div>
                    <div>
                        <div>
                            <div>
                                <h1>✔</h1>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" type="button" onclick="document.getElementById('todax').style.display='none';">OKAY</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
}

function showError($error_message){
    ?>
    <div id="todax" align='center'>
            <div class="todal-body">
                <div>
                    <div class="todal-header">
                        <h4>Error updating data</h4>
                    </div>
                    <div>
                        <div>
                            <div>
                                <span class="text-danger"><?= $error_message ?></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" type="button" onclick="document.getElementById('todax').style.display='none';">OKAY</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
}

function showMessage($title, $copies){
    ?>
    <div id="todax" align='center'>
            <div class="todal-body">
                <div>
                    <div class="todal-header">
                        <h4><?= $title ?></h4>
                    </div>
                    <div>
                        <div>
                            <div>
                                <h1><?= $copies ?></h1>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" type="button" onclick="document.getElementById('todax').style.display='none';">OKAY</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
}

?>