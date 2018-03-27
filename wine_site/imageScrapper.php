<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.reddit.com/r/earthporn/hot.json?limit=100", // Thanks Sam!
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_USERAGENT =>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 264e0b5d-cd1e-6e0b-2b75-3a2686166b8d"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data_array = json_decode($response,true);
}


foreach($data_array['data']['children'] as $key => $image)
{	
	$basename = basename($image['data']['url']);
	if(in_array(substr ($basename,-3),['jpg','png']))
	{
		$imageName =  $image['data']['name'];
		$thumbUrl = $image['data']['thumbnail'];
		$file = file_get_contents($image['data']['url']);
		$imageFile = file_put_contents(__DIR__."/earth_images/"."$imageName".'.'.substr($basename,-3),$file);
		$thumbfilecontents = file_get_contents($thumbUrl);
		$thumbnailFile = file_put_contents(__DIR__."/earth_thumbnails"."$imageName".'.jpg',$thumbfilecontents);
	}else{
		$url = rtrim($image['data']['url'],'/');
		$url = $url.'.jpg';
		$imageName =  $image['data']['name'];
		$thumbUrl = $image['data']['thumbnail'];
		$file = file_get_contents($url);
		$imageFolder = file_put_contents(__DIR__."/earth_images/"."$imageName".'.jpg',$file);
		$thumbfilecontents = file_get_contents($thumbUrl);
		$thumbnailFile = file_put_contents(__DIR__."/earth_thumbnails/"."$imageName".'.jpg',$thumbfilecontents);
	}
}
