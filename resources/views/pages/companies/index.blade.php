@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Company
            <small>List</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
           &nbsp; / &nbsp;
            <li class="active">Company List</li>
        </ol>
    </section>
    <section class="content">
        <!-- Your Page Content Here -->

        <!-- /.panel-header -->
        <div class="panel panel-primary">
            <div class="panel-header with-border">
                <h3 class="panel-title">Companies Details</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" >
                            <div class="col-lg-12" >
                                <a class="btn btn-info  pull-left  " href="{{ route('add_company') }}"  > Create New </a>
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
                                                        <th> Logo </th>
                                                        <th> Name </th>
                                                        <th> Email </th>
                                                        <th> Website </th>
                                                        <th> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($records as $k => $row)
                                                        <tr>
                                                            <td> {{ $k+1}} </td>
                                                            <td><img src="{{ asset('storage/'.$row->logo) }}"> </td>
                                                            <td>{{ $row->name }} </td>
                                                            <td>{{ $row->email }} </td>
                                                            <td>{{ $row->website }} </td>
                                                            <td class="text-center" >
                                                                <a href="{{ url('company_edit/'.$row->id) }}" class="btn btn-warning  " > Edit </a>
                                                                <a href="{{ url('company_delete/'.$row->id) }}" class="btn btn-danger  delete-btn " > Delete </a>
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