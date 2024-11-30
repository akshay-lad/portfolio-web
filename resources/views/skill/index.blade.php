@extends('layouts.master')
@section('content')

<main>
    <div class="pagetitle">
        <h1>Skill</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href={{ url('admin/home') }}>Home</a></li>
                <li class="breadcrumb-item active"><a href={{ url('admin/skills') }}>Skill Manage</a></li>
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
                            <a style="float: right; margin-right: 45px; margin-top: 20px; margin-left: 20px;margin-bottom:10px;" type="button" class="btn btn-outline-primary" href="{{ url('admin/skills-create')}}">ADD</a>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Percentage</th>
                                        <th>Is Display</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($skills as $skill)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$skill->name}}</td>
                                        <td>{{$skill->percentage}}</td>
                                        <td>{{$skill->is_display}}</td>
                                        <td>
                                            <form id="delete" name="delete" action="{{url('admin/skills-delete/'.$skill->id)}}" method="delete">
                                                @csrf
                                                <a href="{{url('admin/skills/'.$skill->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin: left 3px; ; font-size: 22px; margin-top: 3px; color: #0d6efd;"></i></a>
                                                <a href="#"><i class="fa fa-trash-o show_confirm" aria-hidden="true" style="margin-left: 3px; font-size: 22px; margin-top: px; color: red;"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end mr-2">
                                {{ $skills->links()}}
                            </div>
                            <!-- End Table with stripped rows -->
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