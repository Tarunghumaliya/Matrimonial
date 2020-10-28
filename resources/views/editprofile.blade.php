@foreach ($loginprofile as $value1)

@extends( $value1['admin'] == 1 ? 'layouts.admin' : 'layouts.app')


@endforeach

@foreach ($profile as $value)

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		function showpreview(event){
			if(event.target.files.length>0){
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("image-preview");
				preview.src= src;
				preview.style.display ="block";
			}
		}
	</script>
	<script>
		function validatedata(event){
			var ag = document.forms['editprofile'].elements['age'].value;
			if(ag <=18){
				alert('you are below age');
			}
		}
	</script>
	<script>
		function submitcheck(event){
			var ag = document.forms['editprofile'].elements['age'].value;
			if(ag <=18){
				alert('you are below age');
				window.close();
			}
		}
	</script>
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<form method="POST" id="editprofile" class="form-horizontal" enctype="multipart/form-data">
			@csrf
				
				<div class="border border-info">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<div class="form-group col-md-12">
						<label for="image" class="col-md-12 col-form-label ">Profile Picture</label>
		                    <input type="file" class="form-control-file" id="image" name="image" onchange="showpreview(event);">
		                    <div class="preview" id="imagepreview">
		                    	<img src="{{ asset('uploads/'.$value['photoname']) }}" id="image-preview"></img>
		                    </div>
					</div>					
					<div class="form-group">
						<label for="firstname" class="col-sm-5 control-label">FIRST NAME</label>
						<div class="col-md-12">
							<input type="text" name="firstname" value=" {{ $value['firstname']}} " class="form-control">
						</div>
					</div>
					<div class="form-group input-sm">
						<label>SURNAME</label>
						<input type="text" name="surname" value="{{$value['surname']}}">
					</div>
					<div class="form-group">
						<label>DATE OF BIRTH</label>
						<input type="date" name="dob" value="{{ $value['dob']}}">
					</div>
					<div class="form-group input-sm">
						<label>GENDER</label>
						<input type="radio" name="gender" id="male" value="male" {{ ($value["gender"]=="male")? "checked" : "" }} >male
						<input type="radio" name="gender" id="female" value="female" {{ ($value["gender"]=="female")? "checked" : "" }}>female
						<input type="radio" name="gender" id="other" value="other" {{ ($value["gender"]=="other")?"checked" : "" }}>other
					</div>
					<div class="form-group input-sm">
						<label>Age</label>
						<input type="number" id="age" name="age" value="{{ $value['age']}}">
					</div>
					<div class="form-group">
						<label>RELIGION</label>
						<input type="text" name="religion" onselect="validatedata(event)" onclick="validatedata(event)" value="{{ $value['religion']}}">
					</div>
					<div class="form-group input-sm">
						<label>CAST</label>
						<input type="text" name="cast" value="{{ $value['cast']}}">
					</div>
					<div class="form-group input-sm">
						<label>MOBILE</label>
						<input type="number" name="mobile" value="{{$value['mobile']}}">
					</div>
					<div class="form-group input-sm">
						<label>Height</label>
						<input type="number" name="height" value="{{$value['height']}}">
					</div>
					<div class="form-group input-sm">
						<label>Weight</label>
						<input type="number" name="weight" value="{{$value['weight']}}">
					</div>
					<div class="form-group input-sm">
						<label>Education</label>
						<input type="text" name="education" value="{{$value['education']}}">
					</div>
					<div class="form-group input-sm">
						<label>profession</label>
						<input type="text" name="profession" value="{{$value['profession']}}">
					</div>
					<div class="form-group input-sm">
						<label>salary</label>
						<input type="text" name="salary" value="{{$value['salary']}}">
					</div>
					<div class="form-group input-sm">
						<label>marid</label>
						<input type="text" name="marid" value="{{$value['marid']}}">
					</div>
					<div class="form-group input-sm">
						<label>Blod Group</label>
						<input type="text" name="blood" value="{{$value['blood']}}">
					</div>
					<div class="form-group input-sm">
						<label>Mother Toung</label>
						<input type="text" name="mothertoung" value="{{$value['mothertoung']}}">
					</div>
					<div class="form-group input-sm">
						<label>Father Name</label>
						<input type="text" name="fathername" value="{{$value['fathername']}}">
					</div>
					<div class="form-group input-sm">
						<label>Occupation</label>
						<input type="text" name="foccupation" value="{{$value['foccupation']}}">
					</div>
					<div class="form-group input-sm">
						<label>Mother Name</label>
						<input type="text" name="mothername" value="{{$value['mothername']}}">
					</div>
					<div class="form-group input-sm">
						<label>Occupation</label>
						<input type="text" name="moccupation" value="{{$value['moccupation']}}">
					</div>
					<div class="form-group input-sm">
						<label>No of Brother</label>
						<input type="number" name="brother" value="{{$value['brother']}}">
					</div>
					<div class="form-group input-sm">
						<label>No of Sister</label>
						<input type="number" name="sister" value="{{$value['sister']}}">
					</div>
					<div class="form-group">
		                <label for="country">Select Country:</label>
		                <select name="country" class="form-control" style="width:250px">
		                    <option value="">--- Select Country ---</option>
		                    @foreach ($countries as $key => $value)
		                    <option value="{{ $key }}">{{ $value }}</option>
		                    @endforeach
		                </select>
		            </div>
		            <div class="form-group">
		                <label for="state">Select State:</label>
		                <select name="state" class="form-control"style="width:250px">
		                <option>--State--</option>
		                </select>
		            </div>
		            <div class="form-group">
		                <label for="city">Select city:</label>
		                <select name="city" class="form-control"style="width:250px">
		                <option>--City--</option>
		                </select>
		            </div>
					
						<button type="submit" class="btn btn-primary" onclick="submitcheck(event)" >Save & Next</button>
				</div>
				
			</form>
			</div>
			</div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="country"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getstates/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="state"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="state"]').empty();
               }
            });


            jQuery('select[name="state"]').on('change',function(){
               var stateID = jQuery(this).val();
               if(stateID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getcitys/' +stateID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="city"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="city"]').empty();
               }
            });

    });
    </script>
</body>
</html>

@endsection


@endforeach