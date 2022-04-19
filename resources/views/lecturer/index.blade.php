@extends('layouts.lecturer.leclayout')
@section($viewData['title'])
@section('content')

<div class="card-header">
    <h1> Welcome {{ Auth::user()->name }} </h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            
            <thead>
                <tr>
                    <th scope="col">sn</th>
                    <th scope="col">File Name </th>
                    <th scope="col">Upload Date </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['upload'] as $index => $file )
                
                <tr>
                    <td>{{ $index+=1 }}</td>
                    <td>{{ $file->file_name }}</td>
                    <td>{{ $file->updated_at }}</td>                    
                </tr>
                    
                @endforeach
            </tbody>
        </table>
        <div class="row">
        <span>
            {{ $viewData['upload']->links() }}
        </span>
        <style>
            .w-5{
                display: none;
            }
        </style>
        </div>
    </div>

@endsection