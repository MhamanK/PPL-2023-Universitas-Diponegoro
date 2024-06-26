@extends('templates.main')

@section('container')

<style>
  .card:hover {
    transform: scale(1.05);
  }

  .card {
    transition: transform 0.2s;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active text-black" aria-current="page">Dashboard</li>
  </ol>
</nav>

<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-body-tertiary text-center">
        <a href="/profile" style="text-decoration: none; color: inherit;" class="position-absolute end-0 m-2">Edit Profile</a>
        <div class="col">
          <div class="col-md-auto m-4 text-center d-flex justify-content-center align-items-center">
            @if (auth()->user()->mahasiswa->foto_profil == null)
            <img src="/showFile/private/profile_photo/default.jpg" alt="" style="border-radius: 50%; width: 120px; height: 120px; object-fit: cover; display: block;">
            @else
            <img src="/showFile/{{ auth()->user()->mahasiswa->foto_profil }}" alt="" style="border-radius: 50%; width: 120px; height: 120px; object-fit: cover; display: block;">
            @endif
          </div>
          <div class="col m-4 text-center">
            <div class="row">
              <div class="col">
                <h5><b>{{ auth()->user()->mahasiswa->nama }}</b></h5>
              </div>
            </div>
            <hr>
            <div>NIM: {{ auth()->user()->mahasiswa->nim }}</div>
            <div>Angkatan: {{ auth()->user()->mahasiswa->angkatan }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4 justify-content-center">
    <div class="col-md-6">
      <div class="card bg-body-tertiary d-flex align-items-center py-2">
        <div class="d-flex justify-content-center align-items-end" style="height: 2rem">
          <h5><b>Prestasi Akademik</b></h5>
        </div>
        <div class="d-flex col-12" style="height: 5rem">
          <div class="d-flex col-6 flex-column justify-content-center align-items-center">
            <div><b>IPk</b></div>
            <div>{{ number_format($IPk,2) }}</div>
          </div>
          <div class="d-flex col-6 flex-column justify-content-center align-items-center">
            <div><b>SKSk</b></div>
            <div>{{ $SKSk }}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-2 justify-content-center">
      <div class="col-md-6">
        <div class="card bg-body-tertiary d-flex align-items-center py-2">
          <div class="d-flex justify-content-center align-items-end" style="height: 2rem">
            <h5><b>Status Akademik</b></h5>
          </div>
          <div class="d-flex col-12" style="height: 5rem">
            <div class="d-flex col-5 flex-column justify-content-center align-items-center">
              <div>{{ $thn_ajar }} {{ $smt }}</div>
            </div>
            <div class="d-flex col-2 flex-column justify-content-center align-items-center">
              <div>Semester {{ $semester }}</div>
            </div>
            <div class="d-flex col-5 flex-column justify-content-center align-items-center">
              <div>Status: {{ auth()->user()->mahasiswa->status }}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2 justify-content-center">
        <div class="col-md-6">
          <div class="row mt-2 justify-content-cene">
            <div class="col w-100 d-flex flex-column">
              <a href="/irs" style="text-decoration: none">
                <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
                  <h5><b>IRS</b></h5>
                  <i class="bi bi-file-earmark-bar-graph-fill text-primary" style="font-size:70px;"></i>
                </div>
              </a>
            </div>

            <div class="col w-100 d-flex flex-column">
              <a href="/khs" style="text-decoration: none">
                <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
                  <h5><b>KHS</b></h5>
                  <i class="bi bi-card-checklist text-success" style="font-size:70px;"></i>
                </div>
              </a>
            </div>
          </div>

          <div class="row mt-2 mb-2">
            <div class="col d-flex flex-column w-100">
              <a href="/pkl" style="text-decoration: none">
                <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
                  <h5><b>PKL</b></h5>
                  <i class="bi bi-person-walking text-secondary" style="font-size:70px;"></i>
                </div>
              </a>
            </div>
            <div class="col d-flex flex-column w-100">
              <a href="/skripsi" style="text-decoration: none">
                <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
                  <h5><b>Skripsi</b></h5>
                  <i class="bi bi-mortarboard-fill text-danger" style="font-size:70px;"></i>
                </div>
              </a>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-1 justify-content-center">
        <div class="col-md-6">
          <div class="card bg-body-tertiary p-4 my-4">
            <div class="text-center mb-2">
              <h5><b>Progress Studi</b></h5>
            </div>
            <div class="row d-flex gx-4 gy-4">
              @for ($i = 0; $i <= 13; $i++) <div class="col-md-2 col-sm-6">
                @if ((!isset($arrIRS[$i]) || $arrIRS[$i]->validasi == 0) && (!isset($arrKHS[$i]) || $arrKHS[$i]->validasi == 0))
                <div class="modalButton">
                  @else
                  <div class="modalButton" type="button" data-bs-toggle="modal" data-bs-target="#modalMain" data-smt="{{ $i + 1 }}" data-irs="{{ isset($arrIRS[$i]) ? $arrIRS[$i] : ''}}" data-khs="{{ isset($arrKHS[$i]) ? $arrKHS[$i] : ''}}" data-pkl="{{ $data_pkl }}" data-skripsi="{{ $data_skripsi }}">
                    @endif
                    @if((!isset($arrIRS[$i]) || $arrIRS[$i]->validasi == 0) && (!isset($arrKHS[$i]) || $arrKHS[$i]->validasi == 0))
                    <div class="card bg-danger d-flex align-items-center text-center py-2">
                      @elseif (isset($arrIRS[$i]) && isset($arrKHS[$i]) && $arrIRS[$i]->validasi == 1 && $arrKHS[$i]->validasi == 1)
                      @if(!is_null($data_skripsi) && $data_skripsi->semester == $i + 1 && $data_skripsi->validasi == 1)
                      <div class="card bg-success d-flex align-items-center text-center py-2">
                        @elseif (!is_null($data_pkl) && $data_pkl->semester == $i + 1 && $data_pkl->validasi == 1)
                        <div class="card bg-warning d-flex align-items-center text-center py-2">
                          @else
                          <div class="card bg-primary d-flex align-items-center text-center py-2">
                            @endif
                            @else
                            <div class="card bg-info d-flex align-items-center text-center py-2">
                              @endif
                              <h5><b>{{ $i + 1 }}</b></h5>
                            </div>
                          </div>
                        </div>
                        @endfor
                      </div>
                    </div>
                    <div class="mb-2">
                      <h6><b>Keterangan</b></h6>
                      <a class="btn btn-danger btn-sm mb-1"></a> <small>Belum diisikan (IRS dan KHS) atau tidak digunakan</small><br />
                      <a class="btn btn-info btn-sm mb-1"></a> <small>Sudah diisikan (IRS dan KHS)</small><br />
                      <a class="btn btn-warning btn-sm mb-1"></a> <small>Sudah Lulus PKL (IRS, KHS, dan PKL)</small><br />
                      <a class="btn btn-success btn-sm mb-1"></a> <small>Sudah Lulus Skripsi</small><br />
                    </div>
                    @include('mahasiswa.progress_studi.modal_main')
                    @include('mahasiswa.progress_studi.modal_irs')
                    @include('mahasiswa.progress_studi.modal_khs')
                    @include('mahasiswa.progress_studi.modal_pkl')
                    @include('mahasiswa.progress_studi.modal_skripsi')
                    <script src="/js/progress.js"></script>

                    @endsection

                  </div>
                </div>
            </div>
          </div>