@extends('layouts.admin')

@section('title')
    <title>list order</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="list-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer ID</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->customer_id }}</td>
                                            <td>{{ number_format($order->total) }}</td>
                                            <td
                                                class="@if ($order->status === 'pending') text-warning @elseif($order->status === 'transport') text-success @else text-primary @endif">
                                                {{ $order->status }}
                                            </td>
                                            <td>
                                                @can('show-cart')
                                                    <a href="{{ route('show-orders', ['id' => $order->id]) }}" class="pr-2"
                                                        title="show">
                                                        <i class="fas fa-eye"></i></a>
                                                @endcan
                                                @can('delete-cart')
                                                    <a href="{{ route('delete-orders', ['id' => $order->id]) }}"
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
                </div>
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
