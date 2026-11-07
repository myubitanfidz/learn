<?php
echo "<pre>";

// ============ ABSTRACTION: abstract class = template/kontrak ============
// CLASS = cetak biru. Tidak bisa dibuat object langsung karena abstract.
abstract class Hewan {

    // PROPERTY + ENCAPSULATION
    private $umur;        // private   : hanya class ini
    protected $nama;      // protected : class ini + turunannya

    // CONSTRUCTOR: jalan otomatis saat "new", mengisi data sejak lahir
    public function __construct($nama, $umur) {
        $this->nama = $nama;
        $this->setUmur($umur);   // lewat setter supaya divalidasi
    }

    // GETTER: pintu untuk membaca
    public function getUmur() {
        return $this->umur;
    }

    // SETTER: pintu untuk mengubah, dengan penjaga (exception)
    public function setUmur($umur) {
        if ($umur < 0) {
            throw new InvalidArgumentException("Umur tidak boleh negatif.");
        }
        $this->umur = $umur;
    }

    // METHOD biasa: diwariskan ke semua anak
    public function makan() {
        echo "{$this->nama} sedang makan.\n";
    }

    // METHOD ABSTRACT: anak WAJIB menulis isinya sendiri
    abstract public function suara();
}

// INTERFACE: kontrak kemampuan ("bisa")
interface BisaTerbang {
    public function terbang();
}

// ============ INHERITANCE: extends ============
class Kucing extends Hewan {

    // POLYMORPHISM (override): nama sama, isi beda
    public function suara() {
        echo "{$this->nama}: Meong!\n";
    }

    // override + tambah perilaku lewat parent::
    public function makan() {
        parent::makan();
        echo "{$this->nama} makan sambil mendengkur.\n";
    }
}

class Burung extends Hewan implements BisaTerbang {
    private $jenis;

    public function __construct($nama, $umur, $jenis) {
        parent::__construct($nama, $umur);   // isi bagian warisan
        $this->jenis = $jenis;
    }

    public function suara() {
        echo "{$this->nama}: Cuit!\n";
    }

    public function terbang() {
        echo "{$this->nama} ({$this->jenis}) terbang di udara.\n";
    }
}

// ============ OBJECT: hasil cetakan dari class ============
$semuaHewan = [
    new Kucing("Kitty", 3),
    new Burung("Tweety", 1, "Kenari"),
];

// POLYMORPHISM: perintah sama, hasil beda tiap object
foreach ($semuaHewan as $h) {
    $h->makan();
    $h->suara();

    // instanceof: hanya panggil method yang pasti ada
    if ($h instanceof BisaTerbang) {
        $h->terbang();
    }

    echo "Umur: " . $h->getUmur() . "\n\n";
}

// ============ EXCEPTION: data tidak valid -> object batal lahir ============
try {
    $rusak = new Kucing("Rusak", -1);
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Abstract class tidak bisa dibuat object (yang dilempar adalah Error)
try {
    $x = new Hewan("X", 1);
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . "\n";
}