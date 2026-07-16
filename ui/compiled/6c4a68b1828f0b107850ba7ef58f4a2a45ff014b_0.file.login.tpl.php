<?php
/* Smarty version 4.5.3, created on 2025-09-10 13:17:23
  from '/var/www/html/myapp/ui/ui/admin/admin/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c15033294909_04984254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c4a68b1828f0b107850ba7ef58f4a2a45ff014b' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/admin/login.tpl',
      1 => 1757481003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c15033294909_04984254 (Smarty_Internal_Template $_smarty_tpl) {
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

        /* Error Alert Styles */
        .alert {
            padding: 14px 16px;
            margin-bottom: 24px;
            border-radius: 8px;
            position: relative;
            border: 1px solid;
            font-size: 14px;
            line-height: 1.4;
        }

        .alert-error {
            background: linear-gradient(135deg, #fdf2f2 0%, #fbeaea 100%);
            border-color: #f5b2b2;
            color: #8b1538;
        }

        .alert-icon {
            display: inline-block;
            margin-right: 8px;
            font-weight: bold;
        }

        .alert-close {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 18px;
            color: #8b1538;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s ease;
            line-height: 1;
        }

        .alert-close:hover {
            opacity: 1;
        }

        .alert-fade-out {
            animation: fadeOutAlert 0.5s ease-out forwards;
        }

        @keyframes fadeOutAlert {
            to {
                opacity: 0;
                max-height: 0;
                padding: 0;
                margin: 0;
                border-width: 0;
            }
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

        .form-input.error {
            border-color: #e53e3e;
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.15);
        }

        .form-input::placeholder {
            color: #a0836c;
            font-weight: 400;
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

        .login-button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
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

        .alert {
            animation: slideDown 0.4s ease-out;
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

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
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

        .alert-close:focus {
            outline: 2px solid #8b1538;
            outline-offset: 2px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</div>
                <div class="login-subtitle">Admin</div>
            </div>

            <div class="login-body">
                <!-- Display error message if exists -->
                <?php if ((isset($_smarty_tpl->tpl_vars['error_message']->value))) {?>
                <div class="alert alert-error" id="errorAlert">
                    <span class="alert-icon">?</span>
                    <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

                    <button type="button" class="alert-close" onclick="hideAlert()" aria-label="Close alert">&times;</button>
                </div>
                <?php }?>

                <form action="<?php echo Text::url('admin/post');?>
" method="post" id="loginForm">
                    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

                    <div class="form-group">
                        <input type="text"
                               required
                               class="form-input"
                               name="username"
                               id="username"
                               placeholder="<?php echo Lang::T('Username');?>
"
                               autocomplete="username">
                    </div>

                    <div class="form-group">
                        <input type="password"
                               required
                               class="form-input"
                               name="password"
                               id="password"
                               placeholder="<?php echo Lang::T('Password');?>
"
                               autocomplete="current-password">
                    </div>

                    <button type="submit" class="login-button" id="loginBtn">
                        <?php echo Lang::T('Login');?>

                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        // Hide alert function
        function hideAlert() {
            const alert = document.getElementById('errorAlert');
            if (alert) {
                alert.classList.add('alert-fade-out');
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }
        }

        // Auto-hide alert after 7 seconds
        if (document.getElementById('errorAlert')) {
            setTimeout(() => {
                hideAlert();
            }, 7000);
        }

        // Add subtle interaction feedback
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                // Remove error styling on focus
                this.classList.remove('error');
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Form validation feedback
        const form = document.getElementById('loginForm');
        const button = document.getElementById('loginBtn');
        const originalButtonText = button.textContent;

        form.addEventListener('submit', function(e) {
            // Clear any previous error styling
            document.querySelectorAll('.form-input').forEach(input => {
                input.classList.remove('error');
            });

            // Basic client-side validation
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!username || !password) {
                e.preventDefault();

                // Highlight empty fields
                if (!username) document.getElementById('username').classList.add('error');
                if (!password) document.getElementById('password').classList.add('error');

                return false;
            }

            // Show loading state
            button.textContent = 'Signing in...';
            button.disabled = true;
        });

        // Reset button if there's an error (page reloads with error)
        window.addEventListener('load', function() {
            if (document.getElementById('errorAlert')) {
                button.textContent = originalButtonText;
                button.disabled = false;
            }
        });

        // Handle form reset on browser back button
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                button.textContent = originalButtonText;
                button.disabled = false;
            }
        });
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
