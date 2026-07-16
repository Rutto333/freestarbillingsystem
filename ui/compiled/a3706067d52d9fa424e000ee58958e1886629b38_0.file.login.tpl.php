<?php
/* Smarty version 4.5.3, created on 2025-10-12 14:16:28
  from '/var/www/html/dev/ui/ui/customer/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68eb8e0c52b140_64478196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3706067d52d9fa424e000ee58958e1886629b38' => 
    array (
      0 => '/var/www/html/dev/ui/ui/customer/login.tpl',
      1 => 1758719822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68eb8e0c52b140_64478196 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1e40af;
            --light-blue: #3b82f6;
            --lighter-blue: #60a5fa;
            --white: #FFFFFF;
            --dark-blue: #1e3a8a;
            --accent-blue: #2563eb;
            --text-dark: #1f2937;
            --text-light: #4b5563;
            --success-green: #10b981;
            --warning-orange: #f59e0b;
            --danger-red: #dc2626;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
            min-height: 100vh;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
        }

        .login-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow:
                0 20px 60px rgba(30, 64, 175, 0.15),
                0 8px 30px rgba(30, 64, 175, 0.08);
            overflow: hidden;
            width: 100%;
            max-width: 440px;
            border: 1px solid var(--gray-200);
            animation: slideUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
            color: var(--white);
            text-align: center;
            padding: 40px 40px 35px;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
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

        .login-body { padding: 40px; }

        .input-group {
            margin-bottom: 24px;
            display: flex;
            align-items: stretch;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            overflow: hidden;
            background: var(--white);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            height: 52px;
        }

        .input-group:focus-within {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
            transform: translateY(-1px);
        }

        .input-group:last-of-type { margin-bottom: 32px; }

        .input-group .input-group-addon {
            background: var(--primary-blue);
            color: var(--white);
            width: 52px; height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-group-addon {
            background: var(--accent-blue);
        }

        .form-control {
            border: none;
            flex: 1;
            padding: 0 20px;
            font-size: 16px;
            color: var(--text-dark);
            background: transparent;
            height: 48px;
            line-height: 48px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            background: rgba(37, 99, 235, 0.02);
        }

        .form-control::placeholder {
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .form-control:focus::placeholder {
            color: #9ca3af;
            transform: translateX(4px);
        }

        .btn-primary {
            width: 100%; height: 52px;
            font-size: 14px; font-weight: 600;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
            border: none;
            color: var(--white);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg,
                transparent,
                rgba(255,255,255,0.2),
                transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before { left: 100%; }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 35px rgba(30, 64, 175, 0.3),
                0 4px 15px rgba(30, 64, 175, 0.2);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 4px 15px rgba(30, 64, 175, 0.2);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @media (max-width: 480px) {
            .login-container { padding: 20px 15px; }
            .login-card { max-width: 100%; border-radius: 16px; }
            .login-header { padding: 35px 30px 30px; }
            .login-header h2 { font-size: 22px; }
            .login-body { padding: 35px 30px; }
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: -1px; left: -1px; right: -1px; bottom: -1px;
            background: linear-gradient(135deg,
                rgba(30, 64, 175, 0.1) 0%,
                rgba(37, 99, 235, 0.05) 50%,
                rgba(30, 64, 175, 0.1) 100%);
            border-radius: 21px;
            z-index: -1;
        }

        .form-control:focus,
        .btn-primary:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.3);
        }

        /* Glyphicon fallback for icons (optional) */
        .glyphicon-user::before { content: "👤"; }
        .glyphicon-lock::before { content: "🔒"; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</div>

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
