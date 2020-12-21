@extends('base')

@section('content')

@include('info')

<div class="float-right">
        <a href="{{url('/instructors/create')}}" class="btn btn-primary">
                Add New Instructor
        </a>
</div>

<h1>List of Instructors</h1>
<table class="table table-bordered table-striped table-sm">
    <thead class="thead-dark white-text">

            <th>ID#</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Expertise</th>
            <th>&nbsp;</th>

    </thead>

    <tbody>
    @foreach($instructors as $i)

    <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->user->lname}}</td>
            <td>{{$i->user->fname}}</td>
            <td>{{$i->aoe}}</td>
            <td class="text-center"> 
    <a href="{{url('/instructors/edit',['id'=>$i])}}" class="btn btn-info btn-sm">
    
                Edit
        </a>
    </td>

    </tr>

    @endforeach
    </tbody>
</table>
@stop
