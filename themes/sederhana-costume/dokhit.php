<?php
  
  include '../../desa/config/database.php';
    $db = $db['default'];
    $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);

    $result = $mysqli->query("SHOW COLUMNS FROM `dokumen` LIKE 'hit'");

    $exists = (mysqli_num_rows($result))?TRUE:FALSE;

    if(!$exists)
    {
        $mysqli->query("ALTER TABLE `dokumen` ADD `hit` INT NOT NULL DEFAULT '0' AFTER `attr`");
    }

    $mysqli->query("UPDATE `dokumen` SET `hit` = hit +1 WHERE `dokumen`.`id` = ".intval($_GET['id']));

    $data = $mysqli->query('select satuan from dokumen where id = '.intval($_GET['id']));

    echo mysqli_fetch_array($data)['satuan'];

