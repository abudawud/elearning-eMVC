<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- SIDEBAR -->
<div id="sidebar">
    <div class="menu">
        <ul>
            <?php foreach ($sidebar as $key => $item) {
                echo $item;
            }
            ?>
            <!-- <li><a href="<?= BASE_URL ?>c_home">Beranda</a></li>
            <li><a href="<?= BASE_URL ?>c_matkul">Master Matakuliah</a></li>
            <li><a href="<?= BASE_URL ?>c_dosen">Master Dosen</a></li>
            <li><a href="<?= BASE_URL ?>c_mahasiswa">Master Mahasiswa</a></li>
            <li><a href="<?= BASE_URL ?>c_pengguna">Master Pengguna</a></li>
            <li><a href="<?= BASE_URL ?>c_ampu">Ampu Matakuliah</a></li>
            <li><a href="<?= BASE_URL ?>c_ampu/list">Matakuliah Diampu</a></li>
            <li><a href="<?= BASE_URL ?>c_follow">Ikuti Matakuliah</a></li> -->
        </ul>
    </div>
</div>
<!-- END OF SIDEBAR -->