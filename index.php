<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://laravel-recipe-api.herokuapp.com/api/recipes",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json'
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err){
    echo "curl error #:" . $err;
} else {
  $json =  json_decode($response);
  //print_r($json);
}

?>

<div class="recipe-wrapper">
   <?php
   foreach ($json as $data => $key){
       foreach ($key as $item => $value){ ?>
          <div class="show-wrapper">
              <h3><?php echo $value->title?></h3>
              <img src="<?php echo $value->imageUrl?>">
              <a href="">Read more</a>
          </div>
      <?php }
   } 

   ?>
</div>

