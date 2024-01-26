@extends('layouts.admin')

@section('title')
    <title>edit setting</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Setting Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list-settings') }}">Settings</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('update-settings', ['id' => $setting->id]) . '?type=' . $setting->type }}"
                method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Key(*)</label>
                                    <input type="text" name="key" value="{{ $setting->key }}" class="form-control"
                                        placeholder="Enter key" required>
                                </div>
                                @if (request()->type == 'text')
                                    <div class="form-group">
                                        <label for="inputName">Value(*)</label>
                                        <input type="text" name="value" value="{{ $setting->value }}"
                                            class="form-control" placeholder="Enter value" required>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label>Value(*)</label>
                                        <textarea class="form-control" name="value" rows="5">{{ $setting->value }}</textarea>
                                    </div>
                                @endif
                                <input type="submit" value="Update" class="btn btn-lg btn-success float-left">
                            </div>
                        </div>
                    </div><!--end col-->
                </div>
            </form>
        </section>
        <!-- end main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
