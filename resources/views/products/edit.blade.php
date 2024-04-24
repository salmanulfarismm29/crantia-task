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
                                <h4 class="text-primary ">Edit Product</h4>
                            </div>
                            <div class="card-body" style="background-color: #f0f2f5;">
                                <div class="container p-4">
                                    <form action="{{ route('products.update', $product->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-2">
                                                    <label for="">Product Name</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" name="productname"
                                                        class="form-control @error('productname') is-invalid @enderror"
                                                        placeholder="Enter name" value="{{ $product->name }}">
                                                    @error('productname')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-2">
                                                    <label for="">Description</label><span
                                                        class="text-danger">*</span>
                                                    <textarea name="productdesc" class="form-control  @error('productdesc') is-invalid @enderror"
                                                        placeholder="Enter Description" id="description" style="height: 100px">{{ $product->discription }}</textarea>
                                                    @error('productdesc')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($product->image)
                                                <div class="col-md-6">
                                                    <div class="w-100 bg-danger">
                                                        <img src="{{ $product->image }}" alt="Image">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group mb-2">
                                                    <label for="">Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class=" col-md-6 form-group mb-2  float-end">
                                                    <button type="submit"
                                                        class="btn btn-primary px-5 float-end">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
