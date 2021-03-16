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
    <title>สถานที่ท่องเที่ยว</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
    <div class="page-wrapper">

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

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">ข้อมูลสถานที่ท่องเที่ยว</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="" method="post">
                                            <div class="rs-select2--light rs-select2--md">
                                                <div class="form-group">
                                                    <input type="text" placeholder="ค้นหาสถานที่ท่องเที่ยว"
                                                        class="form-control" name="a_name">
                                                </div>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <button type="submit" name="SearchSubmit" class="btn btn-primary">
                                                ค้นหา
                                            </button>
                                        </form>
                                        <a href="./attractionsList.php" class="btn btn-warning">
                                            รายการทั้งหมด
                                        </a>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="insertAttraction.php"
                                            class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>เพิ่มสถานที่
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ไอดี
                                                </th>
                                                <th>ชื่อสถานที่</th>
                                                <th>สถานที่</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
include_once "./configs/connectDB.php";
    $sql = "SELECT * FROM `tbl_attractions`";

    if (isset($_POST["SearchSubmit"])) {
        $sql = "SELECT * FROM `tbl_attractions`
            WHERE `at_id` LIKE '%{$_POST["a_name"]}%'
            OR `at_name` LIKE '%{$_POST["a_name"]}%'";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <?=$row["at_id"]?>
                                                </td>
                                                <td><?=$row["at_name"]?></td>
                                                <td class="desc"><?=$row["at_location"]?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="showsAttraction.php?at_id=<?=$row["at_id"]?>"
                                                            class="item" data-toggle="tooltip" data-placement="top"
                                                            title="ดูข้อมูล">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </a>
                                                        <a href="updateAttraction.php?at_id=<?=$row["at_id"]?>"
                                                            class="item" data-toggle="tooltip" data-placement="top"
                                                            title="เเก้ไข">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="ลบ" @click="deleteData(<?=$row["at_id"]?>)">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <?php

        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);

    ?>



                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
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
            a: "aaaaaaaaaa",
        },
        methods: {

            deleteData(at_id) {
                // console.log('at_id', at_id)
                Swal.fire({
                    title: 'ต้องการลบข้อมูลหรือไม่?',
                    text: "คุณต้องการลบข้อมูลหรือไม่!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่!',
                    cancelButtonText: 'ไม่!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        // );

                        const payload = {
                            action: "deleteAttraction",
                            at_id: at_id
                        }
                        // console.log('payload', payload)
                        axios.post('./api/deleteAttrationApi.php', payload).then(res => {
                            // console.log(res)
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'ลบข้อมูลสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location = `./attractionsList.php`
                            })
                        }).catch(e => {
                            console.error(e)
                            Swal.fire({
                                icon: 'error',
                                title: 'ไม่สามารถบันทึกข้อมูลได้',
                                text: 'กรุณาตรวจสอบความถูกต้องของข้อมูล \n อาจเกิดจากการอัปโหลดไฟล์ไม่สำเร็จ!',
                            });
                        })

                    }
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