@extends('layouts/master')
@section('title','Data Siswa')
@section('heading', 'Data Siswa')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Data Siswa</h3>
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Insert
                        </button>

                        {{-- <div class="card-tools">
                            <form action="/siswa" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search">
                               <div class="input-group-append">
                                   <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                               </div>
                            </form>
                        </div> --}}
                        </div> <!-- /.card-header -->

                        {{-- card body  --}}
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table table-head-fixed">
                              <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Rata-rata</th>
                                <th>Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($data_siswa as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</th>
                                    <td><a href="siswa/profile/{{ $siswa->id }}" style="color:black">
                                        {{ $siswa->nama_depan }}
                                    </a></td>
                                    <td>{{ $siswa->nama_belakang }}</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                    <td>{{ $siswa->agama }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    <td>{{ $siswa->test() }}</td>
                                    <td>
                                        <a href="/siswa/profile/{{ $siswa->id }}" class="badge badge-info">Profile</a>
                                        <a href="/siswa/edit/{{ $siswa->id }}" class="badge badge-warning">Edit</a>
                                        <a href="#" class="badge badge-danger delete" siswa-id="{{ $siswa->id }}">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                              </tfoot>
                            </table>
                          </div>
                          <!-- /.card-body -->

                    </div>

                {{-- <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_siswa as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</th>
                                <td><a href="siswa/profile/{{ $siswa->id }}" style="color:black">
                                    {{ $siswa->nama_depan }}
                                </a></td>
                                <td>{{ $siswa->nama_belakang }}</td>
                                <td>{{ $siswa->jenis_kelamin }}</td>
                                <td>{{ $siswa->agama }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>
                                    <a href="/siswa/edit/{{ $siswa->id }}" class="badge badge-warning">Edit</a>
                                    <a href="/siswa/delete/{{ $siswa->id }}" class="badge badge-danger hapusData">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="/siswa/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_depan ">Nama Depan</label>
                    <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" value="{{ old('nama_depan') }}" id="nama_depan" name="nama_depan" placeholder="Nama Depan Anda">
                    @error('nama_depan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Nama Belakang Anda">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : '' }}>Laki-laki</option>
                      <option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ old('agama') }}" placeholder="Agama">
                @error('agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group {{ $errors->has('avatar') ? ' is-invalid ' : '' }}">
                    <label for="avatar">Avatar</label><br>
                    <input type="file" name="avatar" id="avatar">
                    @if ($errors->has('avatar'))
                    <div class="help-block">
                        {{$errors->first('avatar')}}
                    </div>

                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-primary" value="Insert Data"/>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

@section('sweetalert')
    <script>
        $('.delete').click(function(){
            var siswa_id = $(this).attr('siswa-id');
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/siswa/delete/"+siswa_id+"";
            }
            });
        });
    </script>
@endsection


