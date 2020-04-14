@extends('layouts/master')
@section('title','Data Siswa')
@section('content')

<section class="main-content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/siswa/update/{{ $siswa->id }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ $siswa->nama_depan }}" placeholder="Nama Depan Anda">
                        @error('nama_depan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  
                    <div class="form-group">
                        <label for="nama_belakang">Nama Belakang</label>
                        <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ $siswa->nama_belakang }}" placeholder="Nama Belakang Anda">
                        @error('nama_belakang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                          <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif >Laki-laki</option>
                          <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ $siswa->agama }}" placeholder="Agama">
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label><br>
                        <img class="img-fluid" width="200px"" src=" {{ $siswa->getAvatar() }}" ><br><br>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="/siswa" class="btn btn-info">Kembali</a>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</section>

@endsection

@section('content1')
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Edit Data Siswa</h2>
                </div>
                <div class="card-body">
                    <form action="/siswa/update/{{ $siswa->id }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ $siswa->nama_depan }}" placeholder="Nama Depan Anda">
                            @error('nama_depan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ $siswa->nama_belakang }}" placeholder="Nama Belakang Anda">
                            @error('nama_belakang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                              <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif >Laki-laki</option>
                              <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ $siswa->agama }}" placeholder="Agama">
                            @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="/siswa" class="btn btn-info">Kembali</a>
                    </form>
                </div> 
            </div>
        </div>
@endsection
