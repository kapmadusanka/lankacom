@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Employee
            <small>Create</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
           &nbsp; / &nbsp;
            <li class="active">Employee Create</li>
        </ol>
    </section>
    <section class="content">
        <!-- Your Page Content Here -->

        <!-- /.panel-header -->
        <div class="panel panel-primary">
            <div class="panel-header with-border">
                <h3 class="panel-title">Employee Create</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">


                        <div class="card-panel">
                            <div class="card">
                                <div class="card-body">

                                        <form enctype="multipart/form-data" action="{{route('employee_submit')}}" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success">
                                                            <ul>
                                                                <li>{{Session::get('success') }}</li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="name">First Name</label>
                                                        <input id="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $employee->first_name }}"  >

                                                        @if ($errors->has('first_name'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Last Name</label>
                                                        <input id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $employee->last_name }}"  >

                                                        @if ($errors->has('last_name'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $employee->email }}"  >

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Phone">Phone</label>
                                                        <input id="Phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $employee->phone }}"  >

                                                        @if ($errors->has('phone'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="company_id">company</label>
                                                        <select class="form-control" name="company_id">
                                                            @foreach ($companies as $key=>$company)
                                                                <option <?= $employee->company_id==$key?'selected':'' ?> value="{{$key}}">{{$company}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('company_id'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('company_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
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
