@extends('layouts/master')
@section('title','Dashboard')
@section('heading','Dashboard')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            {{-- JUMLAH SISWA --}}
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Jumlah Siswa</span>
                    <span class="info-box-number">{{ countSiswa() }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
       
              {{-- END JUMLAH SISWA  --}}
            
              {{-- JUMLAH Guru --}}
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Jumlah Siswa</span>
                    <span class="info-box-number">{{ countGuru() }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              {{-- END JUMLAH GURU  --}}
        </div>

        <div class="row">
             {{-- RANKING 5 BESAR  --}}
             <div class="col-md-6">
                <div class="card-body" style="height: 300px;">
                    <h4>5 Nilai Tertinggi</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Ranking</th>
                          <th>Nama</th>
                          <th>Nilai</th>
                        </tr>
                      </thead>
                         <tbody>
                            {{-- ambil relasi siswa dengan mapel  --}}
                            {{-- data diambil dari helper Global function ranking5Besar --}}
                            @foreach (ranking5Besar() as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama_lengkap() }} </td>
                                <td>{{ $s->siswaRataNilai }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                  </div>
                </div>
            {{-- END RANKING 5 BESAR --}}
        </div>
    </div>
</section>
@endsection