<?php
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




        <!-- Content -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>THÊM CHỦ TRỌ</h2>
                        <!-- <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul> -->
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="chutro-xuly.php">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="tenct" id="tenct" required>
                                            <label for="tenct" class="form-label">Tên chủ trọ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="sdt" id="sdt" required>
                                            <label for="sdt" class="form-label">Số điện thoại</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="radio" name="gioitinh" id="nam" value="1" class="with-gap" required>
                                <label for="nam">Nam</label>

                                <input type="radio" name="gioitinh" id="nu" value="0" class="with-gap">
                                <label for="nu" class="m-l-20">Nữ</label>
                            </div>
                            <button class="btn btn-info waves-effect" type="submit" name="them">LƯU</button>
                            <button class="btn btn-default waves-effect" type="reset">LÀM LẠI</button>
                        </form>
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