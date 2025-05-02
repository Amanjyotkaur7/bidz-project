<?php $__env->startSection('content'); ?>
<style>
    body {
        background-color: #000;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        background: #111;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
        padding: 40px;
        max-width: 420px;
        width: 100%;
    }

    .form-control {
        background-color: #1a1a1a;
        border: 1px solid #333;
        color: #fff;
    }

    .form-control::placeholder {
        color: #888;
    }

    .form-control:focus {
        border-color: #555;
        background-color: #1f1f1f;
        color: #fff;
        box-shadow: none;
    }

    .btn-login {
        background: #fff;
        color: #000;
        font-weight: bold;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .btn-login:hover {
        background: #e0e0e0;
    }

    .text-subtle {
        color: #aaa;
    }

    .invalid-feedback {
        color: #ff4d4d;
    }
</style>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="login-container">
    <div class="text-center mb-4">
    <div class="d-flex justify-content-center align-items-center gap-2">
        <h3 class="fw-bold text-white mb-0">Login to Bidz</h3>
        <img src="<?php echo e(asset('images/bid.png')); ?>" alt="logo" width="40" style="margin-left: 4px;">
    </div>
    <p class="text-subtle mb-0 mt-2">Bet you can.</p>
</div>


        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="username" class="form-label text-white">Username</label>
                <input id="username" type="text" 
                    class="form-control  <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    name="username" value="<?php echo e(old('username')); ?>" required autofocus 
                    placeholder="Username">
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
                <label for="password" class="form-label text-white">Password</label>
                <input id="password" type="password" 
                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    name="password" required placeholder="Password">
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

            <div class="d-grid">
                <button type="submit" class="btn btn-login w-100" >
                    <?php echo e(__('Login')); ?>

                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cricket 24\Online-Auction-System--php-laravel-master\Online-Auction-System--php-laravel-master\resources\views/auth/login.blade.php ENDPATH**/ ?>