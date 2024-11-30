@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Portfolio</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/portfolio-create') }}>Edit Portfolio</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                    </div>
                    <!-- route('experience.update', -->
                    <form action="{{ route('portfolio.update',$portfolio->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-7">
                            <label for="parent_id" class="form-label">Category<span class="text-danger">*</span></label>
                            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" required>
                                @foreach ($category as $dataItem)
                                <option value="{{ $dataItem->id }}" {{ $portfolio->parent_id == $dataItem->id ? 'selected' : '' }}>
                                    {{ $dataItem->name }}
                                </option>
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
                            <label for="title" class="form-label">Title:<span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{$portfolio->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" required>

                            @error('title')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-7">
                            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                            <input type="text" name="description" value="{{$portfolio->description}}" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" required>
                            @error('description')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                            <select name="type" value="{{$portfolio->type}}" class="form-select @error('type') is-invalid @enderror" id="type" aria-label="Default select example">

                                <option value="image" {{ $portfolio->type ? 'selected' : '' }}>Image</option>
                                <option value="video" {{ $portfolio->type ? 'selected' : '' }}>Video</option>
                            </select>
                            @error('type')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="url" class="form-label">Url<span class="text-danger">*</span></label>
                            <input type="text" name="url" value="{{$portfolio->url}}" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="Url" required>

                            @error('url')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="is_display" class="form-label">Is Display<span class="text-danger">*</span></label>
                            <select name="is_display" class="form-select @error('is_display') is-invalid @enderror" id="is_display" aria-label="Default select example">
                                <option value="1" {{ $portfolio->is_display ? 'selected' : '' }}>True</option>
                                <option value="0" {{ !$portfolio->is_display ? 'selected' : '' }}>False</option>
                            </select>

                            @error('is_display')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-7">
                            <input type="submit" name="submit" value="Update" class="btn btn-outline-dark">
                            <input type="reset" class="btn btn-outline-dark" value="Cancel">
                            <a class="btn btn-outline-dark" href="{{ url('admin/portfolio') }}">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection