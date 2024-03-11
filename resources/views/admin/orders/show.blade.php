@extends('layouts.admin')

@section('title')
    <title>order</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-cart')
                                <li class="breadcrumb-item"><a href="{{ route('list-orders') }}">Orders</a></li>
                            @endcan
                            <li class="breadcrumb-item active">Show</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('update-orders', ['id' => $order->id]) }}" method="POST">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    <h4 class="text-capitalize text-primary">{{ $order->customers->name }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <h5 class="text-primary">{{ $order->customers->phone }}</h5>
                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <h5 class="text-primary">{{ $order->customers->address }}</h5>
                                </div>
                                <div class="form-group">
                                    <label>Note:</label>
                                    <h5 class="text-primary">{{ $order->customers->note }}</h5>
                                </div>
                                <div class="form-group">
                                    <label>Total:</label>
                                    <h5 class="text-primary">{{ number_format($order->total) }} đ</h5>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                        <option value="transport" {{ $order->status === 'transport' ? 'selected' : '' }}>
                                            Transport</option>
                                        <option value="success" {{ $order->status === 'success' ? 'selected' : '' }}>
                                            Success
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Update" class="btn btn-lg btn-success float-left mb-3">
                    </form>
                </div>
                <div class="col-md-12">
                    <h2 class="text-center text-primary">Order Details</h2>
                    <table id="list-datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Classify</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->cartdetails as $orderDetailItem)
                                <tr>
                                    <td>{{ $orderDetailItem->products->name }}</td>
                                    <td>
                                        @if (!is_null($orderDetailItem->size))
                                            <div class="text-capitalize size">Size: {{ $orderDetailItem->size }}
                                            </div>
                                        @endif
                                        @if (!is_null($orderDetailItem->color))
                                            <div class="text-capitalize color">Color: {{ $orderDetailItem->color }}
                                            </div>
                                        @endif
                                        @if (!is_null($orderDetailItem->sample))
                                            <div class="text-capitalize sample">Sample:
                                                {{ $orderDetailItem->sample }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $orderDetailItem->quantity }}</td>
                                    <td>{{ number_format($orderDetailItem->price) }} đ</td>
                                    <td>{{ number_format($orderDetailItem->totalPrice) }} đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--end col-->
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
