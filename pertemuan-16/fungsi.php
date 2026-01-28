<?php
function bersihkan($data) {
    return htmlspecialchars(trim($data));
}

function redirect_ke($url) {
    header("Location: $url");
    exit;
}
