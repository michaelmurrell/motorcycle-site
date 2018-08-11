<?php 

require_once('config.php');

require __DIR__ . '/vendor/autoload.php';

$buildPath  = APP_DIR . '/../build';
$assetsPath = APP_DIR . '/assets/';

// remove build folder
use \Symfony\Component\Filesystem\Filesystem;

(new Filesystem)->remove($buildPath);

// mkdir build folder
(new Filesystem)->mkdir($buildPath);

// Copy assets (mirror for directies)
(new Filesystem)->mirror($assetsPath, $buildPath . '/assets');

foreach ($pages as $page) {

    $data->page = $page;

    ob_start();

    include_with('/components/header', $data);

    include_with('/pages/' . $page, $data);
    
    include_with('/components/footer');

    $output = ob_get_clean();

    $page = ($page == 'home')  ? 'index' : $page;

    $put_to = $buildPath . "/$page.html";

    file_put_contents($put_to, $output);

}