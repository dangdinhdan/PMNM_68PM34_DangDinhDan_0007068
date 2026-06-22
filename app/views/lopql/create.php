<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tạo Lớp QL</title>
</head>

<body>
  <h1>Tạo Lớp QL</h1>
  <form action="/lopql/store" method="post">
    <label for="MaLop">Mã Lớp:</label>
    <input type="text" id="MaLop" name="MaLop" required><br><br>

    <label for="TenLop">Tên Lớp:</label>
    <input type="text" id="TenLop" name="TenLop" required><br><br>

    <label for="GhiChu">Ghi chú:</label>
    <input type="text" id="GhiChu" name="GhiChu" required><br><br>
    <input type="submit" value="Tạo">
  </form>
</body>

</html>