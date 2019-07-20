<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
            <form method="post" action="<?= BASE_URL ?>c_matkul/save">
                <input type="hidden" name="action" value="<?= $action ?>" />
                <input type="hidden" name="id" value="<?= $matkul->id_matkul ?>" />
                <table style="border: none;" cellpadding="5px" width="100%">
                    <tr>
                        <td align="right">Nama</td>
                        <td>:</td>
                        <td><input name="matkul_name" type="text" value="<?= $action == 'add' ? '' : $matkul->nm_matkul ?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">Judul</td>
                        <td>:</td>
                        <td><input name="matkul_title" type="text" value="<?= $action == 'add' ? '' : $matkul->judul ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Deskripsi</td>
                        <td>:</td>
                        <td><textarea name="matkul_desc" rows="3" ><?= $action == 'add' ? '' : $matkul->deskripsi ?></textarea></td>
                    </tr>
                    <tr class="text-center bg-secondary">
                        <td colspan="3">
                            <a type="submit" style="margin:3px 0px 3px 0px" href="<?= BASE_URL ?>c_matkul" class="button btn-danger">BATAL</a>
                            <button style="margin:3px 0px 3px 0px" type="submit" class="button btn-primary">SIMPAN</a>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->