<?php 

define('APP_DIR', __DIR__);

function include_with($componentPath, $data = []) {
    include(APP_DIR . $componentPath . '.php');
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

$pages = array_map(function($page) {
    return str_replace('.php', '', basename($page));
}, glob(APP_DIR . '/pages/*'));

switch ($_SERVER['REQUEST_URI']) {

    case '/':
    case '/index.html': 
        $page = 'home';
        break;
    default:
        $page = preg_replace('#^/(.*?)\.html#', '$1', $_SERVER['REQUEST_URI']);
        $page = (in_array($page, $pages)) ? $page : '404';
}

function get_page_title($page) {

    switch ($page) {
        case '404':
            $title = 'Biker Michael - Ooops! 404';
            break;
        case 'build-plans':
            $title = 'Biker Michael - Build Plans';
            break;
        case 'buy-parts':
            $title = 'Biker Michael - Buy Parts';
            break;
        case 'contact':
            $title = 'Biker Michael - Contact';
            break;
        case 'gallery':
            $title = 'Biker Michael - Gallery';
            break;
        case 'history':
            $title = 'Biker Michael - History';
            break;
        case 'progress':
            $title = 'Biker Michael - Progress';
            break;
        case 'home':
            $title = 'Biker Michael - Building a Cafe Racer';
            break;
    }

    return $title;
}

$gallery = [
    (object) [
        'src'       => 'assets/images/gallery/greenk100.jpg',
        'source'    => 'https://i.redd.it/eugfckp55vvz.jpg',
        'caption'   => 'BMW K100 build by Ironwood Customs',
    ],
    (object) [
        'src'       => 'assets/images/gallery/k100orange.jpg',
        'source'    => 'ttps://kevzaddress.files.wordpress.com/2016/10/bmw-k100-rebuild-9.jpg',
        'caption'   => 'BMW K100 build by Paul Hutchison',
    ],
    (object) [
        'src'       => 'assets/images/gallery/redk100.jpg',
        'source'    => 'https://i.ytimg.com/vi/V5P_qyGkv74/maxresdefault.jpg',
        'caption'   => 'BMW K100 build by Z17 Customs',
    ],
    (object) [
        'src'       => 'assets/images/gallery/blackk100.jpg',
        'source'    => 'https://caferacerpasion.tumblr.com/image/160496773258',
        'caption'   => 'BMW K100RS build by Hageman Motorcycles',
    ],
    (object) [
        'src'       => 'assets/images/gallery/chef.jpg',
        'source'    => 'https://bikebrewers.com/wp-content/uploads/2018/06/BMW-K100RS-Cafe-Racer-8.jpg',
        'caption'   => 'BMW K100RS build by Motochef',
    ],
    (object) [
        'src'       => 'assets/images/gallery/z17orange.jpg',
        'source'    => 'https://2.bp.blogspot.com/-ID6mUe-H4yc/WX5HesapR1I/AAAAAAABWk4/2l79equ3C-YeZC-i9H9GWjE0gcprcQMZwCLcBGAs/s1600/K100%2B02.jpg',
        'caption'   => 'BMW K100 build by Z17 Customs',
    ],
    (object) [
        'src'       => 'assets/images/gallery/k100.jpg',
        'source'    => 'http://thebikeshed.cc/wp-content/uploads/2016/12/DeAngelisElaborazioni-K100-12-of-19.jpg',
        'caption'   => 'BMW K1100 build by De Angelis Elaborazioni',
    ],
    (object) [
        'src'       => 'assets/images/gallery/mikek100.jpg',
        'source'    => 'http://kickstart.bikeexif.com/wp-content/uploads/2017/01/custom-bmw-k100-motorcycle-1.jpg',
        'caption'   => 'BMW K100 build by Mike Flores',
    ],
    (object) [
        'src'       => 'assets/images/gallery/impuls.jpg',
        'source'    => 'http://kickstart.bikeexif.com/wp-content/uploads/2016/03/k100-5.jpg',
        'caption'   => 'BMW K100 build by Impuls',
    ],
    (object) [
        'src'       => 'assets/images/gallery/retrorides.jpg',
        'source'    => 'http://retroridesbylourenco.wixsite.com/brasil?lightbox=dataItem-ix8vq7lp',
        'caption'   => 'BMW K100 build by Retrorides',
    ],
];

$parts = [
    (object) [
        'src'           => 'assets/images/parts/saddle.jpg',
        'source_url'    => 'http://silvermachine.nl/?s=k75',
        'source_name'   => 'Silvermachine',
        'title'         => 'Saddle',
        'description'   => 'Brown Leather Saddle',
    ],
    (object) [
        'src'           => 'assets/images/parts/led-tail-light.jpg',
        'source_url'    => 'https://www.dimecitycycles.com/flexible-led-integrated-tail-light-indicators.html',
        'source_name'   => 'Dime City Cycles',
        'title'         => 'LED Tail lights',
        'description'   => '8" Flexible LED Integrated Tail Light / Indicators',
    ],
    (object) [
        'src'           => 'assets/images/parts/headlight.jpg',
        'source_url'    => 'https://www.maxinc.co.za/collections/headlights/products/max-7-7-inch-matte-black-large-mesh-grill-headlight',
        'source_name'   => 'MAX-Inc',
        'title'         => 'Head Light',
        'description'   => 'MAX 7.5" Matte Black Large Mesh Grill Headlight',
    ],
    (object) [
        'src'           => 'assets/images/parts/speedo.jpg',
        'source_url'    => 'https://www.dimecitycycles.com/acewell-md085-553-digital-multifunction-tachometer-speedometer-12-000-rpm.html',
        'source_name'   => 'Dime City Cycles',
        'title'         => 'Instrument Cluster',
        'description'   => 'Acewell MD085-553 Digital Multifunction Tachometer/Speedometer',
    ],
    (object) [
        'src'           => 'assets/images/parts/bars.jpg',
        'source_url'    => 'https://cafe4racer.eu/en/clip-ons-cafe-racer-handlebars/195-41mm-handlebars-clip-ons-bmw-k100-k75-k1100.html?search_query=k75+bars&results=1',
        'source_name'   => 'Cafe4racer',
        'title'         => 'Handlebars',
        'description'   => 'Universal adjustable clip-ons',
    ],
    (object) [
        'src'           => 'assets/images/parts/exhaust.jpg',
        'source_url'    => 'http://www.bskspeedworks.co.uk/k-exhaust.html',
        'source_name'   => 'BSK Speedworks',
        'title'         => 'Exhaust',
        'description'   => 'Pro-Race Exhaust',
    ],
    (object) [
        'src'           => 'assets/images/parts/shock.jpg',
        'source_url'    => 'https://cafe4racer.eu/en/suspension/790-yss-bmw-k100-k75-mono-shock-mz366-350trl-01.html',
        'source_name'   => 'Cafe4racer',
        'title'         => 'Suspension',
        'description'   => 'YSS BMW K100 / K75 Mono Shock',
    ],

];

$title = get_page_title($page);

$data = (object) compact('page', 'gallery', 'parts', 'title');

?>