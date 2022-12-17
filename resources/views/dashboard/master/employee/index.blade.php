@extends('dashboard.layout.master')
@section('title', 'Employees Data')
@section('style')
    @include('dashboard.layout.datatables')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Employees Data</h6>
                    <div class="">
                        <a href="{{route('exportemployee')}}" class="btn btn-secondary">Export</a>
                        <a href="{{route('createemployee')}}" class="btn btn-success">Create</a>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 employee_datatable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Session</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        NIP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
                                        Division</th>
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
      let table = $('.employee_datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('indexemployee') }}",
          columns: [
              {data: 'name', name: 'name'},
              {data: 'user.email', name: 'user.email'},
              {data: 'session.name', name: 'session.name'},
              {data: 'nip', name: 'nip'},
              {data: 'division', name: 'division'},
              {data: 'user.is_voted', name: 'user.is_voted'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
  </script>
@endsection
