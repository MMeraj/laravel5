@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Insert Detail</h1>
    
{{Session::get('message')}}
{!! Form::open(array('url'=>'save_detail','class' => 'form','enctype'=>'multipart/form-data')) !!}

<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your e-mail address')) !!}
</div>


<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your message')) !!}
</div>
<div class="form-group">
    {!! Form::label('Upload image') !!}
    <input type='file' name="filefield">
</div>

<div class="form-group">
    {!! Form::submit('Add Detail!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>
@endsection
