<?php if (!defined('ROOT')) exit('No direct script access allowed'); ?>

<!-- CONTAINER -->
<div id="container">
    <div class="content">
        <div class="content-title">
            <?= $title ?>
        </div>

        <div class="content" style="margin-left:50px">
        <form method="post" action="<?= BASE_URL ?>c_dosen/save">
                <table style="border: none;" cellpadding="5px" width="100%">
                    <tr>
                        <td align="right">Username</td>
                        <td>:</td>
                        <td><input name="username" type="text" /></td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td>:</td>
                        <td><input name="password" type="password" /></td>
                    </tr>
                    <tr class="text-center bg-secondary">
                        <td colspan="3">
                            <button style="margin:3px 0px 3px 0px" type="submit" class="button btn-primary">Login</a>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<!-- END OF CONTAINER -->