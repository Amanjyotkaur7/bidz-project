<?php $__env->startSection('content'); ?>
<style>
    body {
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        font-family: 'Inter', 'Segoe UI', sans-serif;
        min-height: 100vh;
    }

    .login-container {
        background: rgba(23, 23, 32, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), 
                    0 1px 2px rgba(255, 255, 255, 0.05) inset;
        padding: 40px;
        max-width: 440px;
        width: 100%;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-container {
        position: relative;
        margin-bottom: 2rem;
    }

    .logo-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 50%;
        filter: blur(25px);
        opacity: 0.6;
        z-index: -1;
    }

    .brand-title {
        font-weight: 800;
        letter-spacing: -0.5px;
        background: linear-gradient(135deg, #fff, #d4d4ff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .tagline {
        color: #a5b4fc;
        font-weight: 500;
        letter-spacing: 0.2px;
    }

    .form-control {
        background-color: rgba(30, 30, 45, 0.7);
        border: 1px solid rgba(107, 114, 255, 0.3);
        border-radius: 12px;
        color: #fff;
        padding: 12px 16px;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .form-control:focus {
        border-color: #818cf8;
        background-color: rgba(35, 35, 55, 0.9);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        color: #e0e7ff;
        letter-spacing: 0.3px;
        font-size: 14px;
    }

    .btn-login {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 12px;
        padding: 12px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        font-size: 16px;
        letter-spacing: 0.5px;
    }

    .btn-login:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: all 0.6s ease;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }

    .btn-login:hover:before {
        left: 100%;
    }

    .invalid-feedback {
        color: #fb7185;
        font-size: 13px;
        margin-top: 5px;
    }
    
    @media (max-width: 576px) {
        .login-container {
            padding: 30px 20px;
            margin: 0 15px;
            border-radius: 16px;
        }
    }
</style>

<div class="container d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="login-container">
        <div class="text-center logo-container">
            <div class="logo-glow"></div>
            <div class="d-flex justify-content-center align-items-center gap-2 mb-1">
                <h2 class="brand-title mb-0">Bidz</h2>
                <img src="<?php echo e(asset('images/bid.png')); ?>" alt="logo" width="32" class="ms-1">
            </div>
            <p class="tagline mt-2">Bet you can.</p>
        </div>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" 
                    class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    name="username" value="<?php echo e(old('username')); ?>" required autofocus 
                    placeholder="Enter your username">
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" 
                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    name="password" required placeholder="Enter your password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login py-3">
                    Sign In
                </button>
            </div>
            
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Downloads\Bidz\Bidz\resources\views/auth/login.blade.php ENDPATH**/ ?>