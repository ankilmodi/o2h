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
                        <h3 class="box-title">EMPLOYEE LIST</h3>
                        <a href="{{ route('employee.create') }}" class="btn btn-success pull-right"><i
                                    class="fa fa-plus-square"></i> Create New Employee</a>
                    </div>
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                             @foreach ($employees as $employee)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->Companie->name }}</td>
                                <td>{{ $employee->email  }}</td>
                                <td>{{ $employee->phone  }}</td>
                                <td>
                                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('employee.show',$employee->id) }}">Read</a>
                                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </table>
                         {!! $employees->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('include.footer')
@endsection