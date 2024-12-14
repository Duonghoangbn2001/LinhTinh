<?php
$curl = curl_init();

$url = 'https://vtvgo.vn/ajax-get-stream';

// Dữ liệu POST
$data = [
    'type_id' => '1',
    'id' => '2',
    'time' => '1734169155',
    'token' => '1734169155.f7edd0c968483a50b4c98e10a131a83f'
];

// Headers
$headers = [
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
    'Accept-Encoding: gzip, deflate, br, zstd',
    'sec-ch-ua-platform: "Windows"',
    'x-requested-with: XMLHttpRequest',
    'sec-ch-ua: "Google Chrome";v="131", "Chromium";v="131", "Not_A Brand";v="24"',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'sec-ch-ua-mobile: ?0',
    'origin: https://vtvgo.vn',
    'sec-fetch-site: same-origin',
    'sec-fetch-mode: cors',
    'sec-fetch-dest: empty',
    'referer: https://vtvgo.vn/xem-truc-tuyen-kenh.html',
    'accept-language: vi,en-GB;q=0.9,en;q=0.8',
    'priority: u=1, i',
    'Cookie: ci_session=fe726numcm6uu8t5mkrotitle549n6mi; AWSALBAPP-1=_remove_; AWSALBAPP-2=_remove_; AWSALBAPP-3=_remove_; aws-waf-token=e52dc565-c069-411c-9afe-4cc666200265:BgoAtzxDSvkmAAAA:nGeyAa/UL/DqVtvLzwVGaROdvkm9undSSIZVikRopSuRg2qm5+hfmIf9DR37ZPOeg5h5DkP1Y2vWcNlFAjMkTAYb0AewjnoqzFpojh64rZmVxegUyIlqQxIDWTZ4ZKyXDl8QIsSBMKHgvLahoRaQ0ziV5lTV9T1nuCTD/P8ERggS/TO4s9qp+MCLfw==; _pk_ses.562926744.e9e4=*; _ac_au_gt=1734169127345; cdp_session=1; _asm_uid=4394187592; _ga=GA1.1.542568179.1734169132; _ac_client_id=4394179751.1734169130; au_id=4394179751; _asm_visitor_type=r; fb_url=http%3A%2F%2Fvtvgo.vn%2Fxem-truc-tuyen-kenh-vtv1-1.html; _pk_id.562926744.e9e4=4394179751.1734169130.1.1734169148.1734169130.; _ac_an_session=zgzqzlzmzjzgzqznzizrzdzjzdzizkzgznzizlzqziznzmzdzizdzizkzgznzizlzqziznzmzdzizkzgznzizlzqziznzmzdzizdzmzlzdzgzd2f27zdzgzdzlzmzlzkzjzd; _ga_1W5GJ0W084=GS1.1.1734169132.1.1.1734169157.0.0.0; AWSALBAPP-0=AAAAAAAAAACYLNSFn+04YgHIlRed/5Hb7mgluL091EnSBX6lFYKkmCzIkjyNVootIUW2J9/Ca9PyQwBCjlf4eEL29Vg3CfGPBP5+hibeZHzph4zwyLkIgIoDaZhKDfS7cyuPwNz8yaCfvW4='
];

// Cấu hình cURL
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($data),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_ENCODING => "", // Hỗ trợ gzip, deflate, br, zstd
]);

// Thực thi cURL
$response = curl_exec($curl);

// Kiểm tra lỗi
if (curl_errno($curl)) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    // Giải mã JSON và lấy "stream_url"
    $decodedResponse = json_decode($response, true);
    if (isset($decodedResponse['stream_url'])) {
        echo json_encode($decodedResponse['stream_url'], JSON_PRETTY_PRINT);
    } else {
        echo "Key 'stream_url' không tồn tại trong phản hồi.";
    }
}

// Đóng cURL
curl_close($curl);
?>
