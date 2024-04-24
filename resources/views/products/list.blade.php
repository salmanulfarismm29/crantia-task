@extends('layout')

@section('content')
    <div class="col vh-100 d-flex ">
        @include('includes.nav')
        <div class="w-100">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-primary ">List Product</h4>
                            </div>
                            <div class="card-body p-0" style="background-color: #f0f2f5;">
                                @if (session('success'))
                                    <div class="alert alert-success" id="successFlashMsg"> {{ session('success') }} </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger"> {{ session('success') }} </div>
                                @endif
                                <table class="table table-bordered border-secondary table-responsive">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">SINO</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Discription</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->discription }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/images/product_image/' . $item->image) }}"
                                                            alt="product-image" width="100px">
                                                    @else
                                                        No Image!
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#"
                                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('products.show', $item->id) }}">View</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('products.edit', $item->id) }}">Edit</a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('products.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item">Delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
