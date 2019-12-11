@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('uploadcsv.uploadcsv') }}" role="form"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card border-secondary mb-12">
                    <div class="card-header">Upload</div>
                    <div class="card-body text-secondary">
                    <div class="form-group">
                        <select name="type" id="type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="P">Prizes</option>
                            <option value="E">Employees</option>
                        </select>
                    </div>
                    <div class="spacer-5"></div>
                    <div class="form-group">
                        <input id="csv_file" type="file" class="form-control" name="csv_file" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type='submit'>Upload</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
