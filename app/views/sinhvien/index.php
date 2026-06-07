<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
 
</head>

<body>
  <h1><?php echo $title; ?></h1>
  <table >
    <tr>
      <th>STT</th>
      <th>Mssv</th>
      <th>Họ Tên</th>
      <th>Giới tính</th>
      <th>Lớp QL</th>
    </tr>
    <?php foreach ($sinhviens as $index => $sinhvien): ?>
      <tr>
        <th><?php echo $index +1; ?></th>
        <th><?php echo $sinhvien['MSSV']; ?></th>
        <th><?php echo $sinhvien['HoTen']; ?></th>
        <th><?php echo $sinhvien['GioiTinh']; ?></th>
        <th><?php echo $sinhvien['LopQL']; ?></th>
      </tr>
      <?php endforeach; ?>
  </table>
</body>

</html>