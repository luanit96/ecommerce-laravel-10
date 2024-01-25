@extends('layouts.admin')

@section('title')
    <title>add menu</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menu Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list-menus') }}">Menus</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('post-menus') }}" method="post">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter menu name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="0">Parent menu</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Add" class="btn btn-lg btn-success float-left">
                    </form>
                </div>
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
