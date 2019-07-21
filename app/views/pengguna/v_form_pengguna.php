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
                        <td align="right">Level</td>
                        <td>:</td>
                        <td>
                            <!-- <input name="pengguna_level" type="text" value="<?= $action == 'add' ? '' : $pengguna->level ?>"/></td> -->
                            <select onchange="updateUser(this)" id="level" name="pengguna_level">
                                <option>--Select Level--</option>
                                <option value="2">Dosen</option>
                                <option value="3">Mahasiswa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Nama Pengguna</td>
                        <td>:</td>
                        <td>
                            <select id="user_list" name="id_pengguna">
                                <option value="0">--Select User--</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Username</td>
                        <td>:</td>
                        <td><input name="pengguna_user" type="text" value="<?= $action == 'add' ? '' : $pengguna->user ?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td>:</td>
                        <td><input name="pengguna_password" type="text" value="<?= $action == 'add' ? '' : $pengguna->password ?>" /></td>
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
<script>
const dosen = <?= $dosen?>;
const mahasiswa = <?= $mahasiswa ?>;

function updateUser(el){
    const penggunaEl = document.getElementById('user_list');
    switch(el.value){
        case '2': // DOSEN
            const dOption = dosen.map((e) => (
                `<option value="${e.id_dosen}">${e.nama}</option>`
            ));
            penggunaEl.innerHTML = '<option>--Select Level--</option>' + dOption.join(' ');
            break;
        case '3': // MAHASISWA
            const mOption = mahasiswa.map((e) => (
                `<option value="${e.id_mahasiswa}">${e.nama}</option>`
            ));
            penggunaEl.innerHTML = '<option>--Select Level--</option>' + mOption.join(' ');
            break;
    }
}
</script>