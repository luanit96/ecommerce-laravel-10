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
                            @can('list-product')
                                <li class="breadcrumb-item"><a href="{{ route('list-products') }}">Products</a></li>
                            @endcan
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
                                    <label>Product name(*)</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter product name">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Price(*)</label>
                                    <input type="text" name="price" value="{{ old('price') }}"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Enter price">
                                    @error('price')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Discount(*)</label>
                                    <input type="text" name="discount" value="{{ old('discount') }}"
                                        class="form-control @error('discount') is-invalid @enderror"
                                        placeholder="Enter discount">
                                    @error('discount')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="feature_image_path"
                                        class="form-control-file @error('feature_image_path') is-invalid @enderror"
                                        id="fileUpload">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="outputFileUpload" class="img-style" accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                    @error('feature_image_path')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image Detail</label>
                                    <input type="file" multiple name="image_path[]" class="form-control-file"
                                        id="multipleFileUpload">
                                    <div class="row" id="outputMultipleFile"></div>
                                </div>
                                <div class="form-group">
                                    <label>Category(*)</label>
                                    <select class="form-control category_select2 @error('category_id') is-invalid @enderror"
                                        name="category_id" style="width: 100%">
                                        <option></option>
                                        {!! $htmlOptions !!}
                                    </select>
                                    @error('category_id')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select name="tags[]" class="form-control tags_select2_choose" multiple="multiple"
                                        style="width: 100%">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Colors</label>
                                    <select class="form-control color_select2" name="colors[]" multiple>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}
                                                ({{ $color->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sizes</label>
                                    <select class="form-control size_select2" name="sizes[]" multiple>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}
                                                ({{ $size->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Samples</label>
                                    <select class="form-control sample_select2" name="samples[]" multiple>
                                        @foreach ($samples as $sample)
                                            <option value="{{ $sample->id }}">{{ $sample->name }}
                                                ({{ $sample->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" min="1" value="1"
                                        class="form-control @error('quantity') is-invalid @enderror">
                                    @error('quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="summernote-editor" class="form-control" name="contents" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('assets/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/summernote.js') }}"></script>
    <script src="{{ asset('assets/admin/js/loadFile.js') }}"></script>
    <script src="{{ asset('assets/admin/product/app.js') }}"></script>
@endsection
