@extends('layouts.master')

@section('content')

<main>
  <div class="pagetitle">
    <h1>Experience</h1>
    <nav>
      <ol class="breadcrumb" style="background-color: white;">
        <li class="breadcrumb-item"><a href={{ url('admin/home') }}>Home</a></li>
        <li class="breadcrumb-item active"><a href={{ url('admin/experience') }}>Experience Manage</a></li>
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
              <a style="float: right; margin-right: 45px; margin-top: 20px; margin-left: 20px;margin-bottom:10px;" type="button" class="btn btn-outline-primary" href="{{ url('admin/experience-create')}}">ADD</a>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Joining Date</th>
                    <th>Leave Date</th>
                    <th>Description Web</th>
                    <th>Description Graphics</th>
                    <th>Is Current Job</th>
                    <th>Display Order</th>
                    <th>Is Display</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @php
                  $count=1;
                  @endphp
                  @foreach($experiences as $experience)
                  <tr>
                    <td>{{$count++}}</td>
                    <td>{{$experience->company_name}}</td>
                    <td>{{$experience->position}}</td>
                    <td>{{$experience->joining_date}}</td>
                    <td>{{$experience->leave_date}}</td>
                    <td>{{$experience->description_web}}</td>
                    <td>{{$experience->description_graphics}}</td>
                    <td>{{$experience->is_current}}</td>
                    <td>{{$experience->display_order}}</td>
                    <td>{{$experience->is_display}}</td>
                    <td>
                      <form id="delete" name="delete" action="{{url('admin/experience-delete/'.$experience->id)}}" method="delete">
                        @csrf
                        <a href="{{url('admin/experience/'.$experience->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin: left 3px; ; font-size: 22px; margin-top: 3px; color: #0d6efd;"></i></a>
                        <a href="#"><i class="fa fa-trash-o show_confirm" aria-hidden="true" style="margin-left: 3px; font-size: 22px; margin-top: px; color: red;"></i></a>

                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="pagination justify-content-end mr-2">
                {{ $experiences->links()}}
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