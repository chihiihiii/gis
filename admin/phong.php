<?php
include 'header.php';
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>QUẢN LÝ PHÒNG</h2>
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
        $sql = "SELECT * FROM phong";
        $result = $conn->query($sql);


        ?>


        <!-- Content -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH PHÒNG
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>STT</th>
                                        <th>Tình trạng</th>
                                        <th>Khu trọ</th>
                                        <th>Loại phòng</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    if ($result->num_rows > 0) :

                                        while ($row = $result->fetch_assoc()) :
                                            $idkt = $row['idkt'];
                                            $idlp = $row['idlp'];
                                            $sql1 = "SELECT * FROM khutro WHERE idkt=$idkt";
                                            $sql2 = "SELECT * FROM loaiphong WHERE idlp=$idlp";
                                            $result1 = $conn->query($sql1);
                                            $result2 = $conn->query($sql2);
                                            if ($result1->num_rows > 0 && $result2->num_rows > 0) :
                                                $row1 = $result1->fetch_assoc();
                                                $row2 = $result2->fetch_assoc();
                                    ?>
                                                <tr>
                                                    <td><?= $row['idp'] ?></td>
                                                    <td><?= $row['stt'] ?></td>
                                                    <td><?= ($row['tinhtrang'] == 1) ? 'Trống' : 'Hết' ?></td>

                                                    <td><?= $row1['tenkt'] ?></td>
                                                    <td><?= $row2['tenlp'] ?></td>
                                                    <td>
                                                        <a href="phong-sua.php?idp=<?= $row['idp'] ?>" type="button" class="btn btn-info waves-effect btn-block">
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