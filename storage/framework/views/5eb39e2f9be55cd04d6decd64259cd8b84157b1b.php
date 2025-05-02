<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-dark border-0 shadow rounded" style="background-color: #1e1e1e;">
                <div class="card-body text-white">
                    <form action="<?php echo e(route('saveSettings')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <?php if(auth()->user()->auto_bid == null): ?>
                            <div class="form-group">
                                <label for="enable" class="text-white">
                                    Do you want to enable AutoBid? <br>
                                    <input type="checkbox" id="enable" name="enable_disable"> <span class="ml-2">Yes</span>
                                </label>
                            </div>
                        <?php else: ?>
                            <p class="mb-1">Do you want to disable AutoBid?</p>
                            <hr style="border-color: #444;">
                            <div class="form-group">
                                <label for="disable" class="text-white">
                                    <input type="checkbox" id="disable" name="enable_disable"> <span class="ml-2">Yes</span>
                                </label>
                            </div>
                        <?php endif; ?>

                        <div class="form-group autoBidField">
                            <label for="auto_bid" class="text-white">Amount</label>
                            <input
                                type="number"
                                class="form-control bg-dark text-white border-secondary"
                                id="auto_bid"
                                name="auto_bid"
                                <?php echo e(auth()->user()->auto_bid == null ? 'disabled' : ''); ?>

                                value="<?php echo e(auth()->user()->auto_bid); ?>">
                            <hr style="border-color: #444;">
                            <button class="btn btn-outline-light" type="submit">Save Changes</button>
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

    if (amountField.value === null || amountField.value === '' || typeof amountField === 'undefined') {
        amountField.disabled = true;
    }

    if (enable !== null && typeof enable !== 'undefined') {
        enable.addEventListener('click', () => {
            amountField.disabled = !amountField.disabled;
        });
    }

    let oldVal = amountField.value;

    if (disable !== null && typeof disable !== 'undefined') {
        disable.addEventListener('click', () => {
            if (amountField.disabled === true) {
                amountField.disabled = false;
                amountField.value = oldVal;
            } else {
                amountField.disabled = true;
                amountField.value = null;
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cricket 24\Online-Auction-System--php-laravel-master\Online-Auction-System--php-laravel-master\resources\views/settings.blade.php ENDPATH**/ ?>