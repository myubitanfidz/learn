<?php

class Mahasiswa {
    // Data dikunci
    private $nama;
    private $jurusan;
    private $ipk;
    private $semester;

    public function __construct($nama, $jurusan, $ipk, $semester) {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->setIpk($ipk);            // lewat setter, supaya divalidasi
        $this->setSemester($semester);  // lewat setter, supaya divalidasi
    }

    // Getter: pintu untuk membaca
    public function getNama() {
        return $this->nama;
    }

    public function getJurusan() {
        return $this->jurusan;
    }

    public function getIpk() {
        return $this->ipk;
    }

    public function getSemester() {
        return $this->semester;
    }

    // Setter: pintu untuk mengubah, dengan penjaga
    public function setIpk($ipk) {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException("IPK harus berada di antara 0 dan 4.");
        }
        $this->ipk = $ipk;
    }

    public function setSemester($semester) {
        if ($semester < 1 || $semester > 14) {
            echo "Semester harus berada di antara 1 dan 14.\n";
            return;
        }
        $this->semester = $semester;
    }

    // Method aksi
    public function perkenalan() {
        echo "Halo, nama saya {$this->nama}. Saya mahasiswa jurusan {$this->jurusan}.\n";
    }

    public function tampilkanIpk() {
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

$nabil = new Mahasiswa("Nabil", "Teknik Informatika", 3.8, 5);

$nabil->perkenalan();
$nabil->tampilkanIpk();




$ihsan = new Mahasiswa("Ihsan", "Sistem Informasi", 3, 3);

echo "<br> ";
$ihsan->perkenalan();
$ihsan->tampilkanIpk();

echo "<br> ";

try {
    $hapis = new Mahasiswa("Hapis", "Teknik Elektro", 9.1, 15);
    echo "berhasil membuat objek Hapis.\n";
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}