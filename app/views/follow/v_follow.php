<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-10 m-auto">Ikuti Matakuliah > Pilih Dosen Pengampu</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>E-mail</th>
                    <th>Alamat</th>
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
                        <td><?= $item->alamat ?></td>
                        <td>
                            <a href='<?= BASE_URL ?>c_follow/matkul/<?= $item->id_dosen ?>'>Lihat</a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->