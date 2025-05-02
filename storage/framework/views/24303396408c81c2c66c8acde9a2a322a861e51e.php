<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="cover__image">
                            <img src="<?php echo e(asset($item->thumbnail)); ?>" alt="">

                            <div class="cover__profile">
                                <img src="<?php echo e(asset($item->thumbnail)); ?>" alt="">
                            </div>

                            <div class="cover__desc">
                                <h5 class="card-title item-title"><?php echo e($item->name); ?></h5>
                                <h4><?php echo e($item->description); ?></h4>
                                <div class="dates d-flex justify-content-end">
                                    Start - <?php echo e(date('d/m/Y H:i', strtotime($item->created_at))); ?> <br>
                                    Ends - <?php echo e(date('d/m/Y H:i', strtotime($item->expires_at))); ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4 px-4 pb-4" style="margin-top: 150px; border-radius: 15px; background: linear-gradient(135deg, #2f2f2f, #1c1c1c); box-shadow: 0 6px 16px rgba(0, 0, 0, 0.6); color: #f1f1f1;">
    <div class="col-lg-12">
        <?php if(!lastBidder($item)): ?>
            <div class="form-wrapper mb-4">
                <form id="bidForm" action="<?php echo e(route('submitBid', $item->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="bid">
                            <b class="d-block mb-0 text-light" style="font-size: 1.2rem;">Enter your bid amount</b>
                            <small class="d-block text-muted mt-0 mb-2" style="font-size: 1rem;">Minimum bid amount is <strong>₹<?php echo e(number_format($item->minimal_bid)); ?></strong></small>
                            <input type="number" class="form-control form-control-sm w-50 bg-dark text-white border-secondary" id="bid" name="bid" placeholder="e.g. 5000">
                        </label>
                    </div>
                </form>

                <form id="autoBidForm" action="<?php echo e(route('autobid', $item->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                </form>

                <div class="d-flex gap-3 mt-3"> 
                    <button class="btn btn-sm" style="background: #444; color: #fff; border: 1px solid #555;" onclick="document.querySelector('#bidForm').submit()">Submit Bid</button>
                    <button class="btn btn-sm" style="background: transparent; color: #ccc; border: 1px solid #666;" onclick="document.querySelector('#autoBidForm').submit()">
                        <?php echo e($item->autoBid()->where('user_id', auth()->user()->id)->count() > 0 ? 'Disable AutoBid' : 'Enable AutoBid'); ?>

                    </button>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center fw-semibold bg-dark text-light border border-secondary">
                You are currently the highest bidder! You cannot bid again.
            </div>
        <?php endif; ?>

        <div class="card mt-4" style="background: linear-gradient(to bottom, #1e1e1e, #121212); border: 1px solid #2c2c2c; color: #f8f9fa;">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #111; border-bottom: 1px solid #333;">
                <h5 class="mb-0 text-white">Bidding History</h5>
                <span class="badge bg-secondary text-light" style="font-size: 1rem; padding: 6px 12px;"><?php echo e(count($bids)); ?> bids</span>
            </div>
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 text-white">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Bidder Name</th>
                            <th>Bid Amount</th>
                            <th>Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter => $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(++$counter); ?></td>
                                <td><?php echo e($bid->user->name); ?></td>
                                <td><strong>₹<?php echo e(number_format($bid->bid_amount)); ?></strong></td>
                                <td><?php echo e($bid->created_at->diffForHumans()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No bids submitted yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cricket 24\Online-Auction-System--php-laravel-master\Online-Auction-System--php-laravel-master\resources\views/details.blade.php ENDPATH**/ ?>