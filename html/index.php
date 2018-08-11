<?php require_once('config.php'); ?>

<?php include_with('/components/header', $data); ?>

<?php include_with('/pages/' . $page, $data); ?>

<?php include_with('/components/footer'); ?>

<?php include_once('build.php'); ?>