@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary ">Login</h4>
                    </div>
                    <div class="card-body" style="background-color: #f0f2f5;">
                        <div class="container p-4">
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <form action="{{route('loginhere')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="">Email</label><span class="text-danger">*</span>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="">Password</label><span class="text-danger">*</span>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class=" col-md-6 form-group mb-2  float-end">
                                            <button type="submit" class="btn btn-primary px-5 float-end">Login</button>
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
@endsection
