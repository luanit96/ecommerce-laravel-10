@extends('layouts.admin')

@section('title')
    <title>add product</title>
@endsection

@section('css')
    <link href="{{ asset('assets/vendors/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/product/app.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list-products') }}">Products</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('post-products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Product name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter product name" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter price"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" name="discount" class="form-control" placeholder="Enter discount"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image_path">Image</label>
                                    <input type="file" name="feature_image_path" class="form-control-file"
                                        id="productFile">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="outputProductFile" class="img-product" accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image Detail</label>
                                    <input type="file" multiple name="image_path[]" class="form-control-file"
                                        id="productMultipleFile">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img id="outputproductMultipleFile0" class="img-product"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                        <div class="col-md-3">
                                            <img id="outputproductMultipleFile1" class="img-product"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                        <div class="col-md-3">
                                            <img id="outputproductMultipleFile2" class="img-product"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                        <div class="col-md-3">
                                            <img id="outputproductMultipleFile3" class="img-product"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control category_select2" name="category_id">
                                        <option>--Select Category--</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select name="tags[]" class="form-control tags_select2_choose" multiple="multiple">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-10">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="summernote-editor" class="form-control" name="contents" rows="8"></textarea>
                                </div>
                                <input type="submit" value="Add" class="btn btn-lg btn-success float-left">
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

@section('js')
    <script src="{{ asset('assets/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/summernote.js') }}"></script>
    <script src="{{ asset('assets/admin/product/app.js') }}"></script>
    <script>
        $(() => {
            productFile.onchange = e => {
                const [file] = productFile.files;
                if (file) {
                    outputProductFile.src = URL.createObjectURL(file)
                }
            }

            // productMultipleFile.onchange = e => {
            //     const multipleFile = productMultipleFile.files;
            //     //reset default attr
            //     $('#outputproductMultipleFile0').attr('src', '');
            //     $('#outputproductMultipleFile1').attr('src', '');
            //     $('#outputproductMultipleFile2').attr('src', '');
            //     $('#outputproductMultipleFile3').attr('src', '');
            //     if (multipleFile.length > 0) {
            //         for (let i = 0; i < multipleFile.length; i++) {
            //             $('#outputproductMultipleFile' + i).attr('src', URL.createObjectURL(multipleFile[i]));
            //         }
            //     }
            // }
        });
    </script>
@endsection
