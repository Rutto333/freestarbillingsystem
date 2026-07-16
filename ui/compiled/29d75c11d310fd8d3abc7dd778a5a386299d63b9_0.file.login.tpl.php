<?php
/* Smarty version 4.5.3, created on 2025-09-10 13:32:51
  from '/var/www/html/myapp/ui/ui/customer/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c153d3911687_99469322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29d75c11d310fd8d3abc7dd778a5a386299d63b9' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/customer/login.tpl',
      1 => 1757500328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c153d3911687_99469322 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-brown: #8B4513;
            --warm-brown: #A0522D;
            --light-brown: #D2B48C;
            --dark-brown: #654321;
            --cream: #F5E6D3;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #fef7f0 0%, #f4e4d6 100%);
            min-height: 100vh;
        }

        /* Perfect centering container */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
        }

        /* Perfectly balanced card */
        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow:
                0 20px 60px rgba(139, 69, 19, 0.15),
                0 8px 30px rgba(139, 69, 19, 0.08);
            overflow: hidden;
            width: 100%;
            max-width: 440px;
            border: 1px solid rgba(139, 69, 19, 0.06);
            animation: slideUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
        }

        /* Symmetrical header */
        .login-header {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--warm-brown) 100%);
            color: #fff;
            text-align: center;
            padding: 40px 40px 35px;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg,
                rgba(255,255,255,0.1) 0%,
                transparent 50%,
                rgba(255,255,255,0.05) 100%);
        }

        .login-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
            position: relative;
            z-index: 1;
        }

        /* Perfectly balanced body */
        .login-body {
            padding: 40px;
        }

        /* Symmetrical input groups */
        .input-group {
            margin-bottom: 24px;
            display: flex;
            align-items: stretch;
            border: 2px solid var(--light-brown);
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            height: 52px;
        }

        .input-group:focus-within {
            border-color: var(--primary-brown);
            box-shadow: 0 0 0 4px rgba(139, 69, 19, 0.12);
            transform: translateY(-1px);
        }

        .input-group:last-of-type {
            margin-bottom: 32px;
        }

        /* Perfectly sized icons */
        .input-group .input-group-addon {
            background: var(--primary-brown);
            color: #fff;
            padding: 0;
            font-size: 16px;
            border: none;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-group-addon {
            background: var(--warm-brown);
        }

        /* Balanced form controls */
        .form-control {
            border: none;
            flex: 1;
            padding: 0 20px;
            font-size: 16px;
            color: var(--dark-brown);
            background: transparent;
            height: 48px;
            line-height: 48px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            background: rgba(139, 69, 19, 0.02);
        }

        .form-control::placeholder {
            color: #aaa;
            transition: all 0.3s ease;
        }

        .form-control:focus::placeholder {
            color: #ccc;
            transform: translateX(4px);
        }

        /* Perfectly balanced button */
        .btn-primary {
            width: 100%;
            height: 52px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--warm-brown) 100%);
            border: none;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 14px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                transparent,
                rgba(255,255,255,0.2),
                transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 35px rgba(139, 69, 19, 0.3),
                0 4px 15px rgba(139, 69, 19, 0.2);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.2);
        }

        /* Smooth animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Perfect responsive design */
        @media (max-width: 480px) {
            .login-container {
                padding: 20px 15px;
            }

            .login-card {
                max-width: 100%;
                border-radius: 16px;
            }

            .login-header {
                padding: 35px 30px 30px;
            }

            .login-header h2 {
                font-size: 22px;
            }

            .login-body {
                padding: 35px 30px;
            }
        }

        /* Additional visual balance elements */
        .login-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(135deg,
                rgba(139, 69, 19, 0.1) 0%,
                rgba(160, 82, 45, 0.05) 50%,
                rgba(139, 69, 19, 0.1) 100%);
            border-radius: 21px;
            z-index: -1;
        }

        /* Perfect focus states for accessibility */
        .form-control:focus,
        .btn-primary:focus {
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.3);
        }

        /* Glyphicon fallback for icons */
        .glyphicon-phone-alt::before { content: "📱"; }
        .glyphicon-envelope::before { content: "✉️"; }
        .glyphicon-user::before { content: "👤"; }
        .glyphicon-lock::before { content: "🔒"; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2>Log in to Member Panel</h2>
            </div>

            <div class="login-body">
                <form action="<?php echo Text::url('login/post');?>
" method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}
