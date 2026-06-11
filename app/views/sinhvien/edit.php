<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
</head>

<body>

    <h1>Sửa sinh viên</h1>

    <form action="/sinhvien/update" method="post">

        <label for="MSSV">MSSV:</label>
        <input
            type="text"
            id="MSSV"
            name="MSSV"
            value="<?php echo $sinhvien['MSSV']; ?>"
            readonly>
        <br><br>

        <label for="HoTen">Tên:</label>
        <input
            type="text"
            id="HoTen"
            name="HoTen"
            value="<?php echo $sinhvien['HoTen']; ?>"
            required>
        <br><br>

        <label for="GioiTinh">Giới tính:</label>
        <input
            type="text"
            id="GioiTinh"
            name="GioiTinh"
            value="<?php echo $sinhvien['GioiTinh']; ?>"
            required>
        <br><br>

        <label for="LopQL">Lớp QL:</label>
        <input
            type="text"
            id="LopQL"
            name="LopQL"
            value="<?php echo $sinhvien['LopQL']; ?>"
            required>
        <br><br>

        <input type="submit" value="Cập nhật">

        <a href="/sinhvien/index">
            <button type="button">Quay lại</button>
        </a>

    </form>

</body>

</html>