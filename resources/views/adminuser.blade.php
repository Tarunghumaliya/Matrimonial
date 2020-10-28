@extends('layouts.admin')

@section('content')

@foreach($profile as $value)

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<a href="/profile/{{$value['id']}}" style="text-decoration: none;">
					{{$value['firstname']}} {{$value['surname']}}
				</a>
			</div>			

@if( $value['status'] == 0)
			<div class="col-md-1">
				<form method="POST" id="accept" class="form-horizontal">
				@csrf
					<input type="hidden" name="userid" value="{{$value['id']}}">
					<input type="hidden" name="status" value="1">
					<button> Accept </button>
				</form>
			</div>
			<div class="col-md-1">
				<form method="POST" id="reject" class="form-horizontal">
				@csrf
					<input type="hidden" name="userid" value="{{$value['id']}}">
					<input type="hidden" name="status" value="-1">
					<button> Reject </button>
				</form>	
			</div>
@elseif( $value['status'] == 1)
			<div class="col-md-1">
				<form method="POST" id="reject" class="form-horizontal">
				@csrf
					<input type="hidden" name="userid" value="{{$value['id']}}">
					<input type="hidden" name="status" value="-1">
					<button> Block </button>
				</form>	
			</div>
@else
			<div class="col-md-1">
				<form method="POST" id="reject" class="form-horizontal">
				@csrf
					<input type="hidden" name="userid" value="{{$value['id']}}">
					<input type="hidden" name="status" value="1">
					<button> Unblock </button>
				</form>	
			</div>
@endif
		</div>
	</div>
<hr>
@endforeach

@endsection
