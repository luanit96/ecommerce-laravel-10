@extends('layouts.admin')

@section('title')
    <title>add role</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Role Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list-roles') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('post-roles') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role name(*)</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter role name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Description(*)</label>
                                    <textarea class="form-control" name="display_name" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12">
                        <label style="font-size: 18px;padding: 0 5px;color: #050505;font-weight: 700;"><input
                                type="checkbox" class="checkboxAllPermission"> Check All</label>
                    </div><!--end col-->
                    <div class="col-md-12">
                        @foreach ($permissionParents as $permissionParent)
                            <div class="card">
                                <div class="card-header" style="background-color: #9be9f2;">
                                    <input type="checkbox" class="checkboxWrapper">
                                    <span class="text-capitalize"
                                        style="font-size: 18px;padding: 0 5px;color: #050505;font-weight: 700;">
                                        {{ $permissionParent->name }}</span>
                                </div>
                                <div class="row">
                                    @foreach ($permissionParent->permissionChildrent as $permissionItem)
                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkboxChildrent"
                                                            name="permission_id[]" value="{{ $permissionItem->id }}">
                                                        {{ $permissionItem->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!--end card-->
                        @endforeach
                    </div><!--end col-->
                    <div class="col-md-12">
                        <input type="submit" value="Add" class="btn btn-lg btn-success float-left mb-3">
                    </div><!--end col-->
                </div>
            </form>
        </section>
        <!-- end main content -->
    </div>
    <!-- end content-wrapper -->
@endsection

@section('js')
    <script>
        $(function() {
            $(".checkboxWrapper").click(function() {
                $(this).parents('.card').find('.checkboxChildrent').prop('checked', this.checked);
            });

            $('.checkboxAllPermission').click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
    </script>
@endsection
