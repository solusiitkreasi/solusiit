<div class="tab-pane show" id="homepage" role="tabpanel">
    {!! Form::open()->post()->route('admin.setting.store')->id('setting')->fill($data)->multipart() !!}
    <div class="row">
        {{-- History --}}
        {{-- <div class="col-lg-12">
            <div class="form-group">
                <label>History</label>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach (config('translatable.locales') as $key=>$locale)
                        <a class="nav-link {{$key==0 ?'active':''}}" data-toggle="tab" href="#nav-history-{{$locale}}">
                            <i class="flag-icon flag-icon-{{config('translatable.locale_flag.'.$locale)}}"></i>
                        </a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach (config('translatable.locales') as $key=>$locale)
                    <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-history-{{$locale}}" role="tabpanel" aria-labelledby="nav-history-{{$locale}}-tab">
                        <div class="form-group pt-2">
                            
                            <textarea
                                class="form-control @if($errors->has('history_'.$locale)) is-invalid @endif "
                                name="{{ 'history_'.$locale }}"
                                rows="5"
                            ></textarea>
                            @if($errors->has('history_'.$locale))
                            <div class="invalid-feedback">{{$errors->first('history_'.$locale)}}</div>
                            @endif
                        </div>
                        
                    </div>
                    @endforeach
                </div>

            </div>
        </div> --}}
        {{-- Vision --}}
        {{-- <div class="col-lg-12">
            <div class="form-group">
                <label>Vision</label>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach (config('translatable.locales') as $key=>$locale)
                        <a class="nav-link {{$key==0 ?'active':''}}" data-toggle="tab" href="#nav-vision-{{$locale}}">
                            <i class="flag-icon flag-icon-{{config('translatable.locale_flag.'.$locale)}}"></i>
                        </a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach (config('translatable.locales') as $key=>$locale)
                    <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-vision-{{$locale}}" role="tabpanel" aria-labelledby="nav-vision-{{$locale}}-tab">
                        <div class="form-group pt-2">
                            {!! Form::hidden('vision_type_'.$locale, 'homepage') !!}
                            <textarea
                                class="form-control @if($errors->has('vision_'.$locale)) is-invalid @endif "
                                name="{{ 'vision_'.$locale }}"
                                rows="5"
                            ></textarea>
                            @if($errors->has('vision_'.$locale))
                            <div class="invalid-feedback">{{$errors->first('vision_'.$locale)}}</div>
                            @endif
                        </div>
                        
                    </div>
                    @endforeach
                </div>

            </div>
        </div> --}}
        {{-- Mision --}}
        {{-- <div class="col-lg-12">
            <div class="form-group">
                <label>Mision</label>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach (config('translatable.locales') as $key=>$locale)
                        <a class="nav-link {{$key==0 ?'active':''}}" data-toggle="tab" href="#nav-mision-{{$locale}}">
                            <i class="flag-icon flag-icon-{{config('translatable.locale_flag.'.$locale)}}"></i>
                        </a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach (config('translatable.locales') as $key=>$locale)
                    <div class="tab-pane fade {{$key==0 ?'show active':''}}" id="nav-mision-{{$locale}}" role="tabpanel" aria-labelledby="nav-mision-{{$locale}}-tab">
                        <div class="form-group pt-2">
                            
                            <textarea
                                class="form-control @if($errors->has('mision_'.$locale)) is-invalid @endif "
                                name="{{ 'mision_'.$locale }}"
                                rows="5"
                            ></textarea>
                            @if($errors->has('mision_'.$locale))
                            <div class="invalid-feedback">{{$errors->first('mision_'.$locale)}}</div>
                            @endif
                        </div>
                        
                    </div>
                    @endforeach
                </div>

            </div>
        </div> --}}
        @foreach (App\Models\Backend\Setting::active('homepage') as $row)        
            <div class="col-lg-12">
                @switch($row->form)
                    @case('text')
                        {!! Form::text($row->name, $row->display_name)->attrs(['autocomplete'=>false,'class'=>$row->name]) !!}
                        @break
                    @case('textarea')
                        {!! Form::textarea($row->name, $row->display_name)->attrs(['autocomplete'=>false,'rows'=>5,'class'=>$row->name]) !!}
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