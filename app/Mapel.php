<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','nama','semester'];

    // function untuk deklarasi relasi 
    public function siswa(){
        return $this->belongsToMany(Siswa::class);
    }

    public function guru(){

    // relasi mapel hanya dimiliki satu guru 
        return $this->belongsTo(Guru::class);
    }
} 
