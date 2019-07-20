<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-5 m-auto">Master Mata Kuliah</div>
            <div class="col-10 text-right">
                <a class="button btn-primary" href="<?= BASE_URL ?>c_matkul/form/add/">TAMBAH MATA KULIAH</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
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
                        <td align="center">
                            <a href='<?= BASE_URL ?>c_matkul/form/edit/<?= $item->id_matkul ?>'>Edit</a> /
                            <a href='javascript:del("<?= $item->id_matkul ?>");'>Delete</a>
                        </td>
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
            window.location = "<?= BASE_URL ?>c_matkul/delete/" + id;
        } else {
            alert("Aksi dibatalkan!");
        }
    }
</script>