@extends('layout')

@section('content')
    <div class="col vh-100 d-flex ">
        @include('includes.nav')
        <div class="w-100">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-primary ">Product Detais</h4>
                            </div>
                            <div class="card-body" style="background-color: #f0f2f5;">
                                <div class="container p-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Product Name : </b> {{ $product->name }}
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <b>Product Description : </b> {{ $product->discription }}
                                        </div>
                                        @if ($product->image)
                                            <div class="col-md-12">
                                                <div class="w-100">
                                                    <b>Product Image :</b>
                                                    <img src="{{ $product->image }}" alt="Image">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6"><a href="{{ route('products.edit', $product->id) }}">
                                                <button class="btn btn-primary">Edit</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
