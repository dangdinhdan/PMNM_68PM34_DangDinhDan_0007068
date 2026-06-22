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

                <a href="/lopql/create" class="btn btn-light">
                    <i class="bi bi-plus-circle"></i>
                    Thêm lớp quản lý
                </a>
            </div>

            <div class="card-body">

                <table class="table table-hover table-striped table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Mã Lớp</th>
                            <th>Tên Lớp</th>
                            <th>Ghi chú</th>
                            <th width="180">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($lopqls as $index => $lopql): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>

                                <td><?= $lopql['MaLop'] ?></td>

                                <td class="text-start">
                                    <?= $lopql['TenLop'] ?>
                                </td>

                                <td><?= $lopql['GhiChu'] ?></td>

                                <td>
                                    <a href="/lopql/edit/<?= $lopql['id'] ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        Sửa
                                    </a>

                                    <a href="/lopql/delete/<?= $lopql['MaLop'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa lớp quản lý này?')">
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
                                        href="/lopql/index/<?= $pageSize ?>/<?= $offset ?>">
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