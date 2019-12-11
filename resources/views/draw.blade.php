@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('drawwinners') }}" role="form"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card border-secondary mb-12">
                    <div class="card-header">Draw</div>
                    <div class="card-body text-secondary">
                    <div class="form-group">
                        <select name="type" id="type" class="form-control" required>
                            <option value="">Select Prize</option>
                            @foreach($prizes as $prize)
                                <option value="{{$prize->id}}">{{ $prize->prize }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="spacer-5"></div>
                    <div class="form-group">
                        <input id="no_of_winners" type="number" class="form-control" name="no_of_winners" min='1' max='40' placeholder="Enter No. of Winners" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type='submit'>Draw</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
