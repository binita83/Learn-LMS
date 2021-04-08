@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms --> 
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Profile</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">	




<!-- Start Row -->
<div class="row">
	<div class="col-md-6" >

		<div class="form-group">
	<h5>User Name <span class="text-danger">*</span></h5>
	<div class="controls">
	<input type="text" name="name" class="form-control" value="{{ $editData->name }}" required="">
	 </div>
          </div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>User Email <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->

 
 <!-- Start Row -->
<div class="row">
	<div class="col-md-6" >

		<div class="form-group">
	<h5>User Mobile <span class="text-danger">*</span></h5>
	<div class="controls">
	<input type="text" name="mobile" class="form-control" value="{{ $editData->mobile }}" required="">
	 </div>
          </div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>User Address <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="address" class="form-control" value="{{ $editData->address }}" required="">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->

<!-- Start Row -->
<div class="row">
	<div class="col-md-6" >

		<div class="form-group">
	<h5>Gender <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="gender"  required="" class="form-control">
			<option value="" selected="" disabled="">Select Gender</option>
 			<option value="Male" {{ ($editData->gender == "Male" ? "selected": "") }}  >Male</option>
 			<option value="Female" {{ ($editData->gender == "Female" ? "selected": "") }} >Female</option>
			 
		</select>
	 </div>
          </div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>User Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" id="image">  </div>
		 
	</div>

	<div class="form-group">
			
			<div class="controls">
			<img id="showImage"
			 src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }} " 
			 alt="User Avatar" style="height:100Px; width:100px; border:1px;"></img>
			 </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->






  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

 

 
	  
	  </div>
  </div>



<script type="text/javascript">
/*$(document).ready(function(){
	$('#image').change(function(e){
			var reader=new FileReader();
			reader.onload()=function(e){
				$('#showImage').attr('src',e.target.result);

			}
				reader.readAsDataURL(e.target.files[0]);
	});

});*/

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#showImage').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#image").change(function() {
  readURL(this);
});
</script>

@endsection