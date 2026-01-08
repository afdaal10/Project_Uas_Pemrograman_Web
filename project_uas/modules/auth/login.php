<?php
// Logika Login
$error = "";
if (isset($_POST['submit'])) {
    $login = $auth->login($_POST['username'], $_POST['password']);
    if ($login !== true) {
        $error = $login;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nexus Inventory</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --nexus-gradient: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
            --nexus-blue: #4361ee;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--nexus-gradient);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        .login-card {
            background: white;
            border-radius: 30px;
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            border: none;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            background: var(--nexus-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: 2px;
            display: inline-block;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            margin-left: 5px;
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #f1f3f5;
            border-right: none;
            border-radius: 15px 0 0 15px;
            color: var(--nexus-blue);
        }

        .form-control {
            border: 2px solid #f1f3f5;
            border-radius: 0 15px 15px 0;
            padding: 12px;
            background: #f8f9fa;
        }

        .form-control:focus {
            background: white;
            border-color: var(--nexus-blue);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        /* Tombol LOG IN */
        .btn-nexus {
            background: var(--nexus-gradient);
            border: none;
            border-radius: 15px;
            padding: 14px;
            color: white;
            font-weight: 700;
            letter-spacing: 1px;
            width: 100%;
            margin-top: 10px;
            transition: 0.4s;
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }

        .btn-nexus:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.5);
            color: white;
        }

        .circle-deco {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
        }
    </style>
</head>
<body>

    <div class="circle-deco" style="width: 400px; height: 400px; top: -150px; left: -150px;"></div>
    <div class="circle-deco" style="width: 300px; height: 300px; bottom: -100px; right: -100px;"></div>

    <div class="login-card text-center">
        <div class="mb-4">
            <div class="brand-logo text-uppercase">
                <i class="bi bi-box-seam-fill me-2"></i>Nexus
            </div>
            <p class="text-muted small">Inventory Management System</p>
        </div>

        <h4 class="fw-bold text-dark mb-4">Selamat Datang</h4>

        <?php if($error != ""): ?>
            <div class="alert alert-danger border-0 small py-2 mb-4" role="alert" style="border-radius: 12px; background: #fff5f5; color: #e03131;">
                <i class="bi bi-exclamation-circle-fill me-2"></i><?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3 text-start">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="admin" required>
                </div>
            </div>

            <div class="mb-4 text-start">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="••••••" required>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-nexus text-uppercase">
                LOG IN <i class="bi bi-arrow-right-short ms-1"></i>
            </button>
        </form>

        <div class="mt-5">
            <p class="text-muted" style="font-size: 0.75rem;">
                &copy; 2026 Project UAS - Universitas Pelita Bangsa
            </p>
        </div>
    </div>

</body>
</html>