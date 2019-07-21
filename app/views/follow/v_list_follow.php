<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-10 m-auto">Mata Kuliah Yang Diikuti</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Pengampu</th>
                    <th>Buku Penunjang</th>
                    <th>Deskripsi Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $index = 0;
                foreach ($follow as $key => $item) {
                    $index++; ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $item->nm_matkul ?></td>
                        <td><?= $item->judul ?></td>
                        <td><?= $item->nama_dosen ?></td>
                        <td><?= $item->file_name ?></td>
                        <td><?= $item->keterangan_file ?></td>
                        <td align="center">
                            <a target="_blank" href='<?= UPLOAD_URL . $item->file_path?>'>Lihat Buku</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->