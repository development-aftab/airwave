<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="icon-close right-side-toggler"></i></span> </div>
        <div class="text-center">
            <a class="btn btn-primary m-t-10" href="<?php echo e(route('logout')); ?>">Logout</a>

        </div>
        <div class="r-panel-body">
            <p><b>Layout type</b></p>
            <ul class="layouts">
                <li class="<?php if(session()->get('theme-layout') == 'normal'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('?theme=normal')); ?>">Normal Layout</a></li>
                <li class="<?php if(session()->get('theme-layout') == 'fix-header'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('?theme=fix-header')); ?>">Fixed Header</a></li>
                <li class="<?php if(session()->get('theme-layout') == 'mini-sidebar'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('?theme=mini-sidebar')); ?>">Mini-sidebar</a></li>
            </ul>
            <br>
            <?php if(session()->get('theme-layout') != 'fix-header'): ?>
                <ul class="hidden-xs">
                    <li><b>Layout Options</b></li>
                    <li>
                        <div class="checkbox checkbox-danger">
                            <input id="headcheck" type="checkbox" class="fxhdr">
                            <label for="headcheck"> Fix Header </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox checkbox-warning">
                            <input id="sidecheck" type="checkbox" class="fxsdr">
                            <label for="sidecheck"> Fix Sidebar </label>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>

            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            
            
                
                
                    
                
                
                    
                
                
                    
                
                
                    
                
                
                    
                
                
                    
                
            
        </div>
    </div>
</div><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/layouts/partials/right-sidebar.blade.php ENDPATH**/ ?>