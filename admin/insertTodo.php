<?php
session_start();
if (isset($_SESSION['a_id'])) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>เพิ่มข่าว</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- sweetalert2 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- axios cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>

<body class="animsition">
    <!-- HEADER MOBILE-->
    <?php include_once "./header.php";?>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <?php include_once "./aside.php";?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <?php include_once "./header2.php";?>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content" id="app">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row my-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">ฟอร์มเพิ่มข้อมูล</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center text-danger title-2">เพิ่มข่าว</h3>
                                    </div>
                                    <hr>
                                    <form action="" method="post" novalidate="novalidate" @submit.prevent="inSertData">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">หัวข้อข่าว</label>
                                            <input v-model.trim="input.bb_name" type="text" class="form-control"
                                                autofocus required>
                                        </div>
                                        <div class=" form-group">
                                            <label for="cc-name" class="control-label mb-1">รายละเอียด</label>
                                            <textarea v-model.trim="input.bb_detail" rows="9" placeholder=""
                                                class="form-control">
                                            </textarea>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block mt-3">
                                                บันทึก
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  row -->
                    <!--  footer -->
                    <?php include_once "./footer.php"?>
                    <!-- end row -->
                    <!-- end footer -->
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
    var app = new Vue({
        el: '#app',
        data: {
            input: {},
        },
        methods: {
            inSertData() {
                const payload = {
                    action: "insertTodo",
                    ...this.input
                }
                // console.log('payload', payload)
                axios.post('./api/insertTodo.php', payload).then(res => {
                    // console.log(res)
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'บันทึกข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location = `./todoList.php`
                    })
                }).catch(e => {
                    console.error(e)
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถบันทึกข้อมูลได้',
                        text: 'กรุณาตรวจสอบความถูกต้องของข้อมูล \n อาจเกิดจากการอัปโหลดไฟล์ไม่สำเร็จ!',
                    });
                })
            },
        },
    });
    </script>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php } else {
    echo "<script>
        location='./login.php'
      </script>";
}
?>