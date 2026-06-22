<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
 
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">
                    <i class="bi bi-mortarboard-fill"></i>
                    <?= $title ?>
                </h3>

                <a href="/sinhvien/create" class="btn btn-light">
                    <i class="bi bi-plus-circle"></i>
                    Thêm sinh viên
                </a>
            </div>

            <div class="card-body">

                <table class="table table-hover table-striped table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Họ Tên</th>
                            <th>Giới Tính</th>
                            <th>Lớp QL</th>
                            <th width="180">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($sinhviens as $index => $sinhvien): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>

                                <td><?= $sinhvien['MSSV'] ?></td>

                                <td class="text-start">
                                    <?= $sinhvien['HoTen'] ?>
                                </td>

                                <td>
                                    <?php if ($sinhvien['GioiTinh'] == 'Nam'): ?>
                                        <span class="badge bg-primary">Nam</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Nữ</span>
                                    <?php endif; ?>
                                </td>

                                <td><?= $sinhvien['MaLop'] ?></td>

                                <td>
                                    <a href="/sinhvien/edit/<?= $sinhvien['MSSV'] ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        Sửa
                                    </a>

                                    <a href="/sinhvien/delete/<?= $sinhvien['MSSV'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                                        <i class="bi bi-trash"></i>
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

                <!-- Phân trang -->
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">

                            <?php
                            $pageSize = 5;
                            for ($i = 1; $i <= $totalPages; $i++):
                                $offset = ($i - 1) * $pageSize;
                            ?>

                                <li class="page-item">
                                    <a class="page-link"
                                        href="/sinhvien/index/<?= $pageSize ?>/<?= $offset ?>">
                                        <?= $i ?>
                                    </a>
                                </li>

                            <?php endfor; ?>

                        </ul>
                    </nav>
                </div>

            </div>
        </div>

    </div>

</body>


</html>