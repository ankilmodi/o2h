@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Company</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- right column -->
            <div class="col-md-8 col-md-offset-1">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Company</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('companie.update',$companie->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validat >
                            <div class="box-body">
                                @csrf
                                @method('PUT')
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-4 control-label">Company Name</label>
                                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name"
                                     value="{{ $companie->name }}"  placeholder="Enter Company Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Enter Email"  value="{{ $companie->email }}" >
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                             <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <label for="logo" class="col-sm-4 control-label">Logo</label>
                                    <div class="col-sm-5">
                            <input type="file" class="form-control" id="logo_new_image" name="logo"  value="" >

                             <input type="hidden" class="form-control" id="logo" name="old_logo"  value="{{ $companie->logo }}" >
                             <br>
                              <img id="logo_0"  style="width: 31%;height: 5%;" class="form-control" src="{{ asset('/storage/app/public/'.$companie->logo.'') }}"  alt="Image not found" />

                                        @if ($errors->has('logo'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>   

                          
                                 <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                    <label for="website" class="col-sm-4 control-label">Website</label>
                                    <div class="col-sm-5">
                            <input type="url" class="form-control" id="website" name="website"
                                               placeholder="Enter Website" value="{{ $companie->website }}">
                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div> 

                            <div class="box-footer">               
                                <button type="submit" name="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@include('include.footer')
   <script type="text/javascript"> 
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader0 = new FileReader();
                reader0.onload = function (e) {
                    $('#logo_0').attr('src', e.target.result);
                }
                reader0.readAsDataURL(input.files[0]);
            }
            else{
                $('#logo').attr('src', $('#logo_image').val());
            }
        }

        $("#logo_new_image").change(function(){
            readURL(this);
        });
</script>
@endsection