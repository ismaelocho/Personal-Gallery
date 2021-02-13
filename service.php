<?php
  if(isset($_FILES['image'])){
    $date = date('YmdHis');
    
    $file_name =$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $file_tmp= $_FILES['image']['tmp_name'];
    $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $extension = trim($extension);
    if($extension=='png' && $file_size<'80000000'){ /* Only PNG and 10MB max size */

      $dataimg = file_get_contents( $file_tmp );
      $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($dataimg);

      /*API endpoint*/
      # Our new data
      $data = array(
        'imageData' => base64_encode($dataimg)
      );
      # Create a connection
      $url = 'https://test.rxflodev.com';
      $ch = curl_init($url);
      # Form data string
      $postString = http_build_query($data, '', '&');
      # Setting our options
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      # Get the response
      $response = curl_exec($ch);
      curl_close($ch);
      $values = json_decode($response, true);
      setcookie("cookie[$date]", $values['url']);

      header('Location: index.php');

    }else{
      $alert = "invalid format or size";
      header('Location: index.php?alert='.$alert);
    }
  }else{
    header('Location: index.php');
  }
?>