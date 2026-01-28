<?php
include 'models/User.php';

if (
  !isset($_POST['user_id']) || $_POST['user_id'] === '' ||
  !isset($_POST['area']) || $_POST['area'] === '' ||
  !isset($_POST['field']) || $_POST['field'] === '' ||
  !isset($_POST['speciality']) || $_POST['speciality'] === '' ||
  !isset($_POST['qualify']) || $_POST['qualify'] === '' ||
  !isset($_POST['bio']) || $_POST['bio'] === '' 
) {
  exit('paramError');
}

$user_id = $_POST["user_id"];
$area = $_POST["area"];
$field = $_POST["field"];
$speciality = $_POST["speciality"];
$qualify = $_POST["qualify"];
$bio = $_POST["bio"];

$userModel = new User();
$userModel->create($user_id, $area, $field, $speciality, $qualify, $bio);

header('Location: index.php');