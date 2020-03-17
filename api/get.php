<?php
    include 'config/config.php';

    echo $db_data->get($_REQUEST['id']);
?>