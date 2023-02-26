<?php
include 'header.php';
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>QUẢN LÝ KHU TRỌ</h2>
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

        <!-- Content -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH KHU TRỌ
                        </h2>
                    </div>
                    <div class="body">


                        <?php
                        if ($_SESSION['role'] == 1) :
                            $sql = "SELECT * FROM khutro";
                            $result = $conn->query($sql);
                        ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>Chủ trọ</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if ($result->num_rows > 0) :

                                            while ($row = $result->fetch_assoc()) :

                                                $idct = $row['idct'];
                                                $sql1 = "SELECT * FROM chutro WHERE idct=$idct";
                                                $result1 = $conn->query($sql1);
                                                if ($result1->num_rows > 0) :
                                                    $row1 = $result1->fetch_assoc();
                                        ?>
                                                    <tr>
                                                        <td><?= $row['idkt'] ?></td>
                                                        <td><?= $row['tenkt'] ?></td>
                                                        <td><?= $row['diachi'] ?></td>
                                                        <td><?= $row['longitude'] ?></td>
                                                        <td><?= $row['latitude'] ?></td>
                                                        <td><?= $row1['tenct'] ?></td>
                                                        <td>
                                                            <a href="khutro-sua.php?idkt=<?= $row['idkt'] ?>" type="button" class="btn btn-info waves-effect btn-block">
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

                        <?php
                        else :
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM khutro WHERE idct=$id";
                            $result = $conn->query($sql);
                        ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if ($result->num_rows > 0 ) :

                                            while ($row = $result->fetch_assoc()) :
                                        ?>
                                                <tr>
                                                    <td><?= $row['idkt'] ?></td>
                                                    <td><?= $row['tenkt'] ?></td>
                                                    <td><?= $row['diachi'] ?></td>
                                                    <td><?= $row['longitude'] ?></td>
                                                    <td><?= $row['latitude'] ?></td>
                                                    <td>
                                                        <a href="khutro-sua.php?idkt=<?= $row['idkt'] ?>" type="button" class="btn btn-info waves-effect btn-block">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                    </td>
                                                </tr>

                                        <?php

                                            endwhile;
                                        endif;
                                        ?>

                                    </tbody>

                                </table>
                            </div>

                        <?php
                        endif
                        ?>
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