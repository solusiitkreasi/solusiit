<div class="tab-pane" id="seo" role="tabpanel">
    {!! Form::open()->post()->route('admin.setting.store')->id('setting')->fill($data)->multipart() !!}
    <div class="row">        
        @foreach (App\Models\Backend\Setting::activeSeo() as $row)        
            @php
                $placeholders = [
                    'meta_keywords'=> 'Pisahkan kata kunci dengan tanda koma (,)'
                ];

                $placeholder = isset($placeholders[$row->name]) ? $placeholders[$row->name]:''
            @endphp
            <div class="col-lg-12">
                @switch($row->form)
                    @case('text')
                        {!! Form::text($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @case('textarea')
                        
                        {!! Form::textarea($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name])->placeholder($placeholder) !!}
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