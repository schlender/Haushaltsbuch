<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once './class/settings.class.php';
include_once './class/config.class.php';
include_once './system/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Haushaltsbuch</title>
        <link rel="stylesheet" href="<?php echo $CFG->DOMAIN; ?>/css/font-awesome-4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo $CFG->DOMAIN; ?>/css/app.css"/>
        <!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"/ -->
        
    </head>
    <body>

        <?php
        #include_once 'page/index.html';
        include_once $CFG->EDIT_PATH . 'insert_cost.php';
        ?>

        <script type="text/javascript" src="<?php echo $CFG->DOMAIN; ?>/js/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="<?php echo $CFG->DOMAIN; ?>/js/jquery_tablesorter/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="<?php echo $CFG->DOMAIN; ?>/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        
        <script type="text/javascript" src="<?php echo $CFG->DOMAIN; ?>/js/default.js"> </script>

    </body>
</html>
