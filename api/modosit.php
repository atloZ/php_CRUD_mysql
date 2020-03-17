<?php
    include 'config/config.php';

    echo $db_data->modosit($_REQUEST['id'], $_REQUEST['nev'], $_REQUEST['email']);
?>