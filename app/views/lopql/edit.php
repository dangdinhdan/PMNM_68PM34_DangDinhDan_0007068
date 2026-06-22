<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Lớp QL</title>
</head>

<body>

    <h1>Sửa Lớp QL</h1>

    <form action="/lopql/update" method="post">

        <label for="MaLop">Mã Lớp:</label>
        <input
            type="text"
            id="MaLop"
            name="MaLop"
            value="<?php echo $lopql['MaLop']; ?>"
            readonly>
        <br><br>

        <label for="TenLop">Tên Lớp:</label>
        <input
            type="text"
            id="TenLop"
            name="TenLop"
            value="<?php echo $lopql['TenLop']; ?>"
            required>
        <br><br>

        <label for="GhiChu">Ghi Chú:</label>
        <input
            type="text"
            id="GhiChu"
            name="GhiChu"
            value="<?php echo $lopql['GhiChu']; ?>"
            required>
        <br><br>

        <input type="submit" value="Cập nhật">

        <a href="/lopql/index">
            <button type="button">Quay lại</button>
        </a>

    </form>

</body>

</html>