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
                    <form action="{{ route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-7">
                            <label for="parent_id" class="form-label">Parent<span class="text-danger">*</span></label>
                            {{$category}}
                            <!-- <input type="text" name="passing_year" value="{{old('passing_year')}}" class="form-control @error('passing_year') is-invalid @enderror" id="passing_year" placeholder="Passing Year" required> -->
                            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" placeholder="Parent" required>


                                <option>---Select Parent--</option>
                                @foreach ($categories as $dataItem)
                                <option value="{{ $dataItem->id }}" {{ $category->parent_id == $dataItem->id ? 'selected' : '' }}>{{ $dataItem->name }}</option>

                                @endforeach

                            </select>
                            @error('parent_id')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="Name" class="form-label">Name:<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>
                            @error('name')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                            <input type="text" name="description" value="{{$category->description}}" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" required>
                            @error('description')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-7">
                            <input type="submit" name="submit" value="Update" class="btn btn-outline-dark">
                            <input type="reset" class="btn btn-outline-dark" value="Cancel">
                            <a class="btn btn-outline-dark" href="{{ url('admin/category') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection