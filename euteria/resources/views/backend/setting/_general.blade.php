<div class="tab-pane show active" id="general" role="tabpanel">
    {!! Form::open()->post()->route('admin.setting.store')->id('setting')->fill($data)->multipart() !!}
    <div class="row">
        @foreach (App\Models\Backend\Setting::activeGeneral() as $row)        
            <div class="col-lg-12">
                @switch($row->form)
                    @case('text')
                        {!! Form::text($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @case('textarea')
                        {!! Form::textarea($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @case('file')
                        {{-- @php
                            $ukuran = [
                                'banner_atas'=>'728px x 90px',
                                'banner_tengah'=>'300px x 250px',
                                'banner_bawah'=>'300px x 250px',
                            ];
                        @endphp --}}
                        {!! Form::file('file_'.$row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        
                        @break
                    @case('number')
                        {!! Form::text($row->name, $row->display_name)->type('number')->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
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