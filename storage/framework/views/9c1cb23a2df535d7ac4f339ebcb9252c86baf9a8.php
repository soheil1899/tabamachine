<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>AdminPanel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">
    



</head>
<body>


<nav class="navbar navbar-expand navbar-dark bg-primary" id="admin-header"><a href="#menu-toggle" id="menu-toggle"
                                                            class="navbar-brand"><span
                class="navbar-toggler-icon"></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>



    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item position-relative">

                <div>
                    <a class="nav-link pointer" href="<?php echo e(route('changeuserinfo')); ?>">
                        <?php echo e(auth()->user()->name); ?>

                        عزیز خوش آمدید
                    </a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="/">صفحه اصلی سایت <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    خروج
                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        </ul>
        <form class="form-inline my-2 my-md-0"></form>
    </div>
</nav>

<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">

        <?php echo $__env->make('layouts.admin.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div id="app" class="container-fluid">


            <?php echo $__env->yieldContent('content'); ?>


        </div>
    </div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->

</body>


<script src="/js/app.js"></script>



<script>


    $(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");

        });

        $(window).resize(function (e) {
            if ($(window).width() <= 768) {
                $("#wrapper").removeClass("toggled");
            } else {
                $("#wrapper").addClass("toggled");
            }
        });
    });

    $(".sidebar-submenu").hide();

    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        $('.sidebar-dropdown > a').removeClass('subactive');
        if ($(this).parent().hasClass("active")) {
            $(".sidebar-dropdown").removeClass("active");
            $(this).parent().removeClass("active");
            $(this).removeClass('subactive');
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this).next(".sidebar-submenu").slideDown(200);
            $(this).parent().addClass("active");
            $(this).addClass('subactive');
        }
    });

    $(".sidebar-submenu > ul > li > a").click(function () {
        if (! $(this).hasClass("subactive2")) {
            $('.sidebar-submenu').find('a').removeClass('subactive2');
            $(this).addClass('subactive2');
        }
    });

</script>

<?php echo $__env->yieldContent('script'); ?>

</html>
<?php /**PATH F:\web\2-98\machine\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>