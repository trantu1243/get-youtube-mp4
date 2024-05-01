<?php

$url = $_GET['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://9convert.com/api/ajaxSearch/index');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Origin: https://9convert.com',
    'Referer: https://9convert.com/en429',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0',
    'X-Requested-With: XMLHttpRequest',
    'sec-ch-ua: "Chromium";v="124", "Microsoft Edge";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
]);
curl_setopt($ch, CURLOPT_COOKIE, '_gid=GA1.2.730669696.1714488914; _gat_gtag_UA_190201966_1=1; _ga_YL2JCJ14WT=GS1.1.1714551683.2.1.1714555030.0.0.0; _ga=GA1.1.942212281.1714488914');
curl_setopt($ch, CURLOPT_POSTFIELDS, "query=$url?v=rCce7GGfuFI&vt=home");

$response = curl_exec($ch);

$data = json_decode($response, true);

$vid = $data['vid'];

$mp4_links = $data['links']['mp4'];

$first_element = reset($mp4_links);

$k = urlencode($first_element['k']);

curl_close($ch);

//

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://9convert.com/api/ajaxConvert/convert');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Origin: https://9convert.com',
    'Referer: https://9convert.com/en429',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0',
    'X-Requested-With: XMLHttpRequest',
    'sec-ch-ua: "Chromium";v="124", "Microsoft Edge";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
]);
curl_setopt($ch, CURLOPT_COOKIE, '_gid=GA1.2.730669696.1714488914; _ga_YL2JCJ14WT=GS1.1.1714551683.2.1.1714555030.0.0.0; _ga=GA1.1.942212281.1714488914');
curl_setopt($ch, CURLOPT_POSTFIELDS, "vid=$vid&k=$k");

$response = curl_exec($ch);

$result = json_decode($response, true);

echo $response;

if ($result['status'] == 'ok') {
    echo $result['dlink'];
} else echo $result;

curl_close($ch);
