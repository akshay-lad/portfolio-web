@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Skills</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/skills-create') }}>Edit Skills</a></li>
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
                    <form  action="{{ route('skills.update',$skill->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-7">
                            <label for="name" class="form-label">Name:<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$skill->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>

                            @error('name')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-7">
                            <label for="percentage" class="form-label">Percentage<span class="text-danger">*</span></label>
                            <input type="text" name="percentage" value="{{$skill->percentage}}" class="form-control @error('percentage') is-invalid @enderror" id="percentage" placeholder="Percentage" required>
                            @error('position')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="is_display" class="form-label">Is Display<span class="text-danger">*</span></label>
                            <select name="is_display" value="{{$skill->is_display}}" class="form-select @error('is_display') is-invalid @enderror" id="is_display" aria-label="Default select example">
                               
                                <option value="1" {{$skill->is_display  ? 'selected' : ''}}>True</option>
                                <option value="0" {{!$skill->is_display ? 'selected' : ''}}>False</option>
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
                            <a class="btn btn-outline-dark" href="{{ url('admin/skills') }}">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection