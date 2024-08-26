@extends('admin.admindashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Add Building</h6>
								<form id="myForm" method="POST" action="{{route('store.building')}}">
                                    @csrf
									<div class="form-group mb-3">
										<label for="exampleInputText1" class="form-label">Building Name</label>
										<input type="text" class="form-control" name="building_name" >
									</div>

									<button class="btn btn-primary" type="submit">Add Building</button>
								</form>
							</div>
						</div>
					</div>
				</div>

        </div>

        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        building_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        building_name: {
                            required : 'Please Enter Amenitie Name',
                        }, 
                         
        
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>

@endsection