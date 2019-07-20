<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
            <form enctype="multipart/form-data" method="post" action="<?= BASE_URL ?>c_ampu/save">
                <input type="hidden" name="id_matkul" value="<?= $matkul->id_matkul ?>" />
                <table style="border: none;" cellpadding="5px" width="100%">
                    <tr>
                        <td align="right">Kode</td>
                        <td>:</td>
                        <td><input disabled type="text" value="<?= $matkul->nm_matkul ?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">Nama</td>
                        <td>:</td>
                        <td><input disabled type="text" value="<?= $matkul->judul ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Deskripsi</td>
                        <td>:</td>
                        <td><textarea disabled rows="3" ><?= $matkul->deskripsi ?></textarea></td>
                    </tr>
                    <tr class="text-center bg-secondary">
                        <td align="center" colspan="3">Penunjang Matakuliah</td>
                    </tr>
                    <tr>
                        <td align="right">File</td>
                        <td>:</td>
                        <td><input name="file" type="file"/></td>
                    </tr>
                    <tr>
                        <td align="right">Deskripsi File</td>
                        <td>:</td>
                        <td><textarea name="desc_file" rows="3" ></textarea></td>
                    </tr>

                    <tr class="text-center bg-secondary">
                        <td colspan="3">
                            <a type="submit" style="margin:3px 0px 3px 0px" href="<?= BASE_URL ?>c_ampu" class="button btn-danger">BATAL</a>
                            <button style="margin:3px 0px 3px 0px" type="submit" class="button btn-primary">SIMPAN</a>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->