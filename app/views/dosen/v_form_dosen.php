<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
            <form method="post" action="<?= BASE_URL ?>c_dosen/save">
                <input type="hidden" name="action" value="<?= $action ?>" />
                <input type="hidden" name="id" value="<?= $dosen->id_dosen ?>" />
                <table style="border: none;" cellpadding="5px" width="100%">
                    <tr>
                        <td align="right">Nama</td>
                        <td>:</td>
                        <td><input name="dosen_name" type="text" value="<?= $action == 'add' ? '' : $dosen->nama ?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">NIDN</td>
                        <td>:</td>
                        <td><input name="dosen_nidn" type="text" value="<?= $action == 'add' ? '' : $dosen->nidn ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">E-mail</td>
                        <td>:</td>
                        <td><input name="dosen_email" type="text" value="<?= $action == 'add' ? '' : $dosen->email ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Tanggal Lahir</td>
                        <td>:</td>
                        <td><input name="dosen_tgl_lhr" type="text" value="<?= $action == 'add' ? '' : $dosen->tgl_lhr ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Alamat</td>
                        <td>:</td>
                        <td><textarea name="dosen_alamat" rows="3" ><?= $action == 'add' ? '' : $dosen->alamat ?></textarea></td>
                    </tr>
                    <tr class="text-center bg-secondary">
                        <td colspan="3">
                            <a type="submit" style="margin:3px 0px 3px 0px" href="<?= BASE_URL ?>/c_dosen" class="button btn-danger">BATAL</a>
                            <button style="margin:3px 0px 3px 0px" type="submit" class="button btn-primary">SIMPAN</a>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->