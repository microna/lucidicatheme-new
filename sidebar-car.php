<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

echo '<aside="secondary" class="widget-area">';
dynamic_sidebar('car-sidebar');
echo '</aside>';