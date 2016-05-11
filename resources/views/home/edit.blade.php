@extends('layouts.app')
@section('content')
<div class="container">
<h1>Edit Detail</h1>
    

{!! Form::open(array('url'=>'update_detail','class' => 'form')) !!}

@foreach($data as $edit)

<div class="form-group">
    <label for="Your Name">Your Name</label>
    <input required="required" class="form-control" placeholder="Your name" name="name" type="text" value="{{$edit->name}}">
    <input required="required" class="form-control" placeholder="Your name" name="id" type="hidden" value="{{$edit->id}}">
</div>

<div class="form-group">
    <label for="Your E-mail Address">Your E-mail Address</label>
    <input required="required" class="form-control" placeholder="Your e-mail address" name="email" type="text" value="{{$edit->email}}">
</div>

<div class="form-group">
    <label for="Your Message">Your Message</label>
    <textarea required="required" class="form-control" placeholder="Your message" name="message"  cols="50" rows="10">{{$edit->message}}</textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Update!">
</div>
@endforeach;
{!! Form::close() !!}
</div>
@endsection