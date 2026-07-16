<?php
/* Smarty version 4.5.3, created on 2025-08-29 17:53:24
  from '/var/www/html/example/ui/ui/admin/admin/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b1bee4a03382_68961781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aaf20075980dc0a9762cd746fc3a9b6a858e330d' => 
    array (
      0 => '/var/www/html/example/ui/ui/admin/admin/login.tpl',
      1 => 1756479180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68b1bee4a03382_68961781 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo Lang::T('Login');?>
 - <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/logo.png" type="image/x-icon" />

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #fef7f0 0%, #f4e4d6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5d4037;
            line-height: 1.6;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(139, 69, 19, 0.12);
            overflow: hidden;
            border: 1px solid rgba(139, 69, 19, 0.08);
        }

        .login-header {
            text-align: center;
            padding: 40px 40px 20px;
            background: linear-gradient(135deg, #d2691e 0%, #cd853f 100%);
            color: white;
        }

        .login-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 400;
        }

        .login-body {
            padding: 40px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 32px;
            color: #5d4037;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #ddbf94;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff;
            color: #5d4037;
        }

        .form-input:focus {
            outline: none;
            border-color: #d2691e;
            box-shadow: 0 0 0 3px rgba(210, 105, 30, 0.15);
        }

        .form-input::placeholder {
            color: #a0836c;
            font-weight: 400;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0836c;
            font-size: 18px;
            pointer-events: none;
        }

        .login-button {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #d2691e 0%, #cd853f 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .login-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(210, 105, 30, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            text-align: center;
            color: #d2691e;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #8b4513;
        }

        .notification {
            margin-bottom: 24px;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
        }

        .notification.error {
            background: #fef5f5;
            color: #c53030;
            border: 1px solid #fed7d7;
        }

        .notification.success {
            background: #f0fff4;
            color: #2f855a;
            border: 1px solid #c6f6d5;
        }

        .notification.info {
            background: #fef7f0;
            color: #d2691e;
            border: 1px solid #ddbf94;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .login-container {
                padding: 10px;
            }

            .login-header {
                padding: 30px 30px 15px;
            }

            .login-body {
                padding: 30px;
            }

            .login-logo {
                font-size: 24px;
            }

            .login-title {
                font-size: 20px;
                margin-bottom: 24px;
            }
        }

        /* Subtle animations */
        .login-card {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Focus states for accessibility */
        .back-link:focus {
            outline: 2px solid #d2691e;
            outline-offset: 2px;
            border-radius: 4px;
        }

        .login-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(210, 105, 30, 0.25);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</div>
                <div class="login-subtitle">Administration Portal</div>
            </div>

            <div class="login-body">

                <?php if ((isset($_smarty_tpl->tpl_vars['notify']->value))) {?>
                    <div class="notification info">
                        <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                    </div>
                <?php }?>

                <form action="<?php echo Text::url('admin/post');?>
" method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

                    <div class="form-group">
                        <input type="text"
                               required
                               class="form-input"
                               name="username"
                               placeholder="<?php echo Lang::T('Username');?>
"
                               autocomplete="username">
                    </div>

                    <div class="form-group">
                        <input type="password"
                               required
                               class="form-input"
                               name="password"
                               placeholder="<?php echo Lang::T('Password');?>
"
                               autocomplete="current-password">
                    </div>

                    <button type="submit" class="login-button">
                        <?php echo Lang::T('Login');?>

                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        // Add subtle interaction feedback
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Form validation feedback
        const form = document.querySelector('form');
        form.addEventListener('submit', function() {
            const button = document.querySelector('.login-button');
            button.textContent = 'Signing in...';
            button.style.opacity = '0.7';
        });
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
