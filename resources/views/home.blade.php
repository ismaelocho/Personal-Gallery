  
@extends('layouts.app')

@section('pageTitle', 'Personal Gallery')

@section('content')
<div class="topnav">
      <h2>Personal Gallery</h2>
    
    </div>

    <div class="content">
      <p>Personal gallery for PNG images only. <br> <em>Max 10Mb</em></p>
      <?php
      if( isset($_GET['alert']) ){
          echo "<p class='alert'>".$_GET['alert']."</p>";
      }?>
      <form method="post" enctype="multipart/form-data" action="image" >
        {{csrf_field()}}
        <input type="file" name="image" accept="image/x-png" /><br />
        <input type="submit" class="button" value="Upload" />
      </form>
    </div>

    <div class="gallery">
    @if (is_array(\Session::get('gallery')) || is_object(\Session::get('gallery')))
        <?php 
        foreach (\Session::get('gallery') as $clave => $valor){
            foreach ($valor as $data => $val){
                $arrsort[$data] = $val;
            }
        }
        rsort($arrsort);
        foreach ($arrsort as $name => $value) {
            $name = htmlspecialchars($name);
            $value = htmlspecialchars($value);
            echo "<img src='".$value."' title='".$name."'>";
        }
        ?>
    @endif
</div>
@endsection