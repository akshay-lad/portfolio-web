@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Skill</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/skills-create') }}>Add Skills</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                    </div>

                    <form action="{{url('admin/save_skills')}}" method="POST" name="frm_experiences" id="frm_experiences" class="row g-3" novalidate>
                        @csrf

                        <div class="col-7">
                            <label for="name" class="form-label">Name:<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>

                            @error('name')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-7">
                            <label for="percentage" class="form-label">Position<span class="text-danger">*</span></label>
                            <input type="text" name="percentage" value="{{old('percentage')}}" class="form-control @error('percentage') is-invalid @enderror" id="percentage" placeholder="Percentage" required>
                            @error('percentage')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="is_display" class="form-label">Is Display<span class="text-danger">*</span></label>
                            <select name="is_display" value="{{(int)old('is_display')}}" class="form-select @error('is_display') is-invalid @enderror" id="is_display" aria-label="Default select example">
                            <option selected>---Select Value---</option>
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>

                            @error('is_display')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-7">
                            <input type="submit" name="submit" value="SAVE" class="btn btn-outline-dark">
                            <input type="reset" class="btn btn-outline-dark" value="Cancel">
                            <a class="btn btn-outline-dark" href="{{ url('admin/skills') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection