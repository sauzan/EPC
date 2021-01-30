<?php

    $headers = array(
        'Accept:application/json',
        'Authorization: Basic cnNhdXphbkBnbWFpbC5jb206OThjZDNmZmYxZTI4YmM4ODA0NjQxNmIxZjNiODMxNDk0OTc0MjRjNg=='
     );

    $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


    $season_data = curl_exec($ch);
    if (curl_errno($ch)) {
        print "Error: " . curl_error($ch);
        exit();
    }
    curl_close($ch);
    $json= json_decode($season_data, true);
?>
