<?php


$ch = curl_init();

$data = array('file_id' => '174283d5-6161-4ea3-8735-93afc1f90c94', 'recipients' => '+33767700847');

$headers = [
    "Authorization: App pub-533278fa1c8055ca13d216348907a8cd-496efc19-8a6e-41d9-94a1-36b54fcc8748",
    "Content-Type: multipart/form-data;"
];

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.smsbox.net/vmm/1.0/xml/send?recipients=[MSISDNs]&file_id=[file_id]",
    CURLOPT_HTTPHEADER => $headers, 
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data,
]);
$finalData = curl_exec($ch);
        var_dump($finalData);

        curl_close($ch);

