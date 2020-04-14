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
              <div class="text-center">
                <img class="img-fluid img-circle " width="100px" src=" {{ $siswa->getAvatar() }}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</h3>

              <p class="text-muted text-center">Data Diri</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="float-right">{{ $siswa->jenis_kelamin }}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="float-right">{{ $siswa->agama }}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="float-right">{{ $siswa->alamat }}</a>
                </li>
              </ul>
              <a href="/siswa/edit/{{ $siswa->id }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
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
              <strong><i class="fas fa-book mr-1"></i> Mata Pelajaran : {{ $siswa->mapel->count() }}</strong>

              <hr>

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
                  <button type="button" class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModal">
                    Tambah Mapel
                  </button>
                </li>
                <li class="nav-item"><a class="nav-link" href="#daftarNilai" data-toggle="tab"></a></li>
                <li class="nav-item"><a class="nav-link" href="#editProfile" data-toggle="tab">Edit Profile</a></li>
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
                              <h3 class="card-title">Data Nilai Mapel</h3>
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
                                    <th>Kode</th>
                                    <th>Mapel</th>
                                    <th>Guru</th>
                                    <th>Semester</th>
                                    <th>Nilai</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{-- ambil relasi siswa dengan mapel  --}}
                                  @foreach ($siswa->mapel as $mapel)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mapel->kode }}</td>
                                    <td>{{ $mapel->nama }}</td>
                                    <td><a href="/guru/profile/{{ $mapel->guru_id}}">{{ $mapel->guru->nama }}</a></td>
                                    <td>{{ $mapel->semester }}</td>
                                    <td><a href="#" class="nilaiMapel" data-type="text" data-pk="{{ $mapel->id }}" data-url="/post" data-title="Masukan Nilai">{{ $mapel->pivot->nilai }}</a></td>
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
            
                {{-- UPDATE PROFILE  --}}
                <div class="tab-pane" id="editProfile">
                  <form class="form-horizontal" action="/siswa/updateProfile/{{ $siswa->id }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="nama_depan" class="col-sm-3 col-form-label">Nama Depan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_belakang" class="col-sm-3 col-form-label">Nama Belakang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                          <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif >Laki-laki</option>
                          <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" value="{{ $siswa->agama }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-8">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger">Ubah Profile</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    {{-- <div class="panel">
                      <h3 class="page-title">Laporan Data Siswa</h3>
                      <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                      </div>
                      <div class="panel-body">
                        <div id="demo-bar-chart" class="ct-chart"></div>
                      </div>
                    </div> --}}

                    {{-- Chart Nilai Siswa --}}
                    <div class="panel">
                        <div class="panel-heading">
                          {{-- <h3 class="panel-title"> Data Nilai Siswa</h3> --}}
                          <br>
                        </div>
                        <div class="panel-body">
                          <div id="chartNilai"></div>
                        </div>
                    </div>
                    {{-- end-panel  --}}
                  </div>
                  {{-- end col-md --}}
                </div>
                {{-- end-row  --}}
              </div>
              {{-- end container-fluid --}}
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

  <!-- Modal Tambah Data Matapelajaran -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/siswa/addMapel/{{ $siswa->id }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="mapel">Mata Pelajaran</label>
                <select class="form-control" id="mapel" name="mapel">
                 @foreach ($matapelajaran as $m)
                    <option value="{{ $m->id }}"> {{ $m->kode }} - {{ $m->nama }}</option>
                 @endforeach
                </select>
              </div> 
              <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection

@section('footerchart') 
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
  <script>
    Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Graphic Nilai Siswa'
    },
    subtitle: {
        text: '{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}'
    },
    xAxis: {
        categories: 
            {!! json_encode($categories) !!}
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Mata Pelajaran',
        data: {!! json_encode($data) !!} 

    }]
});
  $(document).ready(function() {
      $('.nilaiMapel').editable();
  });
  
  </script>
@endsection


{{-- @section('footerchart1')
  <script src="{{ asset('klorofil/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{ asset('klorofil/vendor/chartist/js/chartist.min.js')}}"></script> --}}
  
  {{-- catatan untuk membaca data json  --}}
  {{-- {!! json_encode(nama_variabel) !!} echo special agar tidak terbaca htmlnya dan nilainya murni json  --}}
  {{-- tidak akan muncul data nya jika menggunakan echo biasa {{ }} --}}
  {{-- <script>
    $(function() {
		var options;

		var data = {
			labels: {!! json_encode($categories) !!},
			series: [{!! json_encode($data) !!}]
		};

		// bar chart
		options = {
			height: "300px",
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#demo-bar-chart', data, options);
	}); 
  </script>
  --}}
{{-- @endsection --}}

  {{-- UNTUK MEMBUAT CHART YANG LEBIH RESPONSIVE GUNAKAN HIGHCHART  --}}