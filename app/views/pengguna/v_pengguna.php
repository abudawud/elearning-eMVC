<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title c-flex">
            <div class="col-5">Master Pengguna</div>
            <div class="col-10 text-right">
                <a class="button btn-primary" href="<?= BASE_URL ?>c_pengguna/form/add/">TAMBAH PENGGUNA</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($pengguna as $key => $item) {
                    $index++; ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $item->user ?></td>
                        <td><?= $item->password ?></td>
                        <td><?= $item->level ?></td>
                        <td>
                            <a href='<?= BASE_URL ?>c_pengguna/form/edit/<?= $item->id_pengguna ?>'>Edit</a> /
                            <a href='javascript:del("<?= $item->id_pengguna ?>");'>Delete</a>
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
            window.location = "<?= BASE_URL ?>c_pengguna/delete/" + id;
        } else {
            alert("Aksi dibatalkan!");
        }
    }
</script>