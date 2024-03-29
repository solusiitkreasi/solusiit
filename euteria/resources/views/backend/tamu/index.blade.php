@extends('backend.layouts.app')
@section('title','Tamu')
@section('content')
<div class="col-lg-12">    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
            {{-- <a href="{{route('admin.tamu.create')}}" class="btn btn-primary btn-sm float-right">
                <i class="fa fa-plus"></i>
            </a> --}}
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <x-data-tables-server-side :tableHeader="['No','Tanggal','Nama Penanggung Jawab','Nama Satuan Dinas','Provinsi','Kota','Status','Action']" id="data-table"></x-data-tables-server-side>
            </div>                
        </div>
    </div>
</div>    
@endsection
@include('backend.plugins.datatables')
@include('backend.plugins.sweet-alert')
@push('scripts')
<script>
    $(document).ready(function(e){
        $.fn.dataTable.ext.errMode = 'throw';
        const $table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            language: {
                processing: 'Loading . . .',
                emptyTable: 'Tidak Ada Data',
                zeroRecords: 'Tidak Ada Data'
            },
            ajax: {
                url : '{!! route("admin.tamu.source") !!}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',width:"2%", orderable : false, searchable:false, className: 'text-center'},
                // {data: 'images', name: 'images',width:"2%", orderable : false, className: 'text-center'},
                {data: 'tanggal', name: 'tanggal',width:"5%", orderable : false, searchable: false},
                {data: 'nama_penanggungjawab', name: 'nama_penanggungjawab',width:"5%", orderable : false},
                {data: 'nama_satuandinas', name: 'nama_satuandinas',width:"5%", orderable : false},
                {data: 'provinsi', name: 'provinsi',width:"5%", orderable : false},
                {data: 'kota', name: 'kota',width:"5%", orderable : false},
                {data: 'status_tampil', name: 'status_tampil',width:"5%", orderable : false},
                {data: 'action', name: 'action',width:"5%", orderable : false, searchable:false, className: 'text-center'}
            ]
        });
    
        $('#data-table').on('click','a.delete-data',function(e) {
            e.preventDefault();        
            var delete_link = $(this).attr('href');
            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "You won't be able to revert this!",
                    type: 'question',
                    showCancelButton: true,
                    // confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus Data Ini',
                    cancelButtonText: 'Batal'
                })
                .then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url:delete_link,
                            method: 'DELETE',
                            success: function(data){
                                Swal.fire(
                                    '200',
                                    'Data berhasil dihapus',
                                    'success'
                                ).then(result=> $table.ajax.reload() )
                                
                            },
                            error: function(data){
                                Swal.fire(
                                    '500',
                                    'Maaf Terjadi Kesalahan Sistem, Coba Beberapa saat lagi',
                                    'error'
                                )
                            }
                        })
                    }
                })   
        });
    
        $('body').tooltip({selector: '[data-toggle="tooltip"]'});
    })
    </script>    
@endpush