<?php
/* Smarty version 4.5.3, created on 2025-10-12 14:15:42
  from '/var/www/html/dev/ui/ui/admin/admin/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68eb8dde917991_03573524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85ac56993c8b141bc335ad9526a83c2eaa1e238a' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/admin/login.tpl',
      1 => 1758718490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68eb8dde917991_03573524 (Smarty_Internal_Template $_smarty_tpl) {
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

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-dark);
        line-height: 1.6;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
    }

    .login-card {
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(30, 58, 138, 0.12);
        overflow: hidden;
        border: 1px solid var(--gray-200);
        animation: slideUp 0.6s ease-out;
    }

    .login-header {
        text-align: center;
        padding: 40px 40px 20px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
        color: var(--white);
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
        color: var(--text-dark);
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
        animation: slideDown 0.4s ease-out;
    }

    .alert-error {
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
        border-color: #fecaca;
        color: var(--danger-red);
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
        color: var(--danger-red);
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
        border: 2px solid var(--gray-200);
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: var(--white);
        color: var(--text-dark);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    .form-input.error {
        border-color: var(--danger-red);
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15);
    }

    .form-input::placeholder {
        color: var(--text-light);
        font-weight: 400;
    }

    .login-button {
        width: 100%;
        padding: 14px 24px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
        color: var(--white);
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
        box-shadow: 0 8px 25px rgba(30, 64, 175, 0.25);
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
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .back-link:hover {
        color: var(--dark-blue);
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

    /* Animations */
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

    /* Focus states */
    .back-link:focus {
        outline: 2px solid var(--accent-blue);
        outline-offset: 2px;
        border-radius: 4px;
    }

    .login-button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25);
    }

    .alert-close:focus {
        outline: 2px solid var(--danger-red);
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
