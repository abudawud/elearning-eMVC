<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-5">Master Mata Kuliah</div>
            <div class="col-10 text-right">
                <a class="button" href="<?= BASE_URL ?>c_matkul/form/add/">TAMBAH MATA KULIAH</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($matkul as $key => $item) {
                    $index++; ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $item->nm_matkul ?></td>
                        <td><?= $item->judul ?></td>
                        <td><?= $item->deskripsi ?></td>
                        <td><?= $item->file ?></td>
                        <td>
                            <a href='<?= BASE_URL ?>c_matkul/form/view/<?= $item->id_matkul ?>'>View</a> /
                            <a href='<?= BASE_URL ?>c_matkul/form/edit/<?= $item->id_matkul ?>'>Edit</a> /
                            <a href='<?= BASE_URL ?>c_matkul/form/delete/<?= $item->id_matkul ?>'>Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->