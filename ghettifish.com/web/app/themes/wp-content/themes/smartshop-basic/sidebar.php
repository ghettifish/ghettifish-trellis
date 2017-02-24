<div class="sidebar">
    <ul>
        <?php
        if (class_exists('Easy_Digital_Downloads')) {
            if (is_page('checkout')) {
            echo '<li class="widget edd-cart-widget">';
            echo '<h3 class="widget_title">'._e('Shopping Cart','smartshop').'</h3>';
            echo edd_shopping_cart();
            echo '</li>';
        }
        }

        if (is_active_sidebar('sidebar_right')) {
            dynamic_sidebar('sidebar_right');
        }

        if (class_exists('Easy_Digital_Downloads')) {
        if (!is_active_sidebar('sidebar_right') && !is_page('checkout')) {
            echo '<li class="widget edd-cart-widget">';
            echo '<h3 class="widget_title">'._e('Shopping Cart','smartshop').'</h3>';
            echo edd_shopping_cart();
            echo '</li>';
        }
        }
        ?>
    </ul>
</div>