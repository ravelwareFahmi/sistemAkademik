<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //definiskan tabel siswa karena jika tidak harus dibuat tabel siswas didatabase bisa disebut plural
    protected $table = 'siswa'; 
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

    public function getAvatar(){
        if (!$this->avatar) {
            return asset('images/default.png');
        } else {
            return asset('images/'. $this->avatar);
        }
    }

    // function untuk deklarasi relasi 
    public function Mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function test(){
        $total = 0;
        $hitung = $this->mapel->count();
        
        foreach ($this->mapel as $mapel) {
            $total += $mapel->pivot->nilai;
        }
        if($hitung > 0) {
            return round($total/$hitung);
        } else {
            return 0;
        }
    }

    // digunakan untuk menggabungkan nama depan dengan belakang  
    public function nama_lengkap(){
       return $this->nama_depan . " " .$this->nama_belakang;
    }

    // relasi ke tabel user 
    public function user(){
        return $this->belongsTo(User::class);
    }
}
