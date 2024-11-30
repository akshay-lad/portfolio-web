@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Experience</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/experience-create') }}>Edit Experience</a></li>
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
                    <form  action="{{ route('experience.update',$experience->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-7">
                            <label for="company_name" class="form-label">Company Name:<span class="text-danger">*</span></label>
                            <input type="text" name="company_name" value="{{$experience->company_name}}" class="form-control @error('company_name') is-invalid @enderror" id="company_name" placeholder="Company name" required>

                            @error('company_name')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-7">
                            <label for="position" class="form-label">Position<span class="text-danger">*</span></label>
                            <input type="text" name="position" value="{{$experience->position}}" class="form-control @error('position') is-invalid @enderror" id="position" placeholder="Position" required>
                            @error('position')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="joining_date" class="form-label">Joining Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('joining_date') is-invalid @enderror" value="{{$experience->joining_date}}" name="joining_date" name="joining_date" placeholder="Joining Date" >
                            @error('joining_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="leave_date" class="form-label">Leave Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('leave_date') is-invalid @enderror" value="{{$experience->leave_date}}"  name="leave_date" placeholder="Leave Date" >
                            @error('leave_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="is_current" class="form-label">Is Current<span class="text-danger">*</span></label>
                            <select name="is_current" value="{{$experience->is_current}}" class="form-select @error('is_current') is-invalid @enderror" id="is_current" aria-label="Default select example">
                            
                                <option value="1" {{$experience->is_current ? 'selected' : ''}}>True</option>
                                <option value="0" {{!$experience->is_current ? 'selected' : ''}}>False</option>
                                
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
                            <input type="text" name="display_order" value="{{$experience->display_order}}" class="form-control @error('display_order') is-invalid @enderror" id="display_order" placeholder="Display Order" required>
                            @error('display_order')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-7">
                            <label for="description_web" class="form-label">Description Web<span class="text-danger">*</span></label>
                            <input type="text" name="description_web" value="{{$experience->description_web}}" class="form-control @error('description_web') is-invalid @enderror" id="description_web" placeholder="Description Web" required>
                            @error('description_web')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="description_graphics" class="form-label">Description Graphics<span class="text-danger">*</span></label>
                            <input type="text" name="description_graphics" value="{{$experience->description_graphics}}" class="form-control @error('description_graphics') is-invalid @enderror" id="description_graphics" placeholder="Description Graphics" required>
                            @error('description_graphics')
                            <span class="text-danger">
                                <div class="invalid-feedback"></div>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-7">
                            <label for="is_display" class="form-label">Is Display<span class="text-danger">*</span></label>
                            <select name="is_display" value="{{$experience->is_display}}" class="form-select @error('is_display') is-invalid @enderror" id="is_display" aria-label="Default select example">
                               
                                <option value="1" {{$experience->is_display  ? 'selected' : ''}}>True</option>
                                <option value="0" {{!$experience->is_display ? 'selected' : ''}}>False</option>
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
                            <a class="btn btn-outline-dark" href="{{ url('admin/experience') }}">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection