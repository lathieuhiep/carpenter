
<?php if( is_active_sidebar( 'carpenter-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( carpenter_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'carpenter-sidebar-main' ); ?>
    </aside>

<?php endif; ?>