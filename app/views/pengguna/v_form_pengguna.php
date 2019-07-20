<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
            <form method="post" action="<?= BASE_URL ?>c_pengguna/save">
                <input type="hidden" name="action" value="<?= $action ?>" />
                <input type="hidden" name="id" value="<?= $pengguna->id_pengguna ?>" />
                <table style="border: none;" cellpadding="5px" width="100%">
                    <tr>
                        <td align="right">USER</td>
                        <td>:</td>
                        <td><input name="pengguna_user" type="text" value="<?= $action == 'add' ? '' : $pengguna->user ?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td>:</td>
                        <td><input name="pengguna_password" type="text" value="<?= $action == 'add' ? '' : $pengguna->password ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Level</td>
                        <td>:</td>
                        <td><input name="pengguna_level" type="text" value="<?= $action == 'add' ? '' : $pengguna->level ?>"/></td>
                    </tr>
                    <tr class="text-center bg-secondary">
                        <td colspan="3">
                            <a type="submit" style="margin:3px 0px 3px 0px" href="<?= BASE_URL ?>c_pengguna" class="button btn-danger">BATAL</a>
                            <button style="margin:3px 0px 3px 0px" type="submit" class="button btn-primary">SIMPAN</a>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->