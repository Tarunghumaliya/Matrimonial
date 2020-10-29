@foreach ($loginprofile as $value1)

	@extends( $value1['admin'] == 1 ? 'layouts.admin' : 'layouts.app')

@endforeach

@section('content')

@foreach ($request as $value)
	
	<div>
		{{$value}}
	</div>
	

@endforeach


@endsection
