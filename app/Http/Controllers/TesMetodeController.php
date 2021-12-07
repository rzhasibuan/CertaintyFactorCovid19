<?php

namespace App\Http\Controllers;
//require '../vendor/autoload.php';

use afrizalmy\CertaintyFactor\Cf\CertaintyFactor;
use Illuminate\Http\Request;

class TesMetodeController extends Controller
{
    public function certainFakar()
    {
        $arr = [];
        $arr[0]['kode_case'] = 'non';
        $arr[0]['nama_case'] = 'non suspect';
        $arr[0]['kode_rule'] = 'G08';
        $arr[0]['nama_rule'] = 'hidung tersumbat';
        $arr[0]['nilai_md'] = 0.4;

        $arr[1]['kode_case'] = 'non';
        $arr[1]['nama_case'] = 'non suspect';
        $arr[1]['kode_rule'] = 'G10';
        $arr[1]['nama_rule'] = 'bersin-bersin';
        $arr[1]['nilai_md'] = 0.4;
//        status non suspect
        $arr[2]['kode_case'] = 'odp';
        $arr[2]['nama_case'] = 'orang dalam pantauan';
        $arr[2]['kode_rule'] = 'G01';
        $arr[2]['nama_rule'] = 'pergi ke luar negeri yang terpapar covid-19';
        $arr[2]['nilai_md'] = 0.7;

        $arr[3]['kode_case'] = 'odp';
        $arr[3]['nama_case'] = 'orang dalam pantauan';
        $arr[3]['kode_rule'] = 'G02';
        $arr[3]['nama_rule'] = 'batuk kering';
        $arr[3]['nilai_md'] = 0.6;

        $arr[4]['kode_rule'] = 'G05';
        $arr[4]['nama_rule'] = 'demam > 38 derajat celcius';
        $arr[4]['nilai_md'] = 0.6;
        $arr[4]['kode_case'] = 'odp';
        $arr[4]['nama_case'] = 'orang dalam pantauan';

        $arr[5]['kode_case'] = 'odp';
        $arr[5]['nama_case'] = 'orang dalam pantauan';
        $arr[5]['kode_rule'] = 'G06';
        $arr[5]['nama_rule'] = 'pernah kontak dengan pasien positif covid-19';
        $arr[5]['nilai_md'] = 0.7;
//        status orang dalam pantauan

        $arr[6]['kode_case'] = 'pdp';
        $arr[6]['nama_case'] = 'pasien dalam pengawasan';
        $arr[6]['kode_rule'] = 'G01';
        $arr[6]['nama_rule'] = 'pergi keluar negeri yang terdampar covid-19';
        $arr[6]['nilai_md'] = 0.7;


        $arr[7]['kode_case'] = 'pdp';
        $arr[7]['nama_case'] = 'pasien dalam pengawasan';
        $arr[7]['kode_rule'] = 'G02';
        $arr[7]['nama_rule'] = 'batuk kering';
        $arr[7]['nilai_md'] = 0.6;


        $arr[8]['kode_case'] = 'pdp';
        $arr[8]['nama_case'] = 'pasien dalam pengawasan';
        $arr[8]['kode_rule'] = 'G03';
        $arr[8]['nama_rule'] = 'usia > 50 tahun';
        $arr[8]['nilai_md'] = 0.6;


        $arr[9]['kode_case'] = 'pdp';
        $arr[9]['nama_case'] = 'pasien dalam pengawasan';
        $arr[9]['kode_rule'] = 'G04';
        $arr[9]['nama_rule'] = 'kelelahan';
        $arr[9]['nilai_md'] = 0.6;

        $arr[10]['kode_case'] = 'pdp';
        $arr[10]['nama_case'] = 'pasien dalam pengawasan';
        $arr[10]['kode_rule'] = 'G05';
        $arr[10]['nama_rule'] = 'demam > 38 derajat celcius';
        $arr[10]['nilai_md'] = 0.6;

        $arr[11]['kode_case'] = 'pdp';
        $arr[11]['nama_case'] = 'pasien dalam pengawasan';
        $arr[11]['kode_rule'] = 'G06';
        $arr[11]['nama_rule'] = 'pernah kontak dengan pasien positif covid-19';
        $arr[11]['nilai_md'] = 0.7;

        $arr[12]['kode_case'] = 'pdp';
        $arr[12]['nama_case'] = 'pasien dalam pengawasan';
        $arr[12]['kode_rule'] = 'G07';
        $arr[12]['nama_rule'] = 'sesak nafas';
        $arr[12]['nilai_md'] = 0.8;

        $arr[13]['kode_case'] = 'pdp';
        $arr[13]['nama_case'] = 'pasien dalam pengawasan';
        $arr[13]['kode_rule'] = 'G09';
        $arr[13]['nama_rule'] = 'tengorokan sakit';
        $arr[13]['nilai_md'] = 0.6;

        $arr[14]['kode_case'] = 'pdp';
        $arr[14]['nama_case'] = 'pasien dalam pengawasan';
        $arr[14]['kode_rule'] = 'G11';
        $arr[14]['nama_rule'] = 'sinar x pada paru-paru';
        $arr[14]['nilai_md'] = 0.8;

        $arr[15]['kode_case'] = 'pdp';
        $arr[15]['nama_case']  = 'pasien dalam pengawasan';
        $arr[15]['kode_rule'] = 'G12';
        $arr[15]['nama_rule'] = 'pernapasan cepat tak normal';
        $arr[15]['nilai_md'] = 0.6;


        return $arr;
    }

    public function cfuser()
    {
        $arr = [];

        $arr[0]['kode_rule'] = "G01";
        $arr[0]['persentase_user'] = 1;

        $arr[1]['kode_rule'] = "G02";
        $arr[1]['persentase_user'] = 1;

        $arr[2]['kode_rule'] = "G05";
        $arr[2]['persentase_user'] = 1;

        $arr[3]['kode_rule'] = "G06";
        $arr[3]['persentase_user'] = 1;

        $arr[4]['kode_rule'] = "G07";
        $arr[4]['persentase_user'] = 1;
//
        $arr[5]['kode_rule'] = "G08";
        $arr[5]['persentase_user'] = 1;
//
       $arr[6]['kode_rule'] = "G10";
        $arr[6]['persentase_user'] = 1;

       $arr[7]['kode_rule'] = "G03";
        $arr[7]['persentase_user'] = 1;



        return $arr;
    }

    public function percobaanDua()
    {

        $data = $this->certainFakar();
        $input = $this->cfuser();
        $hasil = CertaintyFactor::ProsesHitung($data, $input);

        header('Content-Type: application/json');
        echo json_encode($hasil);

    }

}
