<!-- Sidebar
============================================= -->
<div class="sidebar nobottommargin col_last">
    <div class="sidebar-widgets-wrap">
        <?php
            if( is_active_sidebar( 'fz_sidebar' ) ) {
                dynamic_sidebar( 'fz_sidebar' );
            }
        ?>
    </div>
</div><!-- .sidebar end -->