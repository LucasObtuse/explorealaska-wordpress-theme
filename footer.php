 <footer class="site-footer">
        <div class="container">
            <div class="footer-info">
                <p><strong>Explore Alaska</strong> - Your Complete Guide to Alaska Travel</p>
                <p>Discover breathtaking destinations, plan your adventure, and explore the Last Frontier.</p>
            </div>
            
            <div class="footer-links">
                <a href="<?php echo esc_url(home_url('/about')); ?>">About</a>
                <a href="<?php echo esc_url(home_url('/privacy')); ?>">Privacy</a>
                <a href="<?php echo esc_url(home_url('/terms')); ?>">Terms</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
            </div>
            
            <div class="footer-copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
