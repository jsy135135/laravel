123456789
{{$name1}}

@foreach($arr as $key => $value)
    <p>key {{$key}} value {{$value}}</p>
@endforeach

<p>{{date('Y-m-d H:i:s', $ts)}}</p>