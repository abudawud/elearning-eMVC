<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-5">Master Dosen</div>
            <div class="col-10 text-right">
                <a class="button btn-primary" href="<?= BASE_URL ?>c_dosen/form/add/">TAMBAH DOSEN</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>E-mail</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($dosen as $key => $item) {
                    $index++; ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->nidn ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->tgl_lhr ?></td>
                        <td><?= $item->alamat ?></td>
                        <td><?= $item->foto ?></td>
                        <td>
                            <a href='<?= BASE_URL ?>c_dosen/form/edit/<?= $item->id_dosen ?>'>Edit</a> /
                            <a href='<?= BASE_URL ?>c_dosen/form/delete/<?= $item->id_dosen ?>'>Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->