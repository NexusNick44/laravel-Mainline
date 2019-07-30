@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div id="page-content">
        <div class="container mt-2">
            <h3>Basket</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $row)
                        <tr>
                            <td>
                                <p><strong><a class="orange-text" href="/product/{{ strtolower($row->name) }}">{{ $row->name }}</a></strong></p>
                                <p>{{ $row->options->has('unit_type') ? $row->options->unit_type : '' }}</p>
                            </td>
                            <td>
                                <input class="form-control" type="text" value="{{ $row->qty }}">
                            </td>
                            <td>£ {{ number_format($row->price, 2, '.', '') }}</td>
                            <td>£ {{ number_format($row->subtotal, 2, '.', '') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Subtotal</td>
                        <td>{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Tax</td>
                        <td>{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Total</td>
                        <td>{{ Cart::total() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
