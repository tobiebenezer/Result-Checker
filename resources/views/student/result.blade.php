@extends('layouts.students.stulayout')
@section($viewData['title'])
@section('content')
<div class="card-header">
     Your Result {{ Auth::user()->name }} {{ $viewData['mat_no'] }}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            
            <thead>
                <tr>
                    <th scope="col">sn</th>
                    <th scope="col">Course Title </th>
                    <th scope="col">Grade</th>
                    <th scope="col">Session</th>
                    <th scope="col">Level</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['results'] as $index => $result )
                
                <tr>
                    <td>{{ $index+=1 }}</td>
                    <td>{{ $result->course_name }}</td>
                    <td>{{ $result->grade }}</td>
                    <td>{{ $result->session}}</td>
                    <td> {{$result->level}}</td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
@endsection