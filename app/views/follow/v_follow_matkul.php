<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-10 m-auto">Ikuti Matakuliah > <a href="<?= BASE_URL ?>c_follow">...</a> > Pilih Matakuliah</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kode</th>
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
                            <a href='javascript:follow("<?= $item->id_dosen_teachs ?>");'>Ikuti</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->
<script>
    function follow(id) {
        if (confirm("Yakin ingin mengikitu matakuliah ini ?")) {
            window.location = `<?= BASE_URL ?>c_follow/follow/${id}/` + <?= $id_dosen ?>;
        } else {
            alert("Aksi dibatalkan!");
        }
    }
</script>