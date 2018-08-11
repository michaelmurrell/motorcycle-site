<?php 

include 'config.php';

// remove build folder
use Symfony\Component\Filesystem\Filesystem;

(new Filesystem)->remove(APP_DIR . '/../build');

// mkdir build folder
(new Filesystem)->mkdir(APP_DIR . '/../build');

// Copy assets

(new Filesystem)->mkdir(APP_DIR . '/assets', APP_DIR . '/../build');

foreach ($pages as $page) {

    $data->page = $page;

    ob_start();

    include_with('/components/header', $data);

    include_with('/pages/' . $page, $data);
    
    include_with('/components/footer');

    $output = ob_get_clean();

    $put_to = APP_DIR . '/../build/' . "$page.html";
    error_log($put_to);

    file_put_contents($put_to, $output);

}