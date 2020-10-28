@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>

</head>
<body>

    <div >
        <button name="filter" id="filter" class="btn btn-success btn">Filter</button>
    </div>


    <div class="filterdata">
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



    <div id="formModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
          <div class="modal-content">
           <div class="modal-header">
                  <h4 class="modal-title">Filter Record</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                 <form method="post" id="filterform" class="form-horizontal">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-md-4" >Min Age : </label>
                    <div class="col-md-8">
                     <input type="number" name="minage" id="minage" value="18" class="form-control" />
                    </div>
                   </div>
                   <div class="form-group">
                    <label class="control-label col-md-4">Max Age : </label>
                    <div class="col-md-8">
                     <input type="number" name="maxage" id="maxage" class="form-control" />
                    </div>
                   </div>
                   <div class="form-group">
                    <label class="control-label col-md-4">Religian : </label>
                    <div class="col-md-8">
                     <select id="religion" name="religion" class="form-control">
                        @foreach($religion as $value)
                        <option value="{{$value['religion']}}">{{$value['religion']}}</option>
                        @endforeach
                    </select>
                    </div>
                   </div>
                   <div class="form-group">
                    <label class="control-label col-md-4">Cast : </label>
                    <div class="col-md-8">
                     <select id="cast" name="cast" class="form-control">
                        @foreach($cast as $value)
                        <option value="{{$value['cast']}}">{{$value['cast']}}</option>
                        @endforeach
                    </select>
                    </div>
                   </div>
                   <br />
                   <div class="form-group" align="center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button class="close" data-dismiss="modal" style="padding-top: 10px;">Close</button>
                   </div>
                 </form>
                </div>
             </div>
            </div>
        </div>

<script type="text/javascript">
    $('#filter').click(function(){
     $('#formModal').modal('show');
 });
</script>

<script type="text/javascript">
    function requestid(id){
        receiverid = id;
        alert(receiverid);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
              url: "{{ route('request') }}",
              type:"POST",
              data:{
                   receiverid :receiverid
              },
      success:function(response){
        console.log(response.success);

      },
     });
    };
</script>

<script type="text/javascript">
    $('#filterform').on('submit',function(event){
        event.preventDefault();

        minage = $('#minage').val();
        maxage = $('#maxage').val();
        religion = $('#religion').val();
        cast = $('#cast').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: "{{ route('filterform') }}",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            minage:minage,
            maxage:maxage,
            religion:religion,
            cast:cast,
          },
          success:function(response){
            console.log(response);
            $('.filterdata').html(response);
          },
         });
        });
</script>

</body>
</html>

@endsection
