@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Companie View</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- right column -->
            <div class="col-md-8 col-md-offset-1">
                
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Companie View</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('companie.update',$companie->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                             <div class="form-group">
                                    <label for="name" class="col-sm-4 control-label">Companie Name</label>

                                    <label for="name" class="col-sm-4 control-label"> {{ $companie->name }}</label>
                            </div>

                            <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">Email</label>
                                    <label for="email" class="col-sm-4 control-label">{{ $companie->email }}</label>
                            </div>

                            <div class="form-group">
                                    <label for="logo" class="col-sm-4 control-label">Logo</label>
                                    <img src="{{ asset('/storage/app/public/'.$companie->logo.'') }}" height="30%" width="
                                    30%">                                    
                                </div>   
                                 <div class="form-group">
                                    <label for="website" class="col-sm-4 control-label">Website</label>
                                <label for="website" class="col-sm-4 control-label">{{ $companie->website }}</label>
                            </div> 

                           
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection