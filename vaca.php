<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

// NOTE: You must use the same location in your REST call as you used to obtain your subscription keys.
//   For example, if you obtained your subscription keys from westus, replace "westcentralus" in the 
//   URL below with "westus".
$request = new Http_Request2("https://southcentralus.api.cognitive.microsoft.com/customvision/v1.0/Prediction/9ce6ed6b-c258-48e3-bcdf-fbb6312a95f4/url");
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'application/json',

    // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
    'Prediction-Key' => '0654bf726283478b85de7ad09a998aa2',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'visualFeatures' => 'Categories',
    'details' => '{string}',
    'language' => 'en',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

//	Request body
	$request->setBody("{\"Url\": \"https://i.ytimg.com/vi/Xf5MeDHk6Ng/hqdefault.jpg\"}");  // Replace with the body, for example, "{"url": "http://www.example.com/images/image.jpg"}

try {
    $response = $request->send();
    echo $response->getBody();
} catch (HttpException $ex) {
    echo $ex;
}

?>
