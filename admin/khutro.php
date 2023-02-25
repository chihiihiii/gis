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

        <?php
        $sql = "SELECT * FROM khutro";
        $result = $conn->query($sql);

        $sql1 = "SELECT * FROM chutro";
        $result1 = $conn->query($sql1);
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    if ($result->num_rows > 0 && $result1->num_rows > 0) :

                                        while ($row = $result->fetch_assoc()) :
                                    ?>
                                            <tr>
                                                <td><?= $row['idkt'] ?></td>
                                                <td><?= $row['tenkt'] ?></td>
                                                <td><?= $row['diachi'] ?></td>
                                                <td><?= $row['longitude'] ?></td>
                                                <td><?= $row['latitude'] ?></td>
                                                <td>
                                                    <?php

                                                    while ($row1 = $result1->fetch_assoc()) :
                                                        if ($row['idct'] == $row1['idct']) :
                                                    ?>
                                                            <?= $row1['tenct'] ?>
                                                    <?php
                                                        endif;
                                                    endwhile;
                                                    ?>
                                                </td>
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