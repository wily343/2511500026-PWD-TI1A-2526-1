<?php

function bersihkan($str)
{
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}


function tidakkosong($str)
{
    return strlen(trim($str)) > 0;
}


function formattanggal($tgl)
{
    if (empty($tgl) || strtotime($tgl) === false) {
        return $tgl; 
    }

    return date("d-m-Y", strtotime($tgl));
}


function tampilkanBiodata($conf, $arr)
{
    $html = "";

    foreach ($conf as $k => $v) {

        $label  = $v["label"];
        $nilai  = bersihkan($arr[$k] ?? '');
        $suffix = $v["suffix"];

    
        if ($k === "tanggal") {
            $nilai = formattanggal($nilai);
        }

        $html .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
    }

    return $html;
}

?>
