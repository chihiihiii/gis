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
        if ($_SESSION['role'] == 1) {
            $sql = "SELECT * FROM khutro";
            $result = $conn->query($sql);
        } else {
            $idct = $_SESSION['id'];
            $sql = "SELECT * FROM khutro WHERE idct=$idct";
            $result = $conn->query($sql);
        }


        if ($result->num_rows > 0) :

        ?>

            <!-- Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>THÊM LOẠI PHÒNG</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="loaiphong-xuly.php">
                            
                                <div class="form-group form-float">

                                    <select class="form-control show-tick" name="idkt" required>
                                        <option value="" disabled selected>Chọn khu trọ</option>
                                        <?php
                                        while ($row = $result->fetch_assoc()) :
                                        ?>
                                            <option value="<?= $row['idkt'] ?>"><?= $row['tenkt'] ?></option>

                                        <?php
                                        endwhile;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tenlp" id="tenlp" required>
                                        <label class="form-label">Tên loại phòng</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="songuoi" id="songuoi" required>
                                        <label class="form-label">Số người</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="dientich" id="dientich" required>
                                        <label class="form-label">Diện tích (m2)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="gia" id="gia" required>
                                        <label class="form-label">Giá (VNĐ)</label>
                                    </div>
                                </div>



                                <button class="btn btn-info waves-effect" type="submit" name="them">LƯU</button>
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
                Vui lòng thêm khu trọ trước
            </div>
        <?php
        endif;

        ?>


    </div>
</section>


<?php
include 'footer.php';
?>