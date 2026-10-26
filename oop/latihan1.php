<?php

Class Santri {
    public $nama;
    public $jurusan;
    public $ipk;
    public $semester;

    public function perkenalan() {
        echo "Halo, nama saya " . $this->nama . ", saya mengambil jurusan " . $this->jurusan . " dengan IPK " . $this->ipk . " pada semester " . $this->semester . ".";
    }

}

$nabil = new Santri();
$nabil->nama = "Nabil";
$nabil->jurusan = "Teknik Informatika";
$nabil->ipk = 3.8;
$nabil->semester = 5;

$nabil->perkenalan();

?>