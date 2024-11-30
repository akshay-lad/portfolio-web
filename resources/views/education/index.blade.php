@extends('layouts.master')
@section('content')

<main>
    <div class="pagetitle">
        <h1>Education</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('admin/home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/education') }}>Education Manage</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            @if(session()->has('del_success'))
                            <div class="alert alert-success">
                                {{ session()->get('del_success') }}
                            </div>
                            @endif
                            <a style="float: right; margin-right: 45px; margin-top: 20px; margin-left: 20px;margin-bottom:10px;" type="button" class="btn btn-outline-primary" href="{{ url('admin/education-create')}}">ADD</a>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Passing Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($educations as $education)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$education->name}}</td>
                                        <td>{{$education->description}}</td>
                                        <td>{{$education->passing_year}}</td>
                                        <td>
                                            <form id="delete" name="delete" action="{{url('admin/education-delete/'.$education->id)}}" method="delete">
                                                @csrf
                                                <a href="{{url('admin/education/'.$education->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin: left 3px; ; font-size: 22px; margin-top: 3px; color: #0d6efd;"></i></a>
                                                <a href="#"><i class="fa fa-trash-o show_confirm" aria-hidden="true" style="margin-left: 3px; font-size: 22px; margin-top: px; color: red;"></i></a>

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end mr-2">
                                {{ $educations->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection