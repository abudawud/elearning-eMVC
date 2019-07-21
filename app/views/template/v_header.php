<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<html>

<head>
    <title>E-Leaning | <?= $title ?> </title>
    <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/css/table.css" rel="stylesheet">

</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <div id="navbar">
            <div class="c-flex nav">
                <div class="col-5 nav-title">E-Leaning</div>
                <div style="margin:auto" class="col-5 text-right">
                    <?php if ($_SESSION['is_login']) { ?>
                        <?= $_SESSION['person_name'] ?> ( <a href="<?= BASE_URL ?>c_login/logout">Logout</a> )
                    <?php } else { ?>
                        <a href="<?= BASE_URL ?>c_login">Login</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- END OF NAVBAR -->