<?php
if (!isset($_GET['idct']) || empty($_GET['idct'])) {
    header('location: chutro.php');
}
include 'header.php';
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>QUẢN LÝ CHỦ TRỌ</h2>
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

        $idct = $_GET['idct'];
        $sql = "SELECT * FROM chutro WHERE idct=$idct";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) :
            $row = $result->fetch_assoc();
            // var_dump($row);

        ?>


            <!-- Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SỬA CHỦ TRỌ</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="chutro-xuly.php">
                                <input type="hidden" name="idct" value="<?= $row['idct'] ?>" id="">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tenct" id="tenct" value="<?= $row['tenct'] ?>" required>
                                                <label for="tenct" class="form-label">Tên chủ trọ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="sdt" id="sdt" value="<?= $row['sdt'] ?>" required>
                                                <label for="sdt" class="form-label">Số điện thoại</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="radio" name="gioitinh" id="nam" value="1" class="with-gap" required <?= ($row['gioitinh'] == 1) ? 'checked' : '' ?>>
                                    <label for="nam">Nam</label>

                                    <input type="radio" name="gioitinh" id="nu" value="0" class="with-gap" <?= ($row['gioitinh'] == 0) ? 'checked' : '' ?>>
                                    <label for="nu" class="m-l-20">Nữ</label>
                                </div>
                                <button class="btn btn-info waves-effect" type="submit" name="sua">LƯU</button>
                                <button class="btn btn-default waves-effect" type="reset">LÀM LẠI</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Content -->

        <?php
        else :


        ?>

            <div class="alert bg-pink" role="alert">
                Không tồn tại
            </div>
        <?php
        endif;

        ?>



    </div>
</section>


<?php
include 'footer.php';
?>