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
    <title>เเก้ไขข้อมูลสถานที่ท่องเที่ยว</title>

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
                                <div class="card-header">ฟอร์มการเเก้ข้อมูล</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center text-primary title-2">เเก้ไขสถานที่ท่องเที่ยว</h3>
                                    </div>
                                    <hr>
                                    <form action="" method="post" novalidate="novalidate" @submit.prevent="updateData">
                                        <div class="form-group">
                                            <label for="cc-payment"
                                                class="control-label mb-1">ชื่อสถานที่ท่องเที่ยว</label>
                                            <input v-model.trim="input.at_name" type="text" class="form-control"
                                                autofocus required>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">ที่ตั้งสถานที่ท่องเที่ยว
                                                หมู่บ้าน ตำบล อำเภอ</label>
                                            <input v-model.trim="input.at_location" required type="text"
                                                class="form-control">

                                        </div>
                                        <div class=" form-group">
                                            <label for="cc-name"
                                                class="control-label mb-1">รายละเอียดสถานที่ท่องเที่ยว</label>
                                            <textarea v-model.trim="input.at_detial" rows="9" placeholder=""
                                                class="form-control">
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">พิกัด</label>
                                            <input v-model.trim="input.at_p" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">รูปหลัก</label>
                                            <input @change="up_a_profile" type="file" class="form-control" required>
                                            <img v-if="input.at_profile !== null" :src="input.at_profile"
                                                class="img-fluid" alt="" srcset="">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">รูปประกอบ
                                                        1</label>
                                                    <input @change="up_a_img1" type="file" class="form-control"
                                                        required>
                                                </div>
                                                <img v-if="input.at_img1 !== null" :src="input.at_img1"
                                                    class="img-fluid" alt="" srcset="">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">รูปประกอบ
                                                        2</label>
                                                    <input @change="up_a_img2" type="file" class="form-control"
                                                        required>
                                                </div>
                                                <img v-if="input.at_img2 !== null" :src="input.at_img2"
                                                    class="img-fluid" alt="" srcset="">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">รูปประกอบ
                                                        3</label>
                                                    <input @change="up_a_img3" type="file" class="form-control"
                                                        required>
                                                </div>
                                                <img v-if="input.at_img3 !== null" :src="input.at_img3"
                                                    class="img-fluid" alt="" srcset="">
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-warning btn-block mt-3">
                                                เเก้ไข
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
            at_id: `<?=$_GET["at_id"]?>`,
            at_profile: null,
            at_img1: null,
            at_img2: null,
            at_img3: null,

            at_profile_type: null,
            at_img1_type: null,
            at_img2_type: null,
            at_img3_type: null,

            input: {
                at_name: "",
                at_profile: null,
                at_img1: null,
                at_img2: null,
                at_img3: null,
            },
        },
        mounted() {
            this.getData()
        },
        methods: {
            getData() {
                axios.get(`./api/getAttration.php?getAttraction=req&at_id=${this.at_id}`).then(res => {
                    // console.log('res', res.data[0])
                    this.input = {
                        ...res.data[0]
                    }
                    this.input.at_profile = `./images/a/${res.data[0].at_profile}`
                    this.input.at_img1 = `./images/a/${res.data[0].at_img1}`
                    this.input.at_img2 = `./images/a/${res.data[0].at_img2}`
                    this.input.at_img3 = `./images/a/${res.data[0].at_img3}`

                    this.at_profile = `${res.data[0].at_profile}`
                    this.at_img1 = `${res.data[0].at_img1}`
                    this.at_img2 = `${res.data[0].at_img2}`
                    this.at_img3 = `${res.data[0].at_img3}`

                    // console.log('this.input', this.input)
                }).catch(e => {
                    console.error(e)
                })
            },
            updateData() {

                this.input.at_profile = `${this.at_profile}`
                this.input.at_img1 = `${this.at_img1}`
                this.input.at_img2 = `${this.at_img2}`
                this.input.at_img3 = `${this.at_img3}`

                const payload = {
                    action: "updateAttraction",
                    at_id: this.at_id,
                    at_profile_type: this.at_profile_type,
                    at_img1_type: this.at_img1_type,
                    at_img2_type: this.at_img2_type,
                    at_img3_type: this.at_img3_type,
                    ...this.input
                }
                console.log('payload', payload)
                axios.post('./api/updateAttrationApi.php', payload).then(res => {
                    // console.log(res)
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location = `./attractionsList.php`
                    })
                }).catch(e => {
                    console.error(e)
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถเเก้ไขข้อมูลได้',
                        text: 'กรุณาตรวจสอบความถูกต้องของข้อมูล \n อาจเกิดจากการอัปโหลดไฟล์ไม่สำเร็จ!',
                    });
                })
            },
            up_a_profile(e) {
                let reader = new FileReader();
                const fileType = this.checkImageTypeUpload(e);
                this.at_profile_type = fileType
                if (fileType !== null) {
                    reader.onload = (e) => {
                        this.input.at_profile = e.target.result;
                        this.at_profile = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    this.input.at_profile = this.at_profile
                    this.at_profile_type = null
                    Swal.fire({
                        icon: 'error',
                        title: 'ไฟล์ที่ Upload',
                        text: 'กรุณา Upload ไฟล์รูปภาพที่เป็นนามสกุลไฟล์ .jpeg , .jpg , .png!',
                    });
                }
            },
            up_a_img1(e) {
                let reader = new FileReader();
                const fileType = this.checkImageTypeUpload(e);
                this.at_img1_type = fileType
                if (fileType !== null) {
                    reader.onload = (e) => {
                        this.input.at_img1 = e.target.result;
                        this.at_img1 = e.target.result;

                    };
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    this.input.at_img1 = this.at_img1
                    this.at_img1_type = null
                    Swal.fire({
                        icon: 'error',
                        title: 'ไฟล์ที่ Upload',
                        text: 'กรุณา Upload ไฟล์รูปภาพที่เป็นนามสกุลไฟล์ .jpeg , .jpg , .png!',
                    });
                }
            },
            up_a_img2(e) {
                let reader = new FileReader();
                const fileType = this.checkImageTypeUpload(e);
                this.at_img2_type = fileType
                if (fileType !== null) {
                    reader.onload = (e) => {
                        this.input.at_img2 = e.target.result;
                        this.at_img2 = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    this.input.at_img2 = this.at_img2
                    this.at_img1_type = null
                    Swal.fire({
                        icon: 'error',
                        title: 'ไฟล์ที่ Upload',
                        text: 'กรุณา Upload ไฟล์รูปภาพที่เป็นนามสกุลไฟล์ .jpeg , .jpg , .png!',
                    });
                }
            },
            up_a_img3(e) {
                let reader = new FileReader();
                const fileType = this.checkImageTypeUpload(e);
                this.at_img3_type = fileType
                if (fileType !== null) {
                    reader.onload = (e) => {
                        this.input.at_img3 = e.target.result;
                        this.at_img3 = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    this.input.at_img3 = this.at_img3
                    this.at_img3_type = null
                    Swal.fire({
                        icon: 'error',
                        title: 'ไฟล์ที่ Upload',
                        text: 'กรุณา Upload ไฟล์รูปภาพที่เป็นนามสกุลไฟล์ .jpeg , .jpg , .png!',
                    });
                }
            },
            checkImageTypeUpload(e) {
                let imageType = e.target.files[0].type;
                switch (imageType) {
                    case 'image/jpg':
                        return "jpg";
                        break;
                    case 'image/jpeg':
                        return "jpeg";
                        break;
                    case 'image/png':
                        return "png";
                        break;
                    default:
                        return null;
                }
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