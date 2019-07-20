<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
            <form method="post" action="<?= BASE_URL ?>c_mahasiswa/save">
                <input type="hidden" name="action" value="<?= $action ?>" />
                <input type="hidden" name="id" value="<?= $mahasiswa->id_mahasiswa ?>" />
                <table style="border: none;" cellpadding="5px" width="100%">
                    <tr>
                        <td align="right">NIM</td>
                        <td>:</td>
                        <td><input name="mahasiswa_nim" type="text" value="<?= $action == 'add' ? '' : $mahasiswa->nim ?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">Nama</td>
                        <td>:</td>
                        <td><input name="mahasiswa_nama" type="text" value="<?= $action == 'add' ? '' : $mahasiswa->nama ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">E-mail</td>
                        <td>:</td>
                        <td><input name="mahasiswa_email" type="text" value="<?= $action == 'add' ? '' : $mahasiswa->email ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Tanggal Lahir</td>
                        <td>:</td>
                        <td><input name="mahasiswa_tgl_lhr" type="text" value="<?= $action == 'add' ? '' : $mahasiswa->tgl_lhr ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Alamat</td>
                        <td>:</td>
                        <td><textarea name="mahasiswa_alamat" rows="3" ><?= $action == 'add' ? '' : $mahasiswa->alamat ?></textarea></td>
                    </tr>
                    <tr class="text-center bg-secondary">
                        <td colspan="3">
                            <a type="submit" style="margin:3px 0px 3px 0px" href="<?= BASE_URL ?>/c_mahasiswa" class="button btn-danger">BATAL</a>
                            <button style="margin:3px 0px 3px 0px" type="submit" class="button btn-primary">SIMPAN</a>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->