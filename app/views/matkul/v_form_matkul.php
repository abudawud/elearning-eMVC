<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
            <table style="border: none;" cellpadding="5px" width="100%">
                <tr>
                    <td align="right">Nama</td>
                    <td>:</td>
                    <td><input type="text" /></td>
                </tr>
                <tr>
                    <td align="right">Judul</td>
                    <td>:</td>
                    <td><input type="text" /></td>
                </tr>
                <tr>
                    <td align="right">Deskripsi</td>
                    <td>:</td>
                    <td><textarea rows="3"></textarea></td>
                </tr>
                <tr>
                    <td align="right">File</td>
                    <td>:</td>
                    <td><input type="file" /></td>
                </tr>
                <tr class="text-center bg-primary">
                    <td colspan="3"><a style="margin:3px 0px 3px 0px" href="#" class="button">SIMPAN</a></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->