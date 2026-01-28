<?php
function bersihkan($data) {
    if (!is_string($data)) {
        return '';
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function redirect_ke($url) {
    header("Location: $url");
    exit;
}
