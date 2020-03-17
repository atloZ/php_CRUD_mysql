<?php
    include 'config/config.php';

    echo $db_data->hozzaad($_REQUEST['nev'], $_REQUEST['email']);
?>