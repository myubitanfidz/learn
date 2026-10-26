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

    public function perkenalan() {
        echo "Halo, nama saya {$this->nama}. Saya mahasiswa jurusan {$this->jurusan}.\n";
    }

    public function IPK() {
        echo "IPK saya adalah {$this->ipk}.\n";
    }

    public function cumlaude() {
        if ($this->ipk >= 3.5) {
            echo "Saya lulus dengan predikat cumlaude.\n"; 
        } else {
            echo "Saya tidak lulus dengan predikat cumlaude.\n";
        }
    }

}

// Membuat objek dari class Mahasiswa
$nabil = new Mahasiswa("Nabil", "Teknik Informatika", 3.8, 5);
$hisyam = new Mahasiswa("Hisyam", "Sistem Informasi", 3.5, 4);


$nabil->cumlaude();
$nabil->perkenalan();

?>