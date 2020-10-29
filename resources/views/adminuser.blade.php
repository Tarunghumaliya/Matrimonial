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
					<a href="javascript:void(0)" onclick="accept({{ $value['id']}})"> Accept</a>
			</div>
			<div class="col-md-1">
					<a href="javascript:void(0)" onclick="reject({{ $value['id']}})"> Reject</a>
			</div>
@elseif( $value['status'] == 1)
			<div class="col-md-1">
					<a href="javascript:void(0)" onclick="block({{ $value['id']}})"> Block</a>
			</div>
@else
			<div class="col-md-1">
				<a href="javascript:void(0)" onclick="unblock({{ $value['id']}})"> Unblock</a>
			</div>
@endif
		</div>
	</div>
<hr>
@endforeach


<script type="text/javascript">
    function accept(id){
        userid = id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
              url: "{{ route('alluserajax') }}",
              type:"POST",
              data:{
                   userid:userid,
                   status :1,
              },
      success:function(response){
        alert(response.success);
        console.log(response.success);
        location.reload(true);
      },
     });
    };
</script>

<script type="text/javascript">
    function reject(id){
        userid = id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
              url: "{{ route('alluserajax') }}",
              type:"POST",
              data:{
                   userid:userid,
                   status :-1,
              },
      success:function(response){
        alert(response.success);
        console.log(response.success);
        location.reload(true);
      },
     });
    };
</script>

<script type="text/javascript">
    function block(id){
        userid = id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
              url: "{{ route('alluserajax') }}",
              type:"POST",
              data:{
                   userid:userid,
                   status :-1,
              },
      success:function(response){
        alert(response.success);
        console.log(response.success);
        location.reload(true);
      },
     });
    };
</script>

<script type="text/javascript">
    function unblock(id){
        userid = id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
              url: "{{ route('alluserajax') }}",
              type:"POST",
              data:{
                   userid:userid,
                   status :1,
              },
      success:function(response){
        alert(response.success);
        console.log(response.success);
        location.reload(true);
      },
     });
    };
</script>


@endsection
