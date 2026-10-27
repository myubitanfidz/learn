<?php
// satu perintah yang bisa beda setiap classnya
// method overriding, method yang sama tapi beda implementasi

echo "<pre>";

abstract class orang{
    protected $nama;
    protected $umur;
    protected $kelamin;
    protected $tinggi;
    protected $berat;

    public function __construct($nama, $umur, $kelamin, $tinggi, $berat){
        $this->nama = $nama;
        $this->setUmur($umur);
        $this->kelamin = $kelamin;
        $this->tinggi = $tinggi;
        $this->berat = $berat;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getUmur(){
        return $this->umur;
    }

    public function getKelamin(){
        return $this->kelamin;
    }

    public function getTinggi(){
        return $this->tinggi;
    }

    public function getBerat(){
        return $this->berat;
    }

    public function setUmur($umur){
        if($umur < 0){
            throw new InvalidArgumentException("Umur tidak boleh negatif.");
        }
        $this->umur = $umur;
    }

    public function perkenalanDiri(){
        echo "Halo, nama saya {$this->nama}, umur saya {$this->umur} tahun, jenis kelamin saya {$this->kelamin}, tinggi saya {$this->tinggi} cm, dan berat saya {$this->berat} kg.\n";
    }

    public function teriak(){
        echo "Aaaaarghh!\n";
    }

    public function ketawa(){
        echo "Hahaha!\n";
    }

    public function marah(){
        echo "Grrrrr!\n";
    }

    abstract public function sedih();
}


interface bisaBelajar {
    public function belajar();
}

class bocil extends orang{
    private $cintaMonyet;

    public function __construct($nama, $umur, $kelamin, $tinggi, $berat, $cintaMonyet){
        parent::__construct($nama, $umur, $kelamin, $tinggi, $berat);
        $this->cintaMonyet = $cintaMonyet;
    }

    public function nyatakanCintaMonyet(){
        echo "Aku " . $this->getNama() . " cinta monyet dengan {$this->cintaMonyet}!\n";
    }

    public function marah(){
        echo "aaaaaaaaaa!\n";
    }

    public function sedih(){
        echo "Huaaa!\n";
    }
}

class esempeh extends orang implements bisaBelajar{
    private $rankMobileLegends;

    public function __construct($nama, $umur, $kelamin, $tinggi, $berat, $rankMobileLegends){
        parent::__construct($nama, $umur, $kelamin, $tinggi, $berat);
        $this->rankMobileLegends = $rankMobileLegends;
    }

    public function tunjukkanRankMobileLegends(){
        echo "Rank Mobile Legends saya adalah {$this->rankMobileLegends}.\n";
    }

    public function marah(){
        echo "yahhhhh!\n";
    }

    public function sedih(){
        echo "Hiks hiks!\n";
    }

    public function belajar(){
        echo "Aku " . $this->getNama() . " sedang belajar dengan serius!\n";
    }
}


// ===== Bagian Orang =====

$bocil1 = new bocil("Budi", 10, "Laki-laki", 140, 35, "Siti");
$bocil1->teriak();
$bocil1->nyatakanCintaMonyet();

echo "\n";

$esempeh1 = new esempeh("Andi", 20, "Laki-laki", 170, 60, "Diamond");
$esempeh1->ketawa();
$esempeh1->tunjukkanRankMobileLegends();
echo $esempeh1->getNama() . "\n";

echo "\n";

try {
    $x = new orang("John", 20, "Laki-laki", 180, 75);
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n";

$a = new bocil("Alice", 8, "Perempuan", 125, 25, "Rudi");
$b = new bocil("Budi", 10, "Laki-laki", 140, 35, "Siti");
$c = new esempeh("Andi", 20, "Laki-laki", 170, 60, "Diamond");

$orangArray = [$a, $b, $c];

foreach ($orangArray as $orang) {
    $orang->perkenalanDiri();
    $orang->marah();
    $orang->sedih();   

    if ($orang instanceof bisaBelajar) {
        $orang->belajar();
    }

    echo "\n";
}

try {
    $bocil2 = new bocil("Cici", -3, "Perempuan", 130, 30, "Didi");
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n";


// ===== Bagian Hewan =====

abstract class Hewan {

    protected $nama;

    public function __construct($nama){
        $this->nama = $nama;
    }

    public function makan(){
        echo "{$this->nama} sedang makan.\n";
    }

    abstract public function suara();
}

interface jalanKaki {
    public function jalan();
}

interface terbang {
    public function terbang();
}


class kucing extends Hewan implements jalanKaki {

    public function suara(){
        echo "{$this->nama} berkata: Meong!\n";
    }

    public function jalan(){
        echo "{$this->nama} sedang berjalan di atas tanah.\n";
    }
}


class anjing extends Hewan implements jalanKaki {

    public function suara(){
        echo "{$this->nama} berkata: Guk guk!\n";
    }

    public function jalan(){
        echo "{$this->nama} sedang berjalan di atas tanah.\n";
    }
}

class burung extends Hewan implements terbang {

    public function suara(){
        echo "{$this->nama} berkata: Cuit cuit!\n";
    }

    public function terbang(){
        echo "{$this->nama} sedang terbang di udara.\n";
    }
}

$kucing1 = new kucing("Kitty");
$anjing1 = new anjing("Buddy");
$burung1 = new burung("Tweety");

$hewanArray = [$kucing1, $anjing1, $burung1];

foreach ($hewanArray as $hewan) {
    $hewan->makan();
    $hewan->suara();

    if ($hewan instanceof jalanKaki) {
        $hewan->jalan();
    }

    if ($hewan instanceof terbang) {
        $hewan->terbang();
    }

    echo "\n";
}