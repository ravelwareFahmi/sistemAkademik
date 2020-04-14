<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Mapel;
use App\User;
use Illuminate\Hashing\BcryptHasher;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')
                                ->where('nama_belakang','LIKE','%'.$request->cari.'%')
                                ->where('alamat','LIKE','%'.$request->cari.'%')->get();
        } else {
            $data_siswa = Siswa::all();
        }
        return view('siswa.index', compact('data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_depan'=>'required|min:5',
            'nama_belakang'=>'required',
            'email'=>'required|email|unique:users',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'alamat'=>'required',
            'avatar'=>'mimes:jpeg,png'
        ]);

        //input ke tabel user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->email);
        $user->remember_token = str_random(60);
        $user->save();

        // input ke tabel siswa
        // ambil id yang diinput dari tabel user
        $request->request->add(['user_id' => $user->id]);
        $siswa =  Siswa::create($request->all());
        // cek apakah ada file yang diupload dengan name = avatar
        if ($request->hasFile('avatar')) {
            // jika ada pindahkan file ke folder public/images dengan nama yang sama dengan file image client
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            // simpan ke tabel siswa->field avatar
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // FUNCTION PROFILE SISWA
    public function siswaProfile(Siswa $siswa)
    {

        $matapelajaran = new Mapel;
        $matapelajaran = Mapel::all();

        // menyimpan data untuk chart
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            // Kode akan dijalankan jika siswa memiliki nilai di pivot
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                // ambil data relasi siswa ke mapel
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai; //gunakan builder agar mudah dibaca dan mengilangkan collection
            }
        }
        // dd($data);
        // dd(json_encode($categories));
        // parsing array kategories ke view
        return view('siswa.profile', compact('siswa','matapelajaran','categories','data'));
    }

    // function menambah mapel berhubungan dengan function siswaProfile
    public function addMapel(Request $request, Siswa $siswa){
        // dd($request->all());
        // cari data siswa

        // relasi model siswa ke mapel dengan pivot tabel
        // kondisi jika pivotTabel mapel_siswa sudah terdapat data yang sama
        if ($siswa->mapel()->where('mapel_id',$request->mapel)->exists()) {
            return redirect('/siswa/profile/'.$id)->with('gagal', 'Mapel sudah ada');
        } else {
            // kondisi jika tidak ada data mapel sebelumnya
            $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        }

        // redirect ke profile siswa
        return redirect('/siswa/profile/'.$id)->with('sukses', 'Data berhasil di Input');

    }

    public function updateProfile(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'alamat'=>'required'
        ]);

        $siswa->update($request->all());
        return redirect('/siswa/profile/'. $id)->with('sukses', 'Data berhasil diUpdate');
    }

    // END PROFILE SISWA

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Siswa $siswa artinya telah mengambil id di model siswa jadi tidak harus didefinisikan lagi
    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());
        $request->validate([
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'alamat'=>'required'
        ]);

        $siswa->update($request->all());

        // cek apakah ada file yang diupload dengan name = avatar
        if ($request->hasFile('avatar')) {
            // jika ada pindahkan file ke folder public/images dengan nama yang sama dengan file image client
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            // simpan ke tabel siswa->field avatar
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();

        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        $notification = array('title'=> 'Berhasil!', 'msg'=>$part_name.' successfully deleted!','alert-type'=>'success');
        return redirect('/siswa')->with('sukses', 'Data Berhasil di Hapus');
    }

}
