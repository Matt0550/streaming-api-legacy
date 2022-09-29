<?php
/*
Copyright ©Matt05 Dev
Github: @Matt0550
Website: https://matt05.ml
*/

header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Allow: GET'); 

function getHTML($url,$timeout) {
    $gs = curl_init($url); // initialize curl with given url
    curl_setopt($gs, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'); // set useragent
    curl_setopt($gs, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
    curl_setopt($gs, CURLOPT_FOLLOWLOCATION, true); // follow redirects
    curl_setopt($gs, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds
    curl_setopt($gs, CURLOPT_FAILONERROR, 1); // stop if an error is encountered
    return @curl_exec($gs);
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    if(isset($_GET['website'])) {
        $website = $_GET['website'];
    
        if ($website == "eurostreaming") {
            $html = getHTML("https://www.eurostreaming-nuovo-indirizzo.online/", 5);
            $whatIWant = substr($html, strpos($html, "https://eurostreaming."));
            $url = substr($whatIWant, 0, strpos($whatIWant, '/"'));
            if($url == "") {
                http_response_code(404);
                $data = ['status' => "error", 'message' => 'URL not found!', 'code' => 404];
            } else {
                http_response_code(200);
                $data = ['message' => $url, 'status' => "success", 'code' => 200];
            }

        } else if ($website == "altadefinizione") {
            $html = getHTML("https://altadefinizione.nuovo.live/", 5);

            $whatIWant = substr($html, strpos($html, 'elementor-heading-title elementor-size-default'));
            // Get href from the string
            $url = substr($whatIWant, strpos($whatIWant, 'href="') + 6);
            // Get the URL
            $url = substr($url, 0, strpos($url, '"'));

            if($url == "") {
                http_response_code(404);
                $data = ['status' => "error", 'message' => 'URL not found!', 'code' => 404];
            } else {
                http_response_code(200);
                $data = ['message' => $url, 'status' => "success", 'code' => 200];
            }
        } else if ($website == "cb01") {
            $html = getHTML("https://t.me/s/cb01_nuovo_indirizzo_ufficiale/", 5);

            $whatIWant = substr($html, strpos($html, '<a href="https://cb01.'));
            // Get href from the string start with https://cb01.
            $url = substr($whatIWant, strpos($whatIWant, 'https://cb01.') + 0);
            // Get the URL
            $url = substr($url, 0, strpos($url, '"'));

            if($url == "") {
                http_response_code(404);
                $data = ['status' => "error", 'message' => 'URL not found!', 'code' => 404];
            } else {
                http_response_code(200);
                $data = ['message' => $url, 'status' => "success", 'code' => 200];
            }

        
        } else {
            http_response_code(404);
            $data = ['status' => "error", 'message' => 'Website not valid or not found', 'code' => 404];
        }
    
    } else {
        http_response_code(404);
        $data = ['status' => "error", 'message' => 'Website not valid or not found', 'code' => 404];
    }

} else {    
    http_response_code(405);
    $data = ['status' => "error", 'message' => "HTTP/1.1 405 Method Not Allowed", 'code' => 405];
}

echo json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>