<?php
include '../models/User.php';

if (
  empty($_POST['user_id']) ||
  empty($_POST['area']) ||
  !isset($_POST['field']) || !is_array($_POST['field']) || count($_POST['field']) === 0 ||
  !isset($_POST['speciality']) || !is_array($_POST['speciality']) || count($_POST['speciality']) === 0 ||
  empty($_POST['qualify']) ||
  empty($_POST['bio'])
) {
  exit('paramError');
}
$user_id = $_POST["user_id"];
$area = $_POST["area"];
$field = implode(',', $_POST['field']);
$speciality = implode(',', $_POST['speciality']);
$qualify = $_POST["qualify"];
$bio = $_POST["bio"];

$userModel = new User();
$userModel->register($user_id, $area, $field, $speciality, $qualify, $bio);
header('Location: ../trainersHome.php');
exit();