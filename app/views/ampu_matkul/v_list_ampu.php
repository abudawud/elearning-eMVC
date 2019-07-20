<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-10 m-auto">Mata Kuliah Yang Diampu</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>File</th>
                    <th>Deskripsi File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $index = 0;
                foreach ($ampu as $key => $item) {
                    $index++; ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $item->nm_matkul ?></td>
                        <td><?= $item->judul ?></td>
                        <td><?= $item->file_name ?></td>
                        <td><?= $item->keterangan_file ?></td>
                        <td align="center">
                            <a href='javascript:edit("<?= $item->id_matkul ?>");'>Lihat</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->
<script>
function edit(id){
    if(confirm("Edit matakuliah yang telah diampu ?") ){
        window.location = "<?= BASE_URL ?>c_ampu/edit/" + id;
    }else{
        alert("Aksi dibatalkan!");
    }
}
</script>