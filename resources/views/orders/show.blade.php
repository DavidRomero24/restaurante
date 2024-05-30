@extends('layouts.app')

@section('title', 'Order Invoice')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Invoice</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <a href="index3.html" class="brand-link">
                                        <img src="{{ asset('backend/dist/img/logo.png') }}" alt="logo ocañerita" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: #A6774E;">
                                    </a> La Ocañerita
                                    <small class="float-right">Date: {{ $order->date }}</small>
                                </h4>
                            </div>
                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>La Ocañerita</strong><br>
                                    Address Line 1<br>
                                    Phone: (555) 555-5555<br>
                                    Email: laOcanerita@gmail.com
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ $order->customer->name }}</strong><br>
                                    {{ $order->customer->address }}<br>
                                    Phone: {{ $order->customer->phone_number }}<br>
                                    Email: {{ $order->customer->email }}
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #{{ $order->id }}</b><br>
                                <br>
                                <b>Order ID:</b> {{ $order->id }}<br>
                                <b>Creation Date:</b> {{ $order->date }}<br>
                                <b>Customer:</b> {{ $order->customer->id }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $detail)
                                            <tr>
                                                <td>{{ $detail->product->name }}</td>
                                                <td>{{ $detail->amount }}</td>
                                                <td>{{ $detail->product->price }}</td>
                                                <td>{{ $detail->subtotal }}</td>
                                                <td>
                                                <form class="d-inline delete-form" action="{{ route('orders.destroy', $detail) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total:</th>
                                            <th>{{ $order->total }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ route('orders.index') }}" class="btn" style="background-color: #A6774E;"><i class="fas fa-backward"></i> Back</a>
                                <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment</button> -->
                                    <!-- <a href="#" style=" margin-right: 5px; " class="btn float-right btn-success btn-sm" title="Edit"><i style="padding: 7px 7px;" class="fas fa-pencil-alt"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
