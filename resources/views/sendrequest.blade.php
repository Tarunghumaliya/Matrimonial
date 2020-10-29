@foreach ($loginprofile as $value1)

	@extends( $value1['admin'] == 1 ? 'layouts.admin' : 'layouts.app')

@endforeach

@section('content')

@foreach ($request as $value)
	
	@if(isset($value['receiverid']))
		<div>
			{{$value['receiverid']}}
		</div>
	@else(isset($value['senderid']))
		<div>
			<table>
				<tr>
					<td>{{$value['senderid']}}</td>
					<td>accept</td>
				</tr>
			</table>
			
		</div>
	@endif

@endforeach


@endsection
