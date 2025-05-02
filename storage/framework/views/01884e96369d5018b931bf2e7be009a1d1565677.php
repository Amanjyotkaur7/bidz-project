<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Item Header Card -->
    <div class="card shadow-sm border-0 mb-4 overflow-hidden">
        <div class="row g-0">
            <!-- Cover Image -->
            <div class="col-lg-6 position-relative">
                <div class="item-cover ratio ratio-16x9">
                    <img src="<?php echo e(asset($item->thumbnail)); ?>" class="img-fluid rounded-start object-fit-cover" alt="<?php echo e($item->name); ?>" style="width: 573px; height: 327.8px;">
                </div>
            </div>
            
            <!-- Item Details -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="card-body d-flex flex-column h-100 p-4">
                    <div>
                        <h3 class="card-title fw-bold mb-2"><?php echo e($item->name); ?></h3>
                        <p class="text-muted mb-4"><?php echo e($item->description); ?></p>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="p-3 bg-light rounded-3">
                            <div class="text-muted mb-1 small">Auction Period</div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-calendar-event me-2 text-primary"></i>
                                <span class="fw-medium"><?php echo e(date('d M Y', strtotime($item->created_at))); ?> - <?php echo e(date('d M Y', strtotime($item->expires_at))); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Bidding Form Column -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold">Place Your Bid</h5>
                </div>
                <div class="card-body p-4">
                <?php if(!lastBidder($item)): ?>
                    <div class="text-center mb-4">
                        <?php
                            $lastBid = $bids->first();
                        ?>

                        <?php if($lastBid): ?>
                            <div class="display-4 fw-bold text-primary mb-2">₹<?php echo e(number_format($lastBid->bid_amount)); ?></div>
                            <p class="text-muted">Current highest bid</p>
                        <?php else: ?>
                            <div class="display-4 fw-bold text-primary mb-2">₹<?php echo e(number_format($item->minimal_bid)); ?></div>
                            <p class="text-muted">Minimum bid amount</p>
                        <?php endif; ?>
                    </div>

                        <form id="bidForm" action="<?php echo e(route('submitBid', $item->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label for="bid" class="form-label">Your bid amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control form-control-lg" id="bid" name="bid" placeholder="Enter your bid" min="<?php echo e($item->minimal_bid); ?>">
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg fw-medium">Submit Bid</button>
                                
                                <form id="autoBidForm" action="<?php echo e(route('autobid', $item->id)); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                                
                                <button type="button" onclick="document.querySelector('#autoBidForm').submit()" 
                                        class="btn btn-outline-secondary">
                                    <i class="bi bi-lightning-charge me-1"></i>
                                    <?php echo e($item->autoBid()->where('user_id', auth()->user()->id)->count() > 0 ? 'Disable AutoBid' : 'Enable AutoBid'); ?>

                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-success border-0 rounded-3 p-4 text-center">
                            <i class="bi bi-trophy fs-1 mb-3 d-block"></i>
                            <h5 class="mb-2">You're the Highest Bidder!</h5>
                            <p class="mb-0 text-muted">You're currently leading this auction. Good luck!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Bidding History Column -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Bidding History</h5>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><?php echo e(count($bids)); ?> bids</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Bidder</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter => $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="ps-4"><?php echo e(++$counter); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span><?php echo e($bid->user->name); ?></span>
                                            </div>
                                        </td>
                                        <td class="fw-bold text-primary">₹<?php echo e(number_format($bid->bid_amount)); ?></td>
                                        <td class="text-muted"><?php echo e($bid->created_at->diffForHumans()); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="bi bi-hourglass fs-2 mb-2 d-block opacity-50"></i>
                                            No bids have been placed yet.
                                            <p class="small mb-0 mt-1">Be the first to bid on this item!</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Additional custom styles */
    body {
        background-color: #f8f9fa;
    }
    
    .item-cover img {
        height: 100%;
        object-fit: cover;
    }
    
    .card {
        border-radius: 12px;
    }
    
    .card-header {
        border-top-left-radius: 12px !important;
        border-top-right-radius: 12px !important;
    }
    
    .table th {
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    /* Add Bootstrap Icons if not already included in your project */
    @import  url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css");
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Any additional JavaScript can go here
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cricket 24\Bidz\resources\views/details.blade.php ENDPATH**/ ?>