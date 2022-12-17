@extends('dashboard.layout.master')
@section('title', 'Students Data')
@section('style')
    @include('dashboard.layout.datatables')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Students Data</h6>
                    <div class="">
                        <a href="{{route('exportstudent')}}" class="btn btn-secondary">Export</a>
                        <a href="{{route('createstudent')}}" class="btn btn-success">Create</a>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 student_datatable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Session</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        NIS</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        NISN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        IS VOTED</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
      let table = $('.student_datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('indexstudent') }}",
          columns: [
              {data: 'name', name: 'name'},
              {data: 'user.email', name: 'user.email'},
              {data: 'session.name', name: 'session.name'},
              {data: 'nis', name: 'nis'},
              {data: 'nisn', name: 'nisn'},
              {data: 'user.is_voted', name: 'user.is_voted'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
  </script>
@endsection
