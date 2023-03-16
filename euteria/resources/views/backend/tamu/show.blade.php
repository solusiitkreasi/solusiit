@extends('backend.layouts.app')
@section('title','Detail Tamu')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>            
        </div>
        <div class="card-body">            
            <div class="row">    
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Tanggal</strong>
                            <p>{{$data->tanggal ? $data->tanggal:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Nama Penanggung Jawab</strong>
                            <p>{{$data->nama_penganggungjawab ? $data->nama_penganggungjawab:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Nama Satuan Dinas</strong>
                            <p>{{$data->nama_satuandinas ? $data->nama_satuandinas:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Provinsi</strong>
                            <p>{{$data->provinsi ? $data->provinsi->nama_provinsi:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Kota</strong>
                            <p>{{$data->kota ? $data->kota->nama_kota:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Alamat</strong>
                            <p>{{$data->alamat ? $data->alamat:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Jumlah Peserta</strong>
                            <p>{{$data->jumlah_peserta ?? '-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Email</strong>
                            <p>{{$data->email ?? '-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Nomor Telepon</strong>
                            <p>{{$data->nomor_telepon ?? '-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Nomor HP</strong>
                            <p>{{$data->nomor_hp ?? '-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                            {!! Form::anchor('<i class="fa fa-arrow-left fa-fw"></i>Kembali')->danger()->outline()->route('admin.tamu.index') !!}
                        </div>
                    </div>
                </div>        
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Keterangan</strong>
                            <p>{{$data->keterangan ? $data->keterangan:'-'}}</p>
                        </div>
                        <div class="col-lg-12">
                            <strong>Jawaban Atamu</strong>
                            <p>{{$data->jawaban_tamu ? $data->jawaban_tamu:'-'}}</p>
                        </div>
                    </div>
                </div>        

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection