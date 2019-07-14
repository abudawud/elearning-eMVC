<?php if ( ! defined('ROOT')) exit('No direct script access allowed'); ?>

<html>
    <head>
        <title>Contoh</title>
    </head>
    <body>
        <h1>Halaman utama contoh</h1>
        <table>
            <tbody>
                <tr>
                    <td>Param:</td>
                    <td><?= $param ?></td>
                </tr>                
                <tr>
                    <td>Data 1:</td>
                    <td><?= $data1 ?></td>
                </tr>
                <tr>
                    <td>Data 2:</td>
                    <td><?= $data2 ?></td>
                </tr>
                <tr>
                    <td>Data 3:</td>
                    <td><?= $data3 ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>