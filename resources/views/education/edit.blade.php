@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Education</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/education-create') }}>Edit Education</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                    </div>
                    <form action="{{ route('education.update',$education->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-7">
                            <label for="Name" class="form-label">Name:<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$education->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>
                            @error('name')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                            <input type="text" name="description" value="{{$education->description}}" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" required>
                            @error('description')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="passing_year" class="form-label">Passing Year<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('passing_year') is-invalid @enderror" value="{{$education->passing_year}}" name="passing_year" name="passing_year" placeholder="Passing Year">
                            @error('passing_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <input type="submit" name="submit" value="Update" class="btn btn-outline-dark">
                            <input type="reset" class="btn btn-outline-dark" value="Cancel">
                            <a class="btn btn-outline-dark" href="{{ url('admin/experience') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection