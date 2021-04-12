<?php

function auth()
{
    //cek sudah login atau belum
    if (!isset($_SESSION['nip'])) {
        header("location: " . base_url() . "/landingpage");
        die;
    }
}
