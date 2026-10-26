<?php

/// Class itu kaya blueprint untuk sebuah objek
Class Mahasiswa {
    public $nama;
    public $jurusan;
    public $ipk;
    public $semester;
    // Method itu kayak aksi atau fungsi yang dimiliki oleh sebuah objek
    public function __construct($nama, $jurusan, $ipk, $semester) {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->ipk = $ipk;
        $this->semester = $semester;
    }

}

// Membuat objek dari class Mahasiswa
$nabil = new Mahasiswa("Nabil", "Teknik Informatika", 3.8, 5);

$nabil->perkenalan();

?>