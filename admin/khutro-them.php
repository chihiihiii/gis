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
        if ($_SESSION['role'] == 1) {
            $sql = "SELECT * FROM chutro";
            $result = $conn->query($sql);
        } else {
            $idct = $_SESSION['id'];
            $sql = "SELECT * FROM chutro WHERE idct=$idct";
            $result = $conn->query($sql);
        }
        if ($result->num_rows > 0) :

        ?>

            <!-- Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>THÊM KHU TRỌ</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="khutro-xuly.php">
                                <?php
                                if ($_SESSION['role'] == 1) :
                                ?>
                                    <div class="form-group form-float">
                                        <select class="form-control show-tick" name="idct" required>
                                            <option value="" disabled selected>Chọn chủ trọ</option>
                                            <?php
                                            while ($row = $result->fetch_assoc()) :
                                            ?>
                                                <option value="<?= $row['idct'] ?>"><?= $row['tenct'] ?></option>

                                            <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>

                                <?php
                                else :
                                ?>
                                    <input type="hidden" name="idct" id="" value="<?= $idct ?>">

                                <?php
                                endif;
                                ?>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tenkt" id="tenkt" required>
                                        <label class="form-label">Tên khu trọ</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="diachi" id="diachi" required>
                                        <label class="form-label">Địa chỉ</label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="longitude" id="longitude" required>
                                                <label class="form-label">Longitude</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="latitude" id="latitude" required>
                                                <label class="form-label">Latitude</label>
                                            </div>
                                        </div>
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
                Vui lòng thêm chủ trọ trước
            </div>
        <?php
        endif;

        ?>


    </div>
</section>


<?php
include 'footer.php';
?>