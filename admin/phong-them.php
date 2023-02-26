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

        $sql = "SELECT * FROM khutro";
        $result = $conn->query($sql);
        $sql1 = "SELECT * FROM loaiphong";
        $result1 = $conn->query($sql1);

        if ($result->num_rows > 0) :

        ?>

            <!-- Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>THÊM PHÒNG</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="phong-xuly.php">
                                <label for="idkt">Khu trọ</label>
                                <div class="form-group form-float">
                                    <select class="form-control show-tick" name="idkt" id="idkt" required>
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
                                <label for="idlp">Loại phòng</label>
                                <div class="form-group form-float">
                                    <select class="form-control" name="idlp" id="idlp" required>
                                        <!-- <option value="" disabled selected>Chọn loại phòng</option> -->

                                    </select>
                                </div>
                             
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tenlp" id="tenlp" required>
                                        <label class="form-label">Tên phòng</label>
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

<script>
    $(document).ready(function() {
        $("#idkt").change(function() {

            var idkt = $("#idkt").val();
            // console.log(idkt);
            $.ajax({
                type: "POST",
                url: "phong-xuly.php",
                data: {
                    idkt: idkt,
                    ajax: 'idkt'
                },
                // cache: false,
                success: function(data) {
                    // alert(data);
                    // var db = JSON.stringify(data);
                    var db = JSON.parse(data);

                    // // var data_=JSON.parse(data);
                    for (var i = 0; i < db.length; i++) {
                        console.log(db[i].idlp);
                        console.log(db[i].tenlp);
                        $('#idlp').append(new Option(db[i].tenlp, db[i].idlp));
                    }
                    // $('#idlp').val(db)

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });

        });

    });
</script>