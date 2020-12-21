@extends('base')

@section('content')

@include('info')

<div class="float-right">
<a href="{{url('courses/create')}}" class="btn btn-primary">Add Course</a>
</div>

<h1>Courses</h1>
<table class="table table-bordered table-striped table-sm">
    <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Start</th>
            <th>End</th>
            <th>Instructor</th>
            <th>&nbsp;</th>

        </thead>

    <tbody>
    @foreach($courses as $c)

    <tr>

            <td>{{$c->name}}</td>
            <td>{{$c->description}}</td>
            <td>{{$c->start}}</td>
            <td>{{$c->end}}</td>
            <td>{{$c->instructor->user->lname}}</td>
            <td class="text-center">
                    <a href="{{url('/courses/edit', ['id'=>$c])}}" class="btn btn-info btn-sm">Edit</a>
            </td>
    
    

    </tr>

    @endforeach
         </tbody>
</table>

@endsection
