<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SYSTEM - ERROR </title>
    <link rel="shortcut icon" href="{$app_url}/ui/ui/images/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/bootstrap.min.css">

    <link rel="stylesheet" href="{$app_url}/ui/ui/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{$app_url}/ui/ui/fonts/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/modern-AdminLTE.min.css">

    <style>
        ::-moz-selection {
            /* Code for Firefox */
            color: red;
            background: yellow;
        }

        ::selection {
            color: red;
            background: yellow;
        }
    </style>

</head>

<body class="hold-transition skin-blue">
    <div class="container">

        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-danger box-solid">
                        <div class="box-body" style="font-size: larger;">
                            <center>
                            <img src="{$app_url}/ui/ui/images/error.png" class="img-responsive hidden-sm hidden-xs"></center>
                            <br>
                            {$error_message}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{$app_url}/ui/ui/images/error.png" class="img-responsive hidden-md hidden-lg">
                </div>
            </div>
        </section>
    </div>
</body>

</html>
