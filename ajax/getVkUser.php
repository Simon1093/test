<?php

$_POST = json_decode(file_get_contents("php://input"), true);

$link = $_POST['link'];
$vkToken = "3b2fd4d33b2fd4d33b2fd4d3563b4ad1a433b2f3b2fd4d360185680e28fddeba5cff445"; //place your own token here.

$linkParts = explode('id', $link);
$userID = $linkParts[1];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.vk.com/method/users.get?user_ids=" . $userID . "&fields=bdate,photo_max,city,verified&access_token=" . $vkToken . "&v=5.103");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$userData = json_decode($output);

$userName = $userData->response[0]->first_name;
$userLastName = $userData->response[0]->last_name;
$userPhoto = $userData->response[0]->photo_max;
$userCity = $userData->response[0]->city->title;

$dsn = "mysql:host=127.0.0.1;dbname=store";
$pdo = new PDO($dsn, 'root', '');

$statement = $pdo->prepare("INSERT INTO `vk_users`(`vk_id`, `first_name`, `last_name`, `city`, `photo`) VALUES (:vk_id, :f_name, :l_name, :city, :photo)");
$statement->execute([
    'vk_id' => $userID,
    'f_name' => $userName,
    'l_name' => $userLastName,
    'city' => $userCity,
    'photo' => $userPhoto
]);

$userInfo = [
    'first_name' => $userName,
    'last_name' => $userLastName,
    'city' => $userCity,
    'photo' => $userPhoto
];

echo json_encode($userInfo);
