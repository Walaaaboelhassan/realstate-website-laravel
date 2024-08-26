@extends('admin.admindashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">

    <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Add Blog</h6>
								<form id="myForm" method="POST" action="{{ route('update.blog') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $editData->id }}">
                                    <input type="hidden" name="img_old" value="{{ $editData->blog_image }}">
									<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Blog name</label>
										<input type="text" class="form-control" id="exampleInputText1" name="blog_name" value="{{ $editData->blog_name }}">
									</div>

                                    <div class="col-md-12">
                                        <label for="exampleInputText1" class="form-label">Blog tags</label>
                                        <div>
                                            <input name="blog_tags" id="tags" value="{{ $editData->blog_tags }}" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <label class="form-label">Blog Category </label>
                                        <select class="js-example-basic-single form-select" name="category_id" data-width="100%">

                                            @foreach ( $categories as $item )
                                                <option value="{{ $item->id }}" {{ $item->id == $editData->category_id ? 'selected' : '' }}>{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputText1" class="form-label">Blogs</label>
                                        <textarea class="form-control" name="blog_description" id="tinymceExample" rows="10">{{ $editData->blog_description }}</textarea>
									</div>
                                    <div class="mb-3">
										<label for="exampleInputText1" class="form-label">Blog Image</label>
										<div class="col-sm-9 text-secondary">
                                            <input type="file" name="blog_image" class="form-control"  id="image"   />
                                        </div>
									</div>
                                   
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                             <img id="showImage" src="{{ asset($editData->blog_image) }}" alt="Image" style="width:100px; height: 100px;"  >
                                        </div>
                                        <br>
                                    
                                  

									<button class="btn btn-primary" type="submit">Add Blogs</button>
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
                        blog_name: {
                            required : true,
                        }, 
                        blog_tags: {
                            required : true,
                        },
                        category_id: {
                            required : true,
                        },
                        blog_description: {
                            required : true,
                        },
                    },
                    messages :{
                        blog_name: {
                            required : 'Please Enter Blog Name',
                        },
                        blog_tags: {
                            required : 'Please Enter Blog Tags',
                        },
                        category_id: {
                            required : 'Please select a Category',
                        },
                        blog_description: {
                            required : 'Please Enter Blog Description',
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
        
        
        
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>

@endsection