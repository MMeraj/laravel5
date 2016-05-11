
@extends('layouts.app')
@section('content')


<div class="container">
<table class="table">
    <tr style="background-color:#eeeeee ">
        <td style="width:15%">Name</td>
        <td style="width:15%">Email</td>
        <td style="width:50%;">Message</td>
        <td>Action</td>
    </tr>
 @foreach($results as $result)
   <tr>
       <td>{{ $result->name }}</td>
       <td>{{ $result->email }}</td>
       <td>{{ $result->message }}</td>
       <td><a href="{{URL::to('/edit',$result->id)}}">Edit</a> / <a href="{{URL::to('/delete',$result->id)}}" onclick="return Confirm();">Delete</a></td>
    </tr>    
    @endforeach
  </table>
    {!! $results->links() !!}
    
<a href="{{URL::to('/home')}}"><button class="btn btn-warning btn-lg">Add new Data</button></a>
</div>
 <h1> Pictures list</h1>
<div class="row">
 
    <ul>
@foreach($entries as $entry)
<div class="col-md-2">
                <div class="thumbnail">
                    <a href="{{route('downimage', $entry->filename)}}"><img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" /></a>
                    <div class="caption">
        <li>{{$entry->original_filename}}</li>
        </div>
                </div>
            </div>
@endforeach
    </ul>
</div>
@endsection

