<?php

$url = "https://reqbin.com/curl";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "authority: reqbin.com",
   "cache-control: max-age=0",
   "sec-ch-ua: 'Google Chrome';v='93', ' Not;A Brand';v='99', 'Chromium';v='93'",
   "sec-ch-ua-mobile: ?0",
   "sec-ch-ua-platform: 'Linux'",
   "upgrade-insecure-requests: 1",
   "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36",
   "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
   "sec-fetch-site: none",
   "sec-fetch-mode: navigate",
   "sec-fetch-user: ?1",
   "sec-fetch-dest: document",
   "accept-language: en-US,en;q=0.9,ne-NP;q=0.8,ne;q=0.7,fr-FR;q=0.6,fr;q=0.5",
   "cookie: editKey=8LqdLwjd; _ga=GA1.2.1150994740.1632381494; _gid=GA1.2.1195257441.1632381494; amplitude_id_a4d78f063e8040076d94cfe0c0688c5dreqbin.com=eyJkZXZpY2VJZCI6IjE2MmE2MTA4LTYyOTQtNDEwOC1hYWNmLWZhOWYxZDkxZmRhYVIiLCJ1c2VySWQiOm51bGwsIm9wdE91dCI6ZmFsc2UsInNlc3Npb25JZCI6MTYzMjQ1MDYyOTgzMiwibGFzdEV2ZW50VGltZSI6MTYzMjQ1MDcxMDQ1MywiZXZlbnRJZCI6NiwiaWRlbnRpZnlJZCI6MCwic2VxdWVuY2VOdW1iZXIiOjZ9",
   "if-modified-since: Thu, 23 Sep 2021 05:37:19 GMT",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>
