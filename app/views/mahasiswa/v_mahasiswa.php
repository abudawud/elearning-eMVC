<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-5">Master Mahasiswa</div>
            <div class="col-10 text-right">
                <a class="button btn-primary" href="<?= BASE_URL ?>c_mahasiswa/form/add/">TAMBAH MAHASISWA</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>E-mail</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($mahasiswa as $key => $item) {
                    $index++; ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $item->nim ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->tgl_lhr ?></td>
                        <td><?= $item->alamat ?></td>
                        <td>
                            <a href='<?= BASE_URL ?>c_mahasiswa/form/edit/<?= $item->id_mahasiswa ?>'>Edit</a> /
                            <a href='javascript:del("<?= $item->id_mahasiswa ?>");'>Delete</a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->
<script>
    function del(id) {
        if (confirm("Yakin ingin menghapus data?")) {
            window.location = "<?= BASE_URL ?>c_mahasiswa/delete/" + id;
        } else {
            alert("Aksi dibatalkan!");
        }
    }
</script>