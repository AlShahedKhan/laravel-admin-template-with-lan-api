<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="<?php echo e(asset('backend')); ?>/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet"
        href="<?php echo e(asset('backend')); ?>/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/plugins/toastr/toastr.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo e(asset('backend')); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    
    <link rel="icon" type="image/x-icon" href="<?php echo e(@globalAsset(setting('favicon'))); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <input type="hidden" name="url" id="url" value="<?php echo e(url('')); ?>">
    <meta name="keywords"
        content="admin, admin dashboard, admin template, backend, bootstrap, crm, laravel, laravel admin, web application">
    <meta name="description"
        content="OnestDrax - Laravel Admin Dashboard Starter Kit with User Manager, Role, Permission, Language Manage with RTL & More">
    <?php if(findDirectionOfLang() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/bootstrap.rtl.min.css">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/bootstrap.min.css">
    <?php endif; ?>

    <!-- css  -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/semantic.rtl.min.css">
    <!-- metis menu for sidebar  -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/metisMenu.min.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/apexcharts.min.css">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/vendors/jvectormap/css/jquery-jvectormap-1.2.2.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/icon-fonts.css">
    <!-- All Plugin  -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/plugin.css">
    <!-- Custom CSS  start -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/assets/css/style2.css">
    <!-- slick css  -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/vendors/slick/css/slick.css">
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/vendors/slick/css/slick-theme.css">
    <!-- lineicons css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/vendors/lineicons/lineicons.css" />
    <!-- line awesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend')); ?>/vendors/lineawesome/css/line-awesome.min.css" />
    <!-- daterangepicker Custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/daterangepicker/daterangepicker.css')); ?>" />

    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
      integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="<?php echo e(@findDirectionOfLang()); ?>" dir="<?php echo e(@findDirectionOfLang()); ?>">


    <div id="layout-wrapper">
        <!-- start header -->
        <?php echo $__env->make('backend.partials.publicheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end header -->

        <!-- start sidebar -->
        <?php echo $__env->make('backend.partials.publicsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end sidebar -->

        <main class="main-content ph-24 ph-lg-32 pt-100 mt-4">
            <!-- start main content -->
            <?php echo $__env->yieldContent('admin_content'); ?>
            <!-- end main content -->

            <!-- start footer -->
            <?php echo $__env->make('backend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end footer -->
        </main>
    </div>

    
    
    <script src="<?php echo e(asset('backend')); ?>/assets/js/theme.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/popper.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/semantic.min.js"></script>
    <!-- Metis menu for sidebar  -->
    <script src="<?php echo e(asset('backend')); ?>/assets/js/metisMenu.min.js"></script>
    <!-- jvectormap js -->
    <script src="<?php echo e(asset('backend/vendors/jvectormap/js/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendors/jvectormap/js/jquery-jvectormap-us-merc-en.js')); ?>"></script>
    
    <script src="<?php echo e(asset('backend')); ?>/vendors/apexchart/js/apexcharts.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/vendors/chartjs/js/chart.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/ot-charts.js"></script>
    <!-- slick js  -->
    <script src="<?php echo e(asset('backend/vendors/slick/js/slick.min.js')); ?>"></script>

    <script src="<?php echo e(asset('backend')); ?>/assets/js/datepicker.min.js"></script>
    
    <script src="<?php echo e(asset('backend')); ?>/assets/js/plugin.js"></script>
    <!-- Vendor JS end  -->
    <script src="<?php echo e(asset('backend')); ?>/assets/js/main.js"></script>
    
    <script src="<?php echo e(asset('backend')); ?>/assets/js/custom.js"></script>
    

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('backend')); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('backend')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?php echo e(asset('backend')); ?>/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo e(asset('backend')); ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('backend')); ?>/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('backend/dist/js/pages/dashboard3.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('backend/plugins/toster/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dragerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Date!");
                    }
                });
        });
    </script>
    <script>
        $(document).on("click", "#logout", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Logout?",
                    icon: "warning",
                    buttons: true,
                    dragerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Date!");
                    }
                });
        });
    </script>

    <script>
        <?php if(Session::has('message')): ?>
            var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"
            switch (type) {
                case 'info':
                    toastr.info("<?php echo e(Session::get('message')); ?>");
                    break;
                case 'success':
                    toastr.success("<?php echo e(Session::get('message')); ?>");
                    break;
                case 'warning':
                    toastr.warning("<?php echo e(Session::get('message')); ?>");
                    break;
                case 'error':
                    toastr.error();
                    ("<?php echo e(Session::get('message')); ?>");
                    break;
            }
        <?php endif; ?>
    </script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script src="<?php echo e(asset('backend/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendors/daterangepicker/js/daterangepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/slick-carousel.js')); ?>"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
      $(document).ready(function () {
        $(".products").slick({
          infinite: true,
          loop: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true
        });
      });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    

    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\khelardan\resources\views/layouts/publichome.blade.php ENDPATH**/ ?>