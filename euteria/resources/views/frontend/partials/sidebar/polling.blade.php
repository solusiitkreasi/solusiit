<div class="widget features-slide-widget">
    <div class="title-section">
        <h1><span>Polling</span></h1>
    </div>
    <div class="image-post-slider" id="polling-wrapper" data-polling-id="{{App\Models\Polling\Polling::get()->first()->id}}">
        @foreach (App\Models\Polling\Polling::with('polling_question')->get() as $row)
        @if ($loop->index == 0)
        <form action="{{route('index.polling.store')}}" method="POST" id="polling-form">
            @csrf
            {!! Form::hidden('polling_id', $row->id) !!}
        <h4>
            {{$row->name}}
        </h4>
        @foreach ($row->polling_question as $key=>$question)
        <div class="radio">
            <label>
              <input type="radio" name="polling_question_id" id="{{$question->id}}" value="{{$question->id}}" {{$key == 0 ? 'checked':''}}>
              {{$question->description}}
            </label>
            <span class="pull-right">{{$question->answer_count}}</span>
        </div>
        @endforeach
        <div class="form-group">
            <button type="submit" class="btn-sm btn-primary">Kirim</button>
        </div>
        <p><em>Jumlah Responden</em>: {{$row->total_answer}}</p>
        </form>
        @endif
        @endforeach
    </div>
</div>