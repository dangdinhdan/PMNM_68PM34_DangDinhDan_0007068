<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .content {
      width: 60%;
      margin: auto;
    }
  </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<body>
  <div>
    <?php require_once '../app/views/layout/partial/header.php'; ?>
  </div>
  <div class="content">
    <?php require_once '../app/views/' . $viewname . '.php'; ?>
  </div>
  <div>
    <?php require_once '../app/views/layout/partial/footer.php'; ?>
  </div>
</body>

</html>