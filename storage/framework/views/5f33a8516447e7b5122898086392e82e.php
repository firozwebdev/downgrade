<?php if($allsettings->maintenance_mode == 1): ?>
<?php if(Auth::check()): ?>
<?php if(Auth::user()->id == 1): ?>
<?php echo $__env->make('pages.item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php else: ?>
<?php echo $__env->make('pages.item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/item.blade.php ENDPATH**/ ?>