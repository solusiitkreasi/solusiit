<div class="table-responsive">
    <table class="table " {{ $attributes }} style="width:100%;">
        <thead class="thead-light">
            <tr>
                @foreach ($tableHeader as $row)
                <th>{{$row}}</th>                
                @endforeach
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>