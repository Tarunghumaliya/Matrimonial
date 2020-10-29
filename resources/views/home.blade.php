@extends('layouts.admin')

@section('content')
<div>
    <a href="{{ route('alluser') }}"> Total user = {{$profilecount}} </a>
</div>
<div>
    <a href="{{ route('alluser') }}"> Active user = {{$activecount}} </a>
</div>
<div>
    <a href="{{ route('newuser') }}"> New user = {{$newcount}} </a>
</div>


<div>
    <button name="country" id="country" class="btn btn-success btn">New Country</button>
</div>
<div>
    <button name="state" id="state" class="btn btn-success btn">New State</button>
</div>


<div id="countryModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
          <div class="modal-content">
           <div class="modal-header">
                  <h4 class="modal-title">Filter Record</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                 <form method="post" id="countryform" class="form-horizontal">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-md-4" >Country : </label>
                    <div class="col-md-18">
                     <input type="text" name="countryval" id="countryval" class="form-control" />
                    </div>
                   </div>
                   <br />
                   <hr>
                   <div class="form-group">
                    <button class="close" data-dismiss="modal" style="padding-top: 10px; padding-left: 10px;"> Close </button>
                    <button type="submit" class="close" style="padding-top: 10px; padding-left: 10px;"> Submit </button>
                   </div>
                 </form>
                </div>
             </div>
            </div>
        </div>



<div id="stateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                <h4 class="modal-title">Filter Record</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" id="stateform" class="form-horizontal">
                @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4" >Country : </label>
                        <div class="col-md-18">
                            <select name="countryval1" id="countryval1" class="form-control">
                                @foreach($country as $value1)
                                <option value=" {{$value1['id']}} "> {{$value1['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" >State : </label>
                        <div class="col-md-18">
                            <input type="text" name="stateval" id="stateval" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <hr>
                    <div class="form-group">
                        <button class="close" data-dismiss="modal" style="padding-top: 10px; padding-left: 10px;"> Close </button>
                    <button type="submit" class="close" style="padding-top: 10px; padding-left: 10px;"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#country').click(function(){
     $('#countryModal').modal('show');
 });
</script>
<script type="text/javascript">
    $('#state').click(function(){
        
        $('#stateModal').modal('show');
 });
</script>


<script type="text/javascript">
    $('#countryform').on('submit',function(event){
        event.preventDefault();

        countryval = $('#countryval').val();
        alert(countryval);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: "{{ route('addcountry') }}",
          type:"POST",
          data:{
            countryval:countryval,
          },
          success:function(response){
            console.log(response.success);
            alert(response.success);
          },
         });
        });
</script>

<script type="text/javascript">
    $('#stateform').on('submit',function(event){
        event.preventDefault();

        countryval = $('#countryval1').val();
        stateval = $('#stateval').val();
        alert(countryval);
        alert(stateval);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: "{{ route('addstate') }}",
          type:"POST",
          data:{
            countryval:countryval,
            stateval:stateval,
          },
          success:function(response){
            console.log(response.success);
            alert(response.success);
          },
         });
        });
</script>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
