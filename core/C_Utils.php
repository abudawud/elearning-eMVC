<?php
function redirect($url = null)
{
    header("Location: " . BASE_URL . $url); /* Redirect browser */

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}

function js_redirect($url, $msg = null){
    if($msg != null){
        echo "<script>alert(\"$msg\");</script>";
    }

    echo "<script>window.location = \"$url\"</script>";
}
