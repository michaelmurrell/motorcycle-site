<?php 

include 'config.php';

// remove build folder

// mkdir build folder

// Copy assets

recurse_copy(APP_DIR . '/assets/', APP_DIR . '/../build/');

foreach ($pages as $page) {

    $data->page = $page;

    ob_start();

    include_with('/components/header', $data);

    include_with('/pages/' . $page, $data);
    
    include_with('/components/footer');

    $output = ob_get_clean();

    file_put_contents("$page.html", $output);

}