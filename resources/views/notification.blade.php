@foreach ($loginprofile as $value1)

@extends( $value1['admin'] == 1 ? 'layouts.admin' : 'layouts.app')

@endforeach

@section('content')

@foreach ($notification as $value)
	
	<div>
		{{$value['message']}}
	</div>	
	<hr>

@endforeach

@endsection
