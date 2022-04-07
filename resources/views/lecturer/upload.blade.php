@extends('layouts.lecturer.leclayout')
@section($viewData['title'])
@section('content')
    <div class="card">
    <div class="row"> insert result Excel files only</div>
    <div class="row">
    <div class="col">
    <form action="{{ route('lresult.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3 row">
            <label for="res" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Result:</label>
            <div id='res' class="col-lg-10 col-md-6 col-sm-12">
                <input type="file" accept="xls,xlsx,xlsm,xlsb" name="result" class="form-control">
            </div>

        </div>
        <div class="col">
        &nbsp;
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
</div>
        </form>
      
    </div>
    </div>
@endsection