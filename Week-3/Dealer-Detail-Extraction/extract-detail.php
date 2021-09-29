<?php

//if php version is less than 8, ignore error shown by editor otherwise delete str_contains function definition
function str_contains(string $haystack, string $needle): bool
{
    return '' === $needle || false !== strpos($haystack, $needle);
}

function containsHtmlEntity($str)
{
    $entities = array('&nbsp;','&apos;');
    foreach ($entities as $entity)
    {
        if (str_contains($str, $entity))
        {
            
            return true;
        }
    }
    return false;
}
function convertHtmlEntityToCharacter($str)
{
    
    $converted_string = html_entity_decode($str, ENT_QUOTES | ENT_HTML5);
    return $converted_string;
}

function createCsvWithHeader($headers)
{
    $fh = fopen("dealers_detail.csv","w");
    fputcsv($fh,$headers);
    fclose($fh);
}

function insertDatasToCSV($datas)
{
    $fd = fopen("dealers_detail.csv","a+");
    foreach ($datas as $fields)
    {
        fputcsv($fd,$fields);
    }
    fclose($fd);
}

function writeJsonToFile($json)
{
    if (file_put_contents("dealers_detail.json", $json))
    echo "JSON file created successfully...";
    else 
    echo "Oops! Error creating json file...";

}

$url = "https://godfreysfeed.com/dealersandlocations";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "authority: godfreysfeed.com",
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
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
// var_dump($resp);

//*****Name*****
$name_pattern = '/\#e5011c\;\'\>([A-Za-z\s\W]*)\<\/span>/m';
preg_match_all($name_pattern, $resp, $name_matches);
$name = $name_matches[1];
$temp_array = array();
foreach ($name as $n)
{
    if (containsHtmlEntity($n))
    {
        $temp_array[] = convertHtmlEntityToCharacter($n);
    }
    else
    {
        $temp_array[]=$n;
    }
}
$name = $temp_array;
// print_r($name_matches[1]);
// die;


//*****Address*****
$address_pattern = '/myClick.{1,}\<strong\>([\w\d\s\.]*)\<\/strong\>\<br\>\<s/m';
preg_match_all($address_pattern, $resp, $address_matches);
$address = $address_matches[1];
// print_r($address_matches[1]);
// die;

//*****City*****
$city_pattern = '/myClick.{1,}<strong>([a-zA-Z\s]*)\,/m';
preg_match_all($city_pattern, $resp, $city_matches);
$city = $city_matches[1];
// print_r($city_matches[1]);
// die;

//*****State*****
$state_pattern = '/myClick.{1,}<strong>[a-zA-Z\s]*\,\s([A-Z]*)/m';
preg_match_all($state_pattern, $resp, $state_matches);
$state = $state_matches[1];
// print_r($state_matches[1]);
// die;

//*****Zip*****
$zip_pattern = '/myClick.{1,}<strong>([\d]*)/m';
preg_match_all($zip_pattern, $resp, $zip_matches);
$zip = $zip_matches[1];
// print_r($zip_matches[1]);
// die;

//*****Latitude*****

// $latitude_pattern = '/LatLng\(([\d.]*),/m';
// preg_match_all($latitude_pattern, $resp, $latitude_matches);
// array_shift($latitude_matches[1]);

$latitude_pattern = '/var\slatLng.{1,}LatLng\(([\d.]*)\,/m';
preg_match_all($latitude_pattern, $resp, $latitude_matches);
$latitude = $latitude_matches[1];
// print_r($latitude_matches[1]);
// die;

//*****Longitude*****

// $longitude_pattern = '/LatLng\([\d.]*\,\s([-\d.]*)\);/m';
// preg_match_all($longitude_pattern, $resp, $longitude_matches);
// array_shift($longitude_matches[1]);

$longitude_pattern = '/var\slatLng.{1,}LatLng\([\d.]*\,\s([-\d.]*)\)/m';
preg_match_all($longitude_pattern, $resp, $longitude_matches);
$longitude = $longitude_matches[1];
// print_r($longitude_matches[1]);
// die;

//Writing to CSV file
$csv_headers = array("Name","Address","City","State", "Zip-Code", "Latitude", "Longitude");

createCsvWithHeader($csv_headers);

$detail = array();
$upper_limit = count($name);

for ($i=0;$i<$upper_limit;$i++)
{
    $detail[] = array(
                        "name"=>trim($name[$i]),
                        "address"=>trim($address[$i]),
                        "city"=>trim($city[$i]),
                        "state"=>trim($state[$i]),
                        "zip"=>trim($zip[$i]),
                        "latitude"=>trim($latitude[$i]),
                        "longitude"=>trim($longitude[$i])
    ); 
}

insertDatasToCSV($detail);

$detail_json = json_encode($detail);

writeJsonToFile($detail_json);

?>

