<?php require('config.php'); ?>

<?php include_with('/components/header', $data); ?>

<?php include_with('/pages/' . $page, $data); ?>

<?php include_with('/components/footer'); ?>