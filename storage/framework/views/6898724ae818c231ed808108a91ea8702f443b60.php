<?php $__env->startSection('content'); ?>
<style>
    body {
        background: #f8f9fa;
        font-family: 'Inter', 'Segoe UI', sans-serif;
        color: #fff;
    }
    
    .page-container {
        padding-top: 3rem;
        padding-bottom: 5rem;
    }
    
    .page-title {
        font-weight: 800;
        font-size: 2.5rem;
        letter-spacing: -0.5px;
        background: linear-gradient(135deg, #fff, #d4d4ff);
        -webkit-background-clip: text;
        background-clip: text;
        color: #6366F1;
        margin-bottom: 2rem;
        position: relative;
    }
    
    .page-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        height: 4px;
        width: 80px;
        background: linear-gradient(90deg, #6366f1, #8b5cf6);
        border-radius: 2px;
    }
    
    .alert-success {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.2));
        border: none;
        backdrop-filter: blur(10px);
        color: #10b981;
        border-left: 4px solid #10b981;
        padding: 1rem 1.5rem;
        border-radius: 8px;
    }
    
    .filter-card {
        background: rgba(-203, 51, 239, 0.3);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .sort-text {
        color: rgba(74, 27, 244, 0.8);
        margin-bottom: 0;
        font-size: 0.95rem;
    }
    
    .btn-filter {
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.5);
        color: rgba(74, 27, 244, 0.8);
        border-radius: 10px;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .btn-filter:hover {
        background: rgba(99, 102, 241, 0.2);
        border-color: rgba(99, 102, 241, 0.5);
        color: #e0e7ff;
    }
    
    /* Updated Card Styling */
    .item-card {
        position: relative;
        border-radius: 12px; /* Less rounded corners */
        overflow: hidden;
        height: 100%;
        transform: translateY(0);
        transition: all 0.3s ease;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
    }
    
    .item-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px rgba(99, 102, 241, 0.2);
    }
    
    .item-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, 
            rgba(23, 23, 32, 0) 0%, 
            rgba(23, 23, 32, 0.8) 70%, 
            rgba(23, 23, 32, 0.95) 100%);
        z-index: 1;
    }
    
    .item-card:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to right, 
            rgba(99, 102, 241, 0.15), 
            rgba(139, 92, 246, 0.15));
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .item-card:hover:after {
        opacity: 1;
    }
    
    .item-thumbnail {
        height: 380px; /* Increased height */
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .item-card:hover .item-thumbnail {
        transform: scale(1.05);
    }
    
    .card-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5rem;
        z-index: 2;
    }
    
    .item-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #fff;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .item-stats {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1.2rem;
    }
    
    .item-stat {
        display: flex;
        align-items: center;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
        padding: 0.4rem 0.8rem;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
        border-radius: 6px; /* Less rounded corners */
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .item-stat svg {
        margin-right: 0.5rem;
        filter: drop-shadow(0 2px 3px rgba(0, 0, 0, 0.2));
    }
    
    .badge-min-bid {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(139, 92, 246, 0.2));
        border: 1px solid rgba(99, 102, 241, 0.3);
    }
    
    .badge-total-bids {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.2), rgba(217, 70, 239, 0.2));
        border: 1px solid rgba(236, 72, 153, 0.3);
    }
    
    .btn-bid-now {
        width: 100%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 8px; /* Less rounded corners */
        padding: 0.8rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 2;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 1rem;
    }
    
    .btn-bid-now:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
    }
    
    .btn-bid-now:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: all 0.6s ease;
    }
    
    .btn-bid-now:hover:before {
        left: 100%;
    }
    
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
        background: rgba(30, 30, 45, 0.4);
        border-radius: 12px; /* Less rounded corners */
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .empty-state-title {
        font-size: 1.5rem;
        color: #fb7185;
        font-weight: 600;
    }
    
    .pagination {
        margin-top: 2rem;
        justify-content: center;
    }
    
    .page-link {
        background: rgba(30, 30, 45, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #a5b4fc;
        margin: 0 3px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .page-link:hover {
        background: rgba(99, 102, 241, 0.1);
        border-color: rgba(99, 102, 241, 0.3);
        color: #e0e7ff;
    }
    
    .page-item.active .page-link {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-color: transparent;
        color: white;
    }
    
    .page-item.disabled .page-link {
        background: rgba(30, 30, 45, 0.2);
        border-color: rgba(255, 255, 255, 0.05);
        color: #6b7280;
    }
    
    @media (max-width: 767px) {
        .page-title {
            font-size: 2rem;
        }
        
        .sort-container {
            flex-direction: column;
            align-items: flex-start !important;
        }
        
        .sort-text-container {
            margin-bottom: 1rem;
        }
        
        .btn-filter-container {
            width: 100%;
            justify-content: flex-start !important;
        }
        
        .btn-filter {
            width: 100%;
            justify-content: center;
        }
        
        .item-thumbnail {
            height: 300px;
        }
    }
</style>

<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if(session('status')): ?>
                <div class="alert alert-success mb-4" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <h1 class="page-title text-center">Discover Auctions</h1>

            <div class="filter-card">
                <div class="row sort-container d-flex align-items-center">
                    <div class="col-md-8 sort-text-container">
                        <p class="sort-text">
                            <i class="bi bi-arrow-<?php echo e(request('order') == 'asc' ? 'up' : 'down'); ?>-circle me-2"></i>
                            <?php echo e(request('order') == 'asc' ? 'Sorted price from lower to higher' : 'Sorted price from higher to lower'); ?>

                        </p>
                    </div>
                    <div class="col-md-4 btn-filter-container d-flex justify-content-end">
                        <form action="<?php echo e(route('dashboard')); ?>" method="GET">
                            <input type="hidden" name="order" value="<?php echo e(request('order') == 'desc' ? 'asc' : 'desc'); ?>">
                            <?php if(request('page')): ?>
                                <input type="hidden" name="page" value="<?php echo e(request('page')); ?>">
                            <?php endif; ?>
                            <?php if(request('search_term')): ?>
                                <input type="hidden" name="search_term" value="<?php echo e(request('search_term')); ?>">
                            <?php endif; ?>
                            <button class="btn btn-filter" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-filter me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                Sort by Price
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 mb-3"><!-- Changed to col-md-6 for 2 cards per row -->
                        <div class="item-card">
                            <img class="item-thumbnail" src="<?php echo e(asset($item->thumbnail)); ?>" alt="<?php echo e($item->name); ?>">
                            <div class="card-content">
                                <h5 class="item-title"><?php echo e($item->name); ?></h5>
                                <div class="item-stats">
                                    <div class="item-stat badge-min-bid">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
  <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"/>
</svg>
                                        <?php echo e($item->minimal_bid); ?>

                                    </div>
                                    <div class="item-stat badge-total-bids">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                        <?php echo e($item->bids()->count()); ?> Bids
                                    </div>
                                </div>
                                <a href="<?php echo e(route('item.show', ['item' => $item->id])); ?>"
                                   class="btn btn-bid-now">Bid Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <div class="empty-state">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#fb7185" class="bi bi-search mb-3" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            <h3 class="empty-state-title">No Items Found</h3>
                            <p class="text-muted mt-2">Try adjusting your search or filter criteria</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="pagination-container">
                <?php echo e($items->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cricket 24\Bidz\resources\views/home.blade.php ENDPATH**/ ?>