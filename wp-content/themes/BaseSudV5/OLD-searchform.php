<?php
/* 
* search form
*/
?>

<form role="search" <?php $aria_label ?> method="get" id="searchform" class="searchform" action="<?php esc_url( home_url( '/' ) ) ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ) ?></label>
		<input type="text" value="<?php get_search_query() ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="<?php esc_attr_x( 'Search', 'submit button' ) ?>" />
	</div>
</form>