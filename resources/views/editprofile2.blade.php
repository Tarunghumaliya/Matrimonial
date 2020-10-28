    <div id="ajax">
    <div class="container1">
        @foreach($profiles as $value)
        <div class="card1">
            <div class="imgBx1">
                <img src="{{ asset('uploads/'.$value['photoname']) }}" >
            </div>
            <div class="contentBx1">
                <div class="content1">
                    <h2>Persional Details</h2>
                    <p id="name"> Name &nbsp &nbsp &nbsp:- &nbsp {{$value['firstname']}}  {{$value['surname']}} </p>
                    <p> Gender &nbsp &nbsp:- &nbsp {{$value['gender']}} </p>
                    <p> Age &nbsp &nbsp &nbsp &nbsp &nbsp:- &nbsp {{$value['age']}} </p>
                    <p> Religion &nbsp:- &nbsp {{$value['religion']}} </p>
                    <p> cast &nbsp &nbsp &nbsp &nbsp:- &nbsp {{$value['cast']}} </p>
                    <p> Profaction &nbsp:- &nbsp {{$value['profession']}} </p>
                    <p> Salary &nbsp:- &nbsp {{$value['salary']}} </p>
                    <p> City &nbsp:- &nbsp {{$value['city']}} </p>
                    <a href="javascript:void(0)" onclick="requestid({{ $value['id']}})"> Request</a>
                    <a href="{{ URL('/profile/'.$value->id )}}"> View Details </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
