@extends('layouts.admin')

@section('title')
    <title>list slider</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Setting</h1>
                        @can('add-setting')
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Add Setting
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('create-settings') . '?type=text' }}">Text</a>
                                    <a class="dropdown-item"
                                        href="{{ route('create-settings') . '?type=textarea' }}">Textarea</a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content bg-white p-3">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="list-datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ $setting->id }}</td>
                                    <td>{{ $setting->key }}</td>
                                    <td>{{ $setting->value }}</td>
                                    <td>
                                        @can('edit-setting')
                                            <a href="{{ route('edit-settings', ['id' => $setting->id]) . '?type=' . $setting->type }}"
                                                class="pr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('delete-setting')
                                            <a href="{{ route('delete-settings', ['id' => $setting->id]) }}"
                                                class="pr-2 text-danger btnDelete" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
