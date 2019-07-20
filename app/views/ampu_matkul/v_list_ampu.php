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
                        <td><?= $item->deskripsi ?></td>
                        <td align="center">
                            <a href='javascript:ampu("<?= $item->id_matkul ?>");'>Ampu</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- END OF CONTAINER -->
<script>
function ampu(id){
    if(confirm("Yakin ingin mengampu matakuliah ini ?") ){
        window.location = "<?= BASE_URL ?>c_ampu/add/" + id;
    }else{
        alert("Aksi dibatalkan!");
    }
}
</script>