<?php
// session_start()
if(isset($model->title) && $model->title != null) {
  $title = $model->title;
}
else {
  $title = "Haarlem";
}
if(isset($model->body) && $model->body != null) {
    $body = $model->body;
  }
  else {
    $body = "";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?= include 'history.css'; ?>
    </style>
</head>

<body>
    <?php include '../views/shareditems/nav/nav.php' ?>
    <?php echo $body;?>
    <?php include '../views/shareditems/footer/footer.php' ?>

</body>

</html>