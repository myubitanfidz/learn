<?php
// satu perintah yang bisa beda setiap classnya
// method overriding, method yang sama tapi beda implementasi

class orang{
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
            throw new InvalidArgumentException("Umur tidak boleh negatif.\n");
            return;
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
}

class esempeh extends orang{
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
}




$bocil1 = new bocil("Budi", 10, "Laki-laki", 140, 35, "Siti");
$bocil1->teriak();
$bocil1->nyatakanCintaMonyet();

echo "<br>";

$esempeh1 = new esempeh("Andi", 20, "Laki-laki", 170, 60, "Diamond");
$esempeh1->ketawa();
$esempeh1->tunjukkanRankMobileLegends();
echo $esempeh1->getNama();

echo "<br>";

try {
    $orang1 = new orang("John", -5, "Laki-laki", 180, 75); // Umur negatif
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "<br>";

$a  = new orang("Alice", 25, "Perempuan", 160, 50);
$b  = new bocil("Budi", 10, "Laki-laki", 140, 35, "Siti");
$c  = new esempeh("Andi", 20, "Laki-laki", 170, 60, "Diamond");

$orangArray = [$a, $b, $c];

foreach ($orangArray as $orang) {
    $orang->perkenalanDiri();
    $orang->marah();
}


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


class kucing extends Hewan {

    public function suara(){
        echo "{$this->nama} berkata: Meong!\n";
    }
}


class anjing extends Hewan {

    public function suara(){
        echo "{$this->nama} berkata: Guk guk!\n";
    }
}


echo "<br>";

$kucing1 = new kucing("Kitty");
$anjing1 = new anjing("Buddy");

$hewanArray = [$kucing1, $anjing1];

foreach ($hewanArray as $hewan) {
    $hewan->makan();
    $hewan->suara();
}
