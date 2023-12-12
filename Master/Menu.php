<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/oop/myappupdate/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'Admin', 'link' => $base . 'admin'),
            array('text' => 'Barang', 'link' => $base . 'barang'),
            array('text' => 'Pemilik', 'link' => $base . 'pemilik')
        ];
        return $data;
    }
}
