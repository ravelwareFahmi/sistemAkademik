<?php

use App\Siswa;
// saat buat helper jangan menggunakan public 
// jangan lupa untuk manggil helper di file composer.json lalu cari autoload 
    // jangan lupa di auto config jika telah selesai config auto load nya dengan composer dumpautoload 

function ranking5Besar(){
    $siswa = Siswa::all(); //digunakan untuk mengambil seluruh data pada siswa
    //map(function($s)) digunakan untuk chainig function test() pada model siswa agar isi dari test()dapat diambil
    $siswa->map(function($s){
        // membuat property SiswaRataNilai Lalu di isi function test() dari siswa model 
        $s->siswaRataNilai = $s->test();
        return $s;
    });

    // $siswa->sortByDesc()digunakan untuk sorting dari terbesar ke kecil dengan Desc 
    // take(5) digunakan untuk membatasi data yang ditampilkan sesuai parameternya 
    // harus disimpan di variabel agar fungsi sortbyDesc dan take dapat digunakan 
    $siswa = $siswa->sortByDesc('siswaRataNilai')->take(5);
    return $siswa;
}

// function digunakan untuk menghitung jumlah siswa 
function countSiswa(){
    $siswa = Siswa::count();
    return $siswa;
}

// function digunakan untuk menghitung jumlah guru
function countGuru(){
    $guru = App\Guru::count();
    return $guru;
}