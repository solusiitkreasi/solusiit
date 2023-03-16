<div class="tab-pane" id="socmed" role="tabpanel" aria-labelledby="profile-tab">    
    {{-- <p>Untuk keperluan terhubung dengan sosial media anda silahka isi alamat tautan (url) sosial media anda</p> --}}
    {!! Form::open()->post()->route('admin.setting.store')->id('setting')->fill($data)->multipart() !!}
    <div class="row">
        @foreach (App\Models\Backend\Setting::activeSocmed() as $row)        
            <div class="col-lg-12">
                @switch($row->form)
                    @case('text')
                        {!! Form::text($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @case('textarea')
                        {!! Form::textarea($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @case('number')
                        {!! Form::textarea($row->name, $row->display_name)->type('number')->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @default
                        {!! Form::text($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                @endswitch
            </div>
        @endforeach
        <div class="col-lg-12">
            {!! Form::submit('Simpan') !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>