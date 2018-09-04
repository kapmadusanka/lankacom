@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Employee
            <small>List</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
           &nbsp; / &nbsp;
            <li class="active">Employee List</li>
        </ol>
    </section>
    <section class="content">
        <!-- Your Page Content Here -->

        <!-- /.panel-header -->
        <div class="panel panel-primary">
            <div class="panel-header with-border">
                <h3 class="panel-title">Employee Details</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" >
                            <div class="col-lg-12" >
                                <a class="btn btn-info  pull-left  " href="{{ route('add_employee') }}"  > Create New </a>
                            </div>
                        </div>

                        <div class="card-panel">
                            <div class="card">
                                <div class="card-body">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            <ul>
                                                <li>{{Session::get('success') }}</li>
                                            </ul>
                                        </div>
                                    @endif
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                                <table id="datatable" class=" table table-striped " >
                                                    <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> First Name </th>
                                                        <th> Last Name </th>
                                                        <th> Email </th>
                                                        <th> Phone </th>
                                                        <th> Company </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($records as $k => $row)
                                                        <tr>
                                                            <td> {{ $k+1}} </td>
                                                            <td>{{ $row->first_name }} </td>
                                                            <td>{{ $row->last_name }} </td>
                                                            <td>{{ $row->email }} </td>
                                                            <td>{{ $row->phone }} </td>
                                                            <td>{{ $row->get_companies->name }} </td>
                                                            <td class="text-center" >
                                                                <a href="{{ url('employee_edit/'.$row->id) }}" class="btn btn-warning  " > Edit </a>
                                                                <a href="{{ url('employee_delete/'.$row->id) }}" class="btn btn-danger  delete-btn " > Delete </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
            </div>

        </div>
        <!-- form start -->


    </section>
@endsection
@push('scripts')


<script>
    $(function() {
        $('#datatable').DataTable();

    });
</script>

@endpush