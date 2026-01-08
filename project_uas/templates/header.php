<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXUS INVENTORY - Project UAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #4361ee;
            --gradient-blue: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
        }
        
        body { 
            background-color: #f3f6fd; 
            font-family: 'Poppins', sans-serif; 
        }
        
        /* Navbar Custom Nexus */
        .navbar-custom { 
            background: var(--gradient-blue); 
            border-radius: 15px; 
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.15); 
            padding: 12px 20px;
            border: none;
        }
        
        .navbar-brand { 
            font-weight: 800; 
            color: white !important; 
            font-size: 1.4rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav-link { 
            color: rgba(255,255,255,0.9) !important; 
            font-weight: 500; 
            margin-left: 10px; 
            border-radius: 8px; 
            transition: 0.3s; 
        }
        
        .nav-link:hover { 
            background: rgba(255,255,255,0.2); 
            color: white !important; 
            transform: translateY(-2px);
        }

        /* User Badge */
        .user-badge {
            background: rgba(255,255,255,0.2); 
            border-radius: 30px; 
            padding: 5px 15px;
            color: white;
            font-size: 0.9rem;
        }

        .logout-btn {
            color: #ffeb3b !important; /* Warna kuning agar kontras untuk logout */
            font-weight: 700;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        
        <?php if(isset($_SESSION['is_login'])): ?>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/PROJECT_UAS/home">
                    <i class="bi bi-box-seam-fill me-2"></i>NEXUS INVENTORY
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="/PROJECT_UAS/home">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/PROJECT_UAS/barang">
                                <i class="bi bi-box me-1"></i> Data Barang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/PROJECT_UAS/about">
                                <i class="bi bi-person-badge me-1"></i> About
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-3">
                            <span class="user-badge">
                                <i class="bi bi-person-circle me-2"></i>Hi, <?= ucfirst($_SESSION['username']); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout-btn" href="/PROJECT_UAS/logout">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php endif; ?>
        
        <div class="content fade-in">