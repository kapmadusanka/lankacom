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


                        <div class="card-panel">
                            <div class="card">
                                <div class="card-body">

                                        <form enctype="multipart/form-data" action="{{route('company_submit')}}" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="company_id" value="{{$company->id}}">
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
                                                        <label for="name">Name</label>
                                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $company->name }}"  >

                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $company->email }}"  >

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ $company->website }}"  >

                                                        @if ($errors->has('website'))
                                                            <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('website') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                        <div class="form-group">
                                                            <label for="website">Logo (100x100)</label>
                                                            <input id="website" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo"   >

                                                            @if ($errors->has('logo'))
                                                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('logo') }}</strong>
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
