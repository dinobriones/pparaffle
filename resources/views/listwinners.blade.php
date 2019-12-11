@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
            <form action="{{ route('uploadcsv.uploadcsv') }}" role="form"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card border-secondary mb-12">
                    <div class="card-header">PPA Raffle 2019 (List of Winners)</div>
                    <div class="card-body text-secondary">
                    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Department</th>
      <th scope="col">Prize</th>
    </tr>
  </thead>
  <tbody>
  @php($ctr = 1)
  @foreach($winners as $winner)
  <tr>
    <td>{{ $ctr }}</td>
    <td> {{ $winner->employee->name }}</td>
    <td> {{ $winner->employee->department }}</td>
    <td> {{ $winner->prize->prize }}</td>
  </tr>
  @php($ctr++)
  @endforeach
  </tbody>
</table>
                    </div>
                    <div class="row align-items-center justify-content-center">         
<div class="text-center" >
  {!! $winners->appends(request()->input())->links(); !!}
</div>
</div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
