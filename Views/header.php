<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Route Ticket System</title>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="<?=$this->base_path?>public/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="<?=$this->base_path?>public/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="<?=$this->base_path?>public/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="<?=$this->base_path?>public/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?=$this->base_path?>public/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="<?=$this->base_path?>public/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?=$this->base_path?>public/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="<?=$this->base_path?>public/css/sleek.css" />
    <!-- FAVICON -->
    <link href="<?=$this->base_path?>public/img/favicon.png" rel="shortcut icon" />
    <!--
         HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
         -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <script src="<?=$this->base_path?>public/plugins/nprogress/nprogress.js"></script>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light right-sidebar-out" id="body">
    <script>
        var base_path = "<?=$this->base_path?>";
        var username = "<?=$this->login?>";
        var useravatar = "<?= $this->base_path ?>public/img/user/undefined.jpg";
        var role = "<?= $this->role?>";
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <div class="mobile-sticky-body-overlay"></div>
    <div class="wrapper">
    <!-- SIDEBAR BEGIN -->