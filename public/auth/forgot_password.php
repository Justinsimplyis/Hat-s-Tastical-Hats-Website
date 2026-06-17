<?php
// Basic simulation of backend logic. 
// Replace this with your actual database check and mail() or PHPMailer logic.
 $message = '';
 $message_type = ''; // 'success' or 'error'
 $email_prefill = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $email_prefill = htmlspecialchars($email);

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $message_type = 'error';
    } else {
        // TODO: Check if email exists in the database.
        // TODO: Generate a secure token, save to DB, and send email with reset link.
        
        // For security, always show a generic success message even if the email doesn't exist,
        // to prevent attackers from guessing registered emails.
        $message = 'If an account exists for ' . $email_prefill . ', you will receive an email with instructions on how to reset your password.';
        $message_type = 'success';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Forgot Password — Hattie's Hat'istical Hats</title>
    <style>
        :root {
            /* Primary Brand Colors */
            --rose: #C98F98;
            --rose-hover: #B87B85;
            --rose-light: rgba(201,143,152,0.12);
            
            --blush: #D8A8AE;
            --blush-light: rgba(216,168,174,0.18);
            
            --champagne: #F7EBDD;
            --champagne-dark: #EFDCC8;
            --champagne-deep: #D9C1A6;
            
            --ivory: #FFF8F1;
            --white: #FFFFFF;

            /* Typography */
            --text-primary: #2F211D;
            --text-secondary: #5C463B;
            --text-muted: #8C7268;

            /* Borders */
            --border: #EADCD0;
            --border-light: #F5ECE4;

            /* Status */
            --success: #8DAA91;
            --error: #E07070;

            /* Background Layers */
            --bg: var(--ivory);
            --bg-elevated: var(--white);

            /* Shadows */
            --shadow-sm: 0 2px 6px rgba(47,33,29,0.05);
            --shadow-md: 0 6px 18px rgba(47,33,29,0.08);
            --shadow-lg: 0 14px 35px rgba(47,33,29,0.12);
            --shadow-xl: 0 24px 55px rgba(47,33,29,0.18);

            /* Radius */
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-full: 9999px;

            /* Animation */
            --ease: cubic-bezier(.4,0,.2,1);
            --duration: .2s;

            /* Aliases */
            --fg: var(--text-primary);
            --fg-secondary: var(--text-secondary);
            --fg-muted: var(--text-muted);
            --red: var(--rose);
            --red-hover: var(--rose-hover);
            --red-light: var(--rose-light);
            --pink: var(--blush);
            --pink-light: var(--blush-light);
            --cream: var(--champagne);
            --cream-dark: var(--champagne-dark);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 15px; -webkit-font-smoothing: antialiased; }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--fg);
            line-height: 1.65;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
        }
        
        /* Decorative background blobs */
        body::before {
            content: '';
            position: fixed;
            top: -150px;
            right: -150px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--pink-light) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--red-light) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .auth-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
        }

        .auth-card {
            background: var(--bg-elevated);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            padding: 48px 40px;
            text-align: center;
            animation: fadeIn .4s var(--ease);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .nav-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 32px;
            text-decoration: none;
            color: inherit;
        }
        .nav-logo-mark {
            width: 44px; height: 44px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--red), var(--pink));
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
        }
        .nav-logo-text { display: flex; flex-direction: column; line-height: 1.15; text-align: left; }
        .nav-logo-name { font-size: 1.1rem; font-weight: 700; color: var(--fg); letter-spacing: -.01em; }
        .nav-logo-tagline { font-size: .7rem; font-weight: 600; color: var(--pink); letter-spacing: .03em; }

        .auth-title { font-size: 1.8rem; font-weight: 800; color: var(--fg); letter-spacing: -.02em; margin-bottom: 8px; }
        .auth-subtitle { font-size: .92rem; color: var(--fg-muted); margin-bottom: 32px; }

        .alert-box {
            padding: 14px 18px;
            border-radius: var(--radius-md);
            font-size: .88rem;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: left;
            line-height: 1.5;
        }
        .alert-box i { font-size: 1.1rem; flex-shrink: 0; }
        .alert-box.success { background: rgba(141,170,145,0.12); color: #5e7a62; border: 1px solid rgba(141,170,145,0.3); }
        .alert-box.error { background: rgba(224,112,112,0.12); color: #a55050; border: 1px solid rgba(224,112,112,0.3); }

        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: .82rem; font-weight: 600; color: var(--fg-secondary); margin-bottom: 8px; }
        
        .input-wrapper { position: relative; }
        .input-wrapper i {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: var(--fg-muted);
            font-size: .95rem;
        }
        
        .form-input {
            width: 100%;
            padding: 14px 16px 14px 44px;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--border);
            background: var(--bg);
            font-size: .95rem;
            color: var(--fg);
            transition: all var(--duration) var(--ease);
            outline: none;
        }
        .form-input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px var(--red-light);
            background: var(--white);
        }
        .form-input::placeholder { color: var(--fg-muted); }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px 24px;
            border-radius: var(--radius-md);
            background: var(--red);
            color: #fff;
            font-size: .95rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all var(--duration) var(--ease);
        }
        .btn-primary:hover {
            background: var(--red-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(201,143,152,.35);
        }

        .auth-footer {
            margin-top: 28px;
            font-size: .88rem;
            color: var(--fg-secondary);
        }
        .auth-footer a {
            color: var(--red);
            font-weight: 600;
            text-decoration: none;
            transition: color var(--duration) var(--ease);
        }
        .auth-footer a:hover { text-decoration: underline; color: var(--red-hover); }
        
        /* Hide form if success */
        .hidden { display: none; }
    </style>
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-card">
            <a href="/" class="nav-logo">
                <div class="nav-logo-mark">H</div>
                <div class="nav-logo-text">
                    <span class="nav-logo-name">Hattie's</span>
                    <span class="nav-logo-tagline">Hat'istical Hats</span>
                </div>
            </a>

            <h1 class="auth-title">Forgot Password?</h1>
            <p class="auth-subtitle">No worries! Enter your email and we'll send you reset instructions.</p>

            <?php if (!empty($message)): ?>
                <div class="alert-box <?php echo htmlspecialchars($message_type); ?>">
                    <i class="fa-solid <?php echo $message_type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation'; ?>"></i>
                    <span><?php echo $message; ?></span>
                </div>
            <?php endif; ?>

            <?php if ($message_type !== 'success'): ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-envelope"></i>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-input" 
                                placeholder="you@example.com" 
                                value="<?php echo $email_prefill; ?>"
                                required 
                                autofocus
                            >
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-paper-plane"></i>
                        Send Reset Link
                    </button>
                </form>
            <?php else: ?>
                <a href="/" class="btn-primary">
                    <i class="fa-solid fa-house"></i>
                    Back to Home
                </a>
            <?php endif; ?>

            <div class="auth-footer">
                Remembered your password? <a href="/index.php">Login here</a>
            </div>
        </div>
    </div>

</body>
</html>