<?php

function deleteDirectory($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
    }
    return rmdir($dir);
}

deleteDirectory(getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "all" . DIRECTORY_SEPARATOR . "modules");
deleteDirectory(getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "all" . DIRECTORY_SEPARATOR . "themes");

//rmdir(getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "all" . DIRECTORY_SEPARATOR . "modules");
//rmdir(getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "all" . DIRECTORY_SEPARATOR . "themes");
symlink(getcwd() . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "site" . DIRECTORY_SEPARATOR, getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "site");
symlink(getcwd() . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "sites.php", getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "sites.php");
symlink(getcwd() . DIRECTORY_SEPARATOR . "var" . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "modules", getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "all" . DIRECTORY_SEPARATOR . "modules");
symlink(getcwd() . DIRECTORY_SEPARATOR . "var" . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "themes", getcwd() . DIRECTORY_SEPARATOR . "sites" . DIRECTORY_SEPARATOR . "all" . DIRECTORY_SEPARATOR . "themes");
