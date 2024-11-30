@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Experience</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/experience-create') }}>Add Experience</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                    </div>

                    <form action="{{url('admin/save_experiences')}}" method="POST" name="frm_experiences" id="frm_experiences" class="row g-3" novalidate>
                        @csrf

                        <div class="col-7">
                            <label for="company_name" class="form-label">Company Name:<span class="text-danger">*</span></label>
                            <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control @error('company_name') is-invalid @enderror" id="company_name" placeholder="Company Name" required>

                            @error('company_name')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-7">
                            <label for="position" class="form-label">Position<span class="text-danger">*</span></label>
                            <input type="text" name="position" value="{{old('position')}}" class="form-control @error('position') is-invalid @enderror" id="position" placeholder="Position" required>

                            @error('position')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="joining_date" class="form-label">Joining Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('joining_date') is-invalid @enderror" name="joining_date" name="joining_date" placeholder="Joining Date" value="">

                            @error('joining_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="leave_date" class="form-label">Leave Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('leave_date') is-invalid @enderror" name="leave_date" name="leave_date" placeholder="Leave Date" value="">

                            @error('leave_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="is_current" class="form-label">Is Current<span class="text-danger">*</span></label>
                            <select name="is_current" value="{{(int)old('is_current')}}" class="form-select @error('is_current') is-invalid @enderror" id="is_current" aria-label="Default select example">
                                <option selected>---Select Value---</option>
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>

                            @error('is_current')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="display_order" class="form-label">Display Order<span class="text-danger">*</span></label>
                            <input type="text" name="display_order" value="{{old('display_order')}}" class="form-control @error('display_order') is-invalid @enderror" id="display_order" placeholder="Display Order" required>
                            @error('display_order')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="description_web" class="form-label">Description Web<span class="text-danger">*</span></label>
                            <input type="text" name="description_web" value="{{old('description_web')}}" class="form-control @error('description_web') is-invalid @enderror" id="description_web" placeholder="Description Web" required>
                            @error('description_web')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="description_graphics" class="form-label">Description Graphics<span class="text-danger">*</span></label>
                            <input type="text" name="description_graphics" value="{{old('description_graphics')}}" class="form-control @error('description_graphics') is-invalid @enderror" id="description_graphics" placeholder="Description Graphics" required>
                            @error('description_graphics')
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
                            <a class="btn btn-outline-dark" href="{{ url('admin/experience') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection