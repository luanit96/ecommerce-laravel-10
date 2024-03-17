@extends('layouts.admin')

@section('title')
    <title>edit product</title>
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
                        <h1>Product Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-product')
                                <li class="breadcrumb-item"><a href="{{ route('list-products') }}">Products</a></li>
                            @endcan
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('update-products', ['id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Product name(*)</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter product name" value="{{ $product->name }}">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Price(*)</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Enter price"
                                        value="{{ $product->price }}" required>
                                    @error('price')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Discount(*)</label>
                                    <input type="text" name="discount"
                                        class="form-control @error('discount') is-invalid @enderror"
                                        placeholder="Enter discount" value="{{ $product->discount }}">
                                    @error('discount')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="feature_image_path"
                                        value="{{ $product->feature_image_path }}"
                                        class="form-control-file @error('feature_image_path') is-invalid @enderror"
                                        id="fileUpload">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="outputFileUpload" src="{{ $product->feature_image_path }}"
                                                class="img-style" accept=".png, .jpg, .jpeg">
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
                                    <div class="row" id="outputMultipleFile">
                                        @foreach ($product->images as $productImageItem)
                                            <img src="{{ $productImageItem->image_path }}" class="img-style"
                                                accept=".png, .jpg, .jpeg">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category(*)</label>
                                    <select class="form-control category_select2 @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option>--Select Category--</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                    @error('category_id')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select name="tags[]" class="form-control tags_select2_choose" multiple="multiple">
                                        @foreach ($product->tags as $productTagItem)
                                            <option value="{{ $productTagItem->name }}" selected>
                                                {{ $productTagItem->name }}
                                            </option>
                                        @endforeach
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
                                            <option value="{{ $color->id }}"
                                                {{ $product->colors->contains('id', $color->id) ? 'selected' : '' }}>
                                                {{ $color->name }}
                                                ({{ $color->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sizes</label>
                                    <select class="form-control size_select2" name="sizes[]" multiple>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}"
                                                {{ $product->sizes->contains('id', $size->id) ? 'selected' : '' }}>
                                                {{ $size->name }}
                                                ({{ $size->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Samples</label>
                                    <select class="form-control sample_select2" name="samples[]" multiple>
                                        @foreach ($samples as $sample)
                                            <option value="{{ $sample->id }}"
                                                {{ $product->samples->contains('id', $sample->id) ? 'selected' : '' }}>
                                                {{ $sample->name }}
                                                ({{ $sample->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" min="1" value="{{ $product->quantity }}"
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
                                    <textarea id="summernote-editor" class="form-control" name="contents" rows="8">{{ $product->content }}</textarea>
                                </div>
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

@section('js')
    <script src="{{ asset('assets/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/summernote.js') }}"></script>
    <script src="{{ asset('assets/admin/js/loadFile.js') }}"></script>
    <script src="{{ asset('assets/admin/product/app.js') }}"></script>
@endsection
