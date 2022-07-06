@foreach($data as $row)
<video src="{{asset('movies')}}/{{$row['movie']}}"></video> <br>
@endforeach