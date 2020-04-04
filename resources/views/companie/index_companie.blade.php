@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header box-header-title">
                        <h3 class="box-title">Company LIST</h3>
                        <a href="{{ route('companie.create') }}" class="btn btn-success pull-right"><i
                                    class="fa fa-plus-square"></i> Create New Company</a>
                    </div>
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                             @foreach ($companies as $companie)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $companie->name }}</td>
                                <td>{{ $companie->email }}</td>
                                 <td><img src="{{ asset('/storage/app/public/'.$companie->logo.'') }}" height="30%" width="
                                    30%"></td>
                                <td>{{ $companie->website }}</td>
                                <td>
                                <form action="{{ route('companie.destroy',$companie->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('companie.show',$companie->id) }}">Read</a>
                                    <a class="btn btn-primary" href="{{ route('companie.edit',$companie->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </table>
                         {!! $companies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('include.footer')
@endsection