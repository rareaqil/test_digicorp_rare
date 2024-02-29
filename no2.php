<?php
header('Content-type: text/plain');

// Class Siswa atribute nrp,nama,daftarNilai
class Siswa{
    public $nrp;
    public $nama;
    public $daftarnilai;

    // Konstruktor
    public function __construct($nrp, $nama) {
        $this->nrp = $nrp;
        $this->nama= $nama;
        $this->daftarnilai = [3];
    }


    public static function generateString($length=10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;  
    }

    public function tambahNilai($nilai){
        if(count($this->daftarnilai)<3){
            $this->daftarnilai[]=$nilai;
        }
    }
}

// Class Nilai atribute mapel,nilai
class Nilai{
    public $mapel;
    public $nilai;

    public function __construct($mapel,$nilai){
        $this->mapel=$mapel;
        $this->nilai=$nilai;
    }
    public function __toString(){
        return $this->mapel."(".$this->nilai.")";

    }
}



// new Siswa with mapel inggris nilai 100
$siswaInggris = new Siswa("524678","rare");
$nilaiIngrris = new Nilai( "inggris", 100);
$siswaInggris->tambahNilai($nilaiIngrris);

// print_r($siswaInggris);

$mapelArray = ["Ingrris","Bindo","Jepang"];
$siswaArray = [];

for ($i=0; $i < 10; $i++) { 
   $namaSiswa = Siswa::generateString();
   $nrpSiswa = Siswa::generateString();
   $mapelRandom = $mapelArray[rand(0,2)];
   $nilaiRandom = rand(0,100);

   $siswa = new Siswa($nrpSiswa,$namaSiswa);
   $nilai = new Nilai($mapelRandom,$nilaiRandom);
   $siswa->tambahNilai($nilai);

   array_push($siswaArray,$siswa);
}


foreach ($siswaArray as $siswa){
    print_r($siswa);
}


// 

?>