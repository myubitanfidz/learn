<?php




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
        echo $this->nama;
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

    public function teriak(){
        echo "Aaaaarghh!\n";
    }

    public function ketawa(){
        echo "Hahaha!\n";
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
}




$bocil1 = new bocil("Budi", 10, "Laki-laki", 140, 35, "Siti");
$bocil1->teriak();
$bocil1->nyatakanCintaMonyet();

echo "<br>";

$esempeh1 = new esempeh("Andi", 20, "Laki-laki", 170, 60, "Diamond");
$esempeh1->ketawa();
$esempeh1->tunjukkanRankMobileLegends();
$esempeh1->getNama();

echo "<br>";

try {
    $orang1 = new orang("John", -5, "Laki-laki", 180, 75); // Umur negatif
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

