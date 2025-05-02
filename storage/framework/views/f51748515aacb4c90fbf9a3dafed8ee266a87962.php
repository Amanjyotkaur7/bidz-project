<style>
    .title-color{
        color: rgba(74, 27, 244, 0.8);
    }

    .btn-primary {
        background-color: rgba(74, 27, 244, 0.8);
    }
</style>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- AutoBid Settings Section -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body bg-white text-dark p-4">
                    <h4 class="mb-4 title-color">Auto-bid Settings</h4>
                    <form action="<?php echo e(route('saveSettings')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <?php if(auth()->user()->auto_bid == null): ?>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="enable" name="enable_disable">
                                <label class="form-check-label" for="enable">Enable AutoBid</label>
                            </div>
                        <?php else: ?>
                            <p class="mb-2">Do you want to disable AutoBid?</p>
                            <hr>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="disable" name="enable_disable">
                                <label class="form-check-label" for="disable">Disable AutoBid</label>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3 autoBidField">
                            <label for="auto_bid" class="form-label">AutoBid Amount</label>
                            <input
                                type="number"
                                class="form-control"
                                id="auto_bid"
                                name="auto_bid"
                                <?php echo e(auth()->user()->auto_bid == null ? 'disabled' : ''); ?>

                                value="<?php echo e(auth()->user()->auto_bid); ?>">
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Edit Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body bg-white text-dark p-4">
                    <h4 class="mb-4 title-color">Edit Profile</h4>
                    <form action="<?php echo e(route('updateProfile')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="<?php echo e(auth()->user()->name); ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                value="<?php echo e(auth()->user()->username); ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="<?php echo e(auth()->user()->email); ?>"
                                required>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    const enable = document.querySelector('#enable');
    const disable = document.querySelector('#disable');
    const amountField = document.querySelector('#auto_bid');

    if (!amountField.value || amountField.value === '') {
        amountField.disabled = true;
    }

    if (enable) {
        enable.addEventListener('click', () => {
            amountField.disabled = !amountField.disabled;
        });
    }

    let oldVal = amountField.value;

    if (disable) {
        disable.addEventListener('click', () => {
            if (amountField.disabled) {
                amountField.disabled = false;
                amountField.value = oldVal;
            } else {
                amountField.disabled = true;
                amountField.value = '';
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cricket 24\Bidz\resources\views/settings.blade.php ENDPATH**/ ?>