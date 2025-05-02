<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/svg+xml+png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Bidz</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Modern Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #10b981;
            --dark: #111827;
            --light: #f9fafb;
            --gray: #6b7280;
            --surface: #ffffff;
            --surface-dark: #f3f4f6;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background-color: var(--light);
            margin: 0;
            padding: 0;
        }
        
        .bidz-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--primary);
            letter-spacing: -0.025em;
        }
        
        .navbar {
            background-color: var(--surface);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 0.75rem 0;
        }
        
        .search-wrapper {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            min-width: 300px;
            max-width: 600px;
        }
        
        .search-input {
            background-color: var(--surface-dark);
            border: none;
            border-radius: 20px; /* Increased from 10px to 20px for more rounded corners */
            padding: 0.5rem 1.25rem; /* Slightly increased horizontal padding */
            transition: all 0.2s ease;
            width: 100%;
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3);
            outline: none;
            border: none;
        }
        
        .nav-link {
            color: var(--gray);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.2s ease;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        .dropdown-menu {
            border: none;
            border-radius: 12px; /* Slightly more rounded dropdown */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 0.75rem 1.25rem;
            transition: background-color 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--surface-dark);
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: 8px; /* Added rounded corners */
        }
        
        .user-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 0.5rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            position: relative;
        }

        .navbar-content {
            display: flex;
            width: 100%;
            align-items: center;
        }

        .navbar-brand-wrapper {
            flex: 1;
        }

        .navbar-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        #notification-icon::after {
            display: none !important;
        }

        @media (max-width: 992px) {
            .search-wrapper {
                position: static;
                transform: none;
                width: 100%;
                margin-top: 1rem;
                order: 3;
                max-width: none;
            }
            
            .navbar-collapse {
                flex-direction: column;
            }
            
            .navbar-content {
                flex-direction: column;
                align-items: stretch;
            }
            
            .navbar-brand-wrapper,
            .navbar-right {
                flex: none;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <?php if(auth()->user()): ?>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div class="navbar-content">
                    <div class="navbar-brand-wrapper">
                        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(url('/')); ?>">
                            <div class="bidz-brand">Bidz</div>
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Search Bar -->
                        <div class="search-wrapper">
                            <form action="<?php echo e(route('dashboard')); ?>" method="GET" id="search-form">
                                <input type="hidden" name="search_term" id="search-term" value="">
                                <?php if(isset($_GET['order'])): ?>
                                    <input type="hidden" name="order" value="<?= $_GET['order'] ?>">
                                <?php endif; ?>
                                <input type="text" class="search-input" id="search-input" name="search" placeholder="Search items...">
                            </form>
                        </div>

                        <!-- Right Side Of Navbar -->
                        <div class="navbar-right">
                            <ul class="navbar-nav ml-auto d-flex align-items-center">
                            <li class="nav-item dropdown mr-3">
                                <a href="#" class="nav-link dropdown-toggle" id="notification-icon" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="notification-icon" id="notification-dropdown">
                                    <!-- Default No new notifications -->
                                    <li><a class="dropdown-item" href="#">No new notifications</a></li>
                                </ul>
                            </li>
                                
                                <!-- Authentication Links -->
                                <?php if(auth()->guard()->guest()): ?>
                                    <?php if(Route::has('login')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <div class="user-avatar">
                                                <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                                            </div>
                                            <span class="d-none d-md-block"><?php echo e(Auth::user()->name); ?></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo e(route('settings')); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                </svg>
                                                Settings
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                                </svg>
                                                <?php echo e(__('Logout')); ?>

                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php endif; ?>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <script>
        const searchInput = document.querySelector('#search-input');
        const searchTerm = document.querySelector('#search-term');
        const searchForm = document.querySelector('#search-form');

        searchInput.addEventListener('keydown', (e) => {
            searchTerm.value = searchInput.value;

            if (e.keyCode === 13) {
                if (searchTerm.value.length > 1) {
                    searchForm.submit();
                }
            }
        });

        document.getElementById('notification-icon').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('notification-dropdown');
        
        // Clear any existing notifications (this can be dynamically updated)
        dropdownMenu.innerHTML = '<li><a class="dropdown-item" href="#">No new notifications</a></li>';
        
        // If you had new notifications, you could append them here
        // Example: dropdownMenu.innerHTML += '<li><a class="dropdown-item" href="#">New Notification</a></li>';
        });
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH D:\Cricket 24\Bidz\resources\views/layouts/app.blade.php ENDPATH**/ ?>