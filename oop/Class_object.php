<?php

/// Class itu kaya blueprint untuk sebuah objek
Class Mahasiswa {
    public $nama;
    public $jurusan;
    public $ipk;
    public $semester;
    // Method itu kayak aksi atau fungsi yang dimiliki oleh sebuah objek
    public function perkenalan() {
        echo "Halo, nama saya " . $this->nama . ", saya mengambil jurusan " . $this->jurusan . " dengan IPK " . $this->ipk . " pada semester " . $this->semester . ".";
    }

}

// Membuat objek dari class Mahasiswa
$nabil = new Mahasiswa();
$nabil->nama = "Nabil";
$nabil->jurusan = "Teknik Informatika";
$nabil->ipk = 3.8;
$nabil->semester = 5;

$nabil->perkenalan();

?>