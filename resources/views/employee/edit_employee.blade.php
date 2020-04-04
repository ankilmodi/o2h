@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Employee</li>
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
                            <h3 class="box-title">Edit Employees</h3>
                        </div>
                            <form class="form-horizontal" action="{{ route('employee.update',$employee->id)}}" method="post" enctype="multipart/form-data" data-parsley-validat >
                            <div class="box-body">
                                  @csrf
                                @method('PUT')
                             <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name" class="col-sm-4 control-label">First Name</label>
                                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="first_name" name="first_name"
                                               placeholder="Enter First Name" value="{{$employee->first_name}}">
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                                    <div class="col-sm-5">
                    <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$employee->last_name}}">
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                             <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                                    <label for="company_id" class="col-sm-4 control-label">Company</label>
                                     <div class="col-sm-5">
                                     <select name="company_id" class="form-control" value="">
                                        @foreach ($companies as $key=>$value)         
                                            <option value="{{ $key }}" {{ $employee->company_id == $key ? "selected" : "" }}>{{ $value }}</option>
                                        @endforeach
                                       </select>
                                 
                                        @if ($errors->has('company_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>   
   
                                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Enter Email" value="{{$employee->email}}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div> 


                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-sm-4 control-label">Phone</label>
                                    <div class="col-sm-5">
                            <input type="phone" class="form-control" id="phone" name="phone"
                                               placeholder="Enter Phone" value="{{$employee->phone}}">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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
@endsection