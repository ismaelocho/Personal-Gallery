  
@extends('layouts.app')

@section('pageTitle', 'Personal Gallery | Error')

@section('content')
<div class="topnav">
      <h2>Personal Gallery</h2>
    
    </div>

    <div class="content">
          <h2 class='alert'>{{ $alert }}</h2>
          <p>You can only upload images in PNG format and with a maximum of 10Mb</p>
          <p>
              <a href="/">Try again/Back</a>
          </p>
    </div>


@endsection