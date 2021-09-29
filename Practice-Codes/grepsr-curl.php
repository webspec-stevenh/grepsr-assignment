<?php

$url = "https://www.grepsr.com/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "authority: www.grepsr.com",
   "upgrade-insecure-requests: 1",
   "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36",
   "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
   "sec-fetch-site: none",
   "sec-fetch-mode: navigate",
   "sec-fetch-user: ?1",
   "sec-fetch-dest: document",
   "sec-ch-ua: 'Google Chrome';v='93', ' Not;A Brand';v='99', 'Chromium';v='93'",
   "sec-ch-ua-mobile: ?0",
   "sec-ch-ua-platform: 'Linux'",
   "accept-language: en-US,en;q=0.9,ne-NP;q=0.8,ne;q=0.7,fr-FR;q=0.6,fr;q=0.5",
   "cookie: _wpfuuid=47b377f1-66fe-49db-9272-ff34775aa022; _hjid=999f2424-dac2-47ca-8234-e28bef9ae3f4; ajs_anonymous_id=73d62236-4dab-46a5-8768-3f351c93deb6; _uetvid=60a030a01a0311ec89fc0d95c24d0030; _ga=GA1.2.923424279.1632136235; _gcl_au=1.1.11805138.1632136235; mp_e3f64d8611dba42828355d6b96f5fc58_mixpanel=%7B%22distinct_id%22%3A%20%2217c02e68a07757-0db5af11e66e7d-23732444-73538-17c02e68a085ca%22%2C%22%24device_id%22%3A%20%2217c02e68a07757-0db5af11e66e7d-23732444-73538-17c02e68a085ca%22%2C%22mp_lib%22%3A%20%22Segment%3A%20web%22%2C%22%24initial_referrer%22%3A%20%22%24direct%22%2C%22%24initial_referring_domain%22%3A%20%22%24direct%22%7D; __hstc=130404944.862c6038e82616d33d43f37165837a12.1632136239825.1632136239825.1632136239825.1; hubspotutk=862c6038e82616d33d43f37165837a12",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>

