<?php
include 'header.php';
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>QUẢN LÝ LOẠI PHÒNG</h2>
        </div>
        <?php
        if (isset($_SESSION['success'])) :

        ?>
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $_SESSION['success'] ?>
            </div>

        <?php
        endif;
        ?>

        <?php
        if (isset($_SESSION['error'])) :
        ?>
            <div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $_SESSION['error'] ?>
            </div>

        <?php
        endif;
        ?>

        <?php
        $sql = "SELECT * FROM loaiphong";
        $result = $conn->query($sql);


        ?>


        <!-- Content -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH LOẠI PHÒNG
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Số người</th>
                                        <th>Diện tích (m2)</th>
                                        <th>Giá (VNĐ)</th>
                                        <th>Khu trọ</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    if ($result->num_rows > 0) :

                                        while ($row = $result->fetch_assoc()) :
                                            $idkt = $row['idkt'];
                                            $sql1 = "SELECT * FROM khutro WHERE idkt=$idkt";
                                            $result1 = $conn->query($sql1);
                                            if ($result1->num_rows > 0) :
                                                $row1 = $result1->fetch_assoc();
                                    ?>
                                                <tr>
                                                    <td><?= $row['idlp'] ?></td>
                                                    <td><?= $row['tenlp'] ?></td>
                                                    <td><?= $row['songuoi'] ?></td>
                                                    <td><?= number_format($row['dientich'])  ?></td>
                                                    <td><?= number_format($row['gia']) ?></td>
                                                    <td><?= $row1['tenkt'] ?></td>
                                                    <td>
                                                        <a href="loaiphong-sua.php?idlp=<?= $row['idlp'] ?>" type="button" class="btn btn-info waves-effect btn-block">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                    </td>
                                                </tr>

                                    <?php
                                            endif;
                                        endwhile;
                                    endif;
                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Content -->

    </div>
</section>


<?php
include 'footer.php';
?>