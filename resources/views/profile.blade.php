@foreach ($loginprofile as $value1)

@extends( $value1['admin'] == 1 ? 'layouts.admin' : 'layouts.app')


@endforeach

@section('content')
 

@foreach ($profile as $value)

<div class="container">
	<div class="row">
        <div class="col-md-10">
        	{{ $value['name'] }}
        </div>
        <div class="col-md-2">
        	
            @if ( $value['id'] ==  Auth::user()->id )
                <a href="route('editprofile')"><button>Edit</button></a>
            @else
                <button>intrest</button>
            @endif
        	<button>Download</button>
        </div>
    </div>
    <hr>
	<div class="row">
        <div class="col-md-4">
            <img src="{{ asset('uploads/'.$value['photoname']) }}" class="pt-4" style="width: 300px; height: 350px">
        </div>
        <div class="col-md-4">
        	<div  class="pt-4">Persional Details</div>
        	<div>Name</div>
        	<div>Gender</div>
        	<div>Age</div>
        	<div>Religion</div>
        	<div>Cast</div>
        	<div>Profession</div>
        	<div>Salary</div>
        	<div>Marital Status</div>
        	<div>city</div>
        </div>
        <div class="col-md-4">
            <div  class="pt-4"></div><br>
            <div> {{$value['firstname']}}  {{$value['surname']}} </div>
            <div> {{$value['gender']}} </div>
            <div> {{$value['age']}} </div>
            <div> {{$value['religion']}} </div>
            <div> {{$value['cast']}} </div>
            <div> {{$value['profession']}} </div>
            <div> {{$value['salary']}} </div>
            <div> {{$value['marid']}} </div>
            <div> {{$value['city']}} </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div  class="pt-4">Basic Details</div>
        	<div>Date of Birth</div>
        	<div>Height</div>
        	<div>Weight</div>
        	<div>Education</div>
        	<div>Mother Toung</div>
        	<div>Bloud Group</div>
        </div>
        <div class="col-md-4">
            <div  class="pt-4"></div><br>
            <div>{{$value['dob']}}</div>
            <div>{{$value['height']}}</div>
            <div>{{$value['weight']}}</div>
            <div>{{$value['education']}}</div>
            <div>{{$value['mothertoung']}}</div>
            <div>{{$value['blood']}}</div>
        </div>
        <div class="col-md-2">
        	<div  class="pt-4">Family Details</div>
        	<div>Father Name</div>
        	<div>Occupation</div>
        	<div>Mother Name</div>
        	<div>Occupation</div>
        	<div>No of Brothers</div>
        	<div>No of Sisters</div>
        </div>
        <div class="col-md-4">
            <div  class="pt-4"></div><br>
            <div>{{$value['fathername']}}</div>
            <div>{{$value['foccupation']}}</div>
            <div>{{$value['mothername']}}</div>
            <div>{{$value['moccupation']}}</div>
            <div>{{$value['brother']}}</div>
            <div>{{$value['sister']}}</div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div  class="pt-4">Other Details</div>
        	<div> </div>
    </div>
</div>
    
           
</div>


@endforeach
@endsection
