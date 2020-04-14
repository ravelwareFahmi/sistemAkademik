@extends('layouts/master')
@section('title','Profile Siswa')

@section('headercss')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	@endsection

@section('content')
@section('heading','Profile Siswa')
<section class="content">
    <div class="container-fluid">
      <div class="row">
      
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
             
              <h3 class="profile-username text-center">{{ $guru->nama }}</h3>

              <p class="text-muted text-center">Data Diri</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>No Telepon</b> <a class="float-right">{{ $guru->telepon }}</a>
                </li>
               
                <li class="list-group-item">
                  <b>Alamat</b> <a class="float-right">{{ $guru->alamat }}</a>
                </li>
              </ul>
              <a href="/siswa" class="btn btn-primary btn-block"><b>Kembali</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          {{-- nilai yang diambil --}}
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Keterangan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Mata Pelajaran : {{ $guru->mapel->count() }} </strong>

              <p class="text">
                
              </p>

              <hr>
              <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

              <p class="text-muted"></p>
            </div>
            <!-- /.card-body -->
          </div>


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item" align="left">
                  <!-- Button trigger modal -->
                  {{-- <button type="button" class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModal">
                    Tambah Mapel
                  </button> --}}
                </li>
                <li class="nav-item"><a class="nav-link" href="#daftarNilai" data-toggle="tab"></a></li>
                <li class="nav-item"><a class="nav-link" href="#editProfile" data-toggle="tab"></a></li>
              </ul>
            </div>
            <!-- /.card-header -->
            
            {{-- CARD BODY  --}}
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="daftarNilai">
         
                  <!-- Daftar Nilai -->
                    <div class="time-label">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            @if (session('gagal'))
                            <div class="alert alert-danger" role="alert">
                              {{ session('gagal') }}
                            </div>
                            @endif
                            <div class="card-header">
                              <h3 class="card-title">Data Mapel yang diampu</h3>
                              <div class="card-tools">
                                  {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="cari" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                      <button type="submit" name="cari" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                  </div> --}}
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                              <table class="table table-head-fixed">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>semester</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                  {{-- ambil relasi siswa dengan mapel  --}}
                                  @foreach ($guru->mapel as $m)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->semester }}</td>
                                    
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- /.tab-pane -->
              </div>
             
            </div>
            <!-- END CARD BODY -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
@endsection
  