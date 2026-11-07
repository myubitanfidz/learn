<?php
Class PersegiPanjang {
protected $panjang;
protected $lebar;

public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar; 
    }

public function hitungLuas() {
$hasil = $this->panjang * $this->lebar;
return $hasil;
}


}


$meja = new PersegiPanjang (10, 5);
echo $meja->hitungLuas();