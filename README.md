<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Implementasi Sistem Pakar Menggunakan Metode Certainty Factor Untuk Mendiagnosa Dini Corona Virus Desease (COVID-19)
### cara install 
```
// pertama 
git clone CertaintyFactorCovid-19 
```
```
// kedua 
// jalankan xampp jika penguna windows 
// kemudian composer install untuk menginstall package
composer install 
```
```
//ketiga
// untuk menjalankan
php artisan serve
```

```
// kemudian jalankan 
http://127.0.0.1:8000/covid19
```
```
// table gejala

G01* Pergi ke luar negeri yang terdampak COVID-19
G02* Batuk kering
G03* Berusia >50 tahun
G04* Kelelahan
G05* Demam dengan suhu lebih dari 38 derajat Celsius
G06* Pernah kontak langsung dengan orang yang terinfeksi COVID-19
G07* Sesak nafas
G08 Hidung tersumbat
G09* Tenggorokan sakit
G10 Bersin-bersin
G11* Sinar X pada paru-paru
G12* Pernafasan cepat tak normal
```
```
// table status pasien
ODP Orang Dalam Pemantauan (ODP)
PDP Pasien Dalam Pengawasan (PDP)
NON Non Suspect
```
```
// table rule
1 IF G01 ANDG02 ANDG03 ANDG04 AND G05 ANDG06 ANDG07 ANDG09 ANDG11 ANDG12 THEN
PDP
2 IF G01 AND G02 AND G04 AND G05 THEN ODP
3 IF G08 AND G10 THEN NON

```

```
// rumus 
CF(h,e)= MB(h,e)-MD(h,e) (1)
CF(h,e1) = CF1 = C(e1) x (CF aturan 1) (2)
CF(h,e2) = CF2 = C(e2) x (CF aturan 2) (3)
CF kombinasi [CF1, CF2] = CF1 + CF2 (1- CF1) (4)
```

penulis : _**`https://github.com/rzhasibuan`**_
