<?php

namespace App\Http\Controllers;
//require '../vendor/autoload.php';

use afrizalmy\CertaintyFactor\Cf\CertaintyFactor;
use Illuminate\Http\Request;

class TesMetodeController extends Controller
{
    public function gejala()
    {
        $arr = [];
        $arr[0]['kode_case'] = "G01";
        $arr[0]['nama_rule'] = "Pergi keluar negeri yang terdampak covid 19";
        $arr[0]['cf_pakar'] = 0.7;

        $arr[1]['kode_case'] = "G02";
        $arr[1]['nama_rule'] = "Batuk kering";
        $arr[1]['cf_pakar'] = 0.6;

        $arr[2]['kode_case'] = "G01";
        $arr[2]['nama_rule'] = "demam > 38 derajat celcius";
        $arr[2]['cf_pakar'] = 0.6;

        $arr[3]['kode_case'] = "G03";
        $arr[3]['nama_rule'] = "pernah kontak dengan pasien covid 19";
        $arr[3]['cf_pakar'] = 0.7;

        $arr[4]['kode_case'] = "G04";
        $arr[4]['nama_rule'] = "sesak nafas";
        $arr[4]['cf_pakar'] = 0.8;
        return $arr;
    }

    public function cfuser()
    {
        $arr = [];
        $arr[0]['kode_case'] = "G01";
        $arr[0]['nama_rule'] = "Pergi keluar negeri yang terdampak covid 19";
        $arr[0]['cf_user'] = 1;

        $arr[1]['kode_case'] = "G02";
        $arr[1]['nama_rule'] = "Batuk kering";
        $arr[1]['cf_user'] = 1;

        $arr[2]['kode_case'] = "G01";
        $arr[2]['nama_rule'] = "demam > 38 derajat celcius";
        $arr[2]['cf_user'] = 1;

        $arr[3]['kode_case'] = "G03";
        $arr[3]['nama_rule'] = "pernah kontak dengan pasien covid 19";
        $arr[3]['cf_user'] = 1;

        $arr[4]['kode_case'] = "G04";
        $arr[4]['nama_rule'] = "sesak nafas";
        $arr[4]['cf_user'] = 1;
        return $arr;
    }
    public function index()
    {
        $pakar = $this->gejala();
        $user = $this->cfuser();
        $kombin = [];
        for ($i=0; $i<count($pakar); $i++)
        {
            if($pakar[$i]['kode_case'] == $user[$i]['kode_case'])
            {
               for($j=0; $j<count($user); $j++)
               {
//                   perhitungan gejala yang dipilih cf pakar * cf user
                   $hasilKali = $pakar[$j]['cf_pakar'] * $user[$j]['cf_user'];
                   array_push($kombin, $hasilKali);
               }
            }
//            return $kombin;
            $hasilKombin = 0;
            for($z=0; $z<count($kombin); $z++)
            {
                if($z == 0)
                {
                    $hasilKombin = $kombin[$z] + $kombin[$z+1] * (1.0 - $kombin[$z]);
                    if(count($kombin)-1 == 1)
                    {
                        $hasil_combine[$i]['kode_case'] = $pakar[$i]['kode_case'];
                        $hasil_combine[$i]['nama_rule'] = $pakar[$i]['nama_rule'];
                        $hasil_combine[$i]['hasil_perhitungan'] = $hasilKombin;
                        break;
                    }
                }else{
                    if($z+1 == count($kombin))
                    {
                        $hasil_combine[$i]['kode_case'] = $pakar[$i]['kode_case'];
                        $hasil_combine[$i]['nama_rule'] = $pakar[$i]['nama_rule'];
                        $hasil_combine[$i]['hasil_perhitungan'] = $hasilKombin;
                        break;
                    }
                    $hasilKombin = $hasilKombin + $kombin[$z+1] * (1.0 - $hasilKombin);
                }
            }
        }
//        dd($hasil_combine);
//        $penentuan = [];
        $tmp = 0;
        for($i=0; $i<count($hasil_combine); $i++)
        {
            if($tmp < $hasil_combine[$i]['hasil_perhitungan'])
            {
                $obj = (object)[
//                    'kode_case' => $hasil_combine[$i]['kode_case'],
//                    'nama_rule' => $hasil_combine[$i]['nama_rule'],
                    'hasil_perhitungan' => $hasil_combine[$i]['hasil_perhitungan']
                ];
                $tmp = $hasil_combine[$i]['hasil_perhitungan'];
            }
        }
        $hasilAkhir = (object) [
//            'list_case' => $hasil_combine,
            'hasil_pakar' => $obj
        ];
        return $hasilAkhir;
    }



}
