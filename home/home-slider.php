<?php 
    $args = array(
        'category_name'  => 'slider',
        'posts_per_page' => 6,
        'post_type'      => 'post'
    );
	$args2 = array(
        'category_name'  => 'nota-slider',
        'posts_per_page' => 1,
        'post_type'      => 'post'
    );
?>
<div class="content-slider">
	<div class="slider-md visible-md visible-lg">
        <div class="cycle-slideshow col-md-9" data-cycle-timeout="5000" data-cycle-pager=".nav-pager" data-cycle-slides="> div">
            <?php
			wp_reset_query();
            $query = new WP_Query($args);
            while ($query->have_posts()){ 
            $query->the_post();
            $query->in_the_loop = true; ?>
                <div class="item-slider">
                    <?php 
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full'); 
                        $img_data = get_bloginfo('template_url')."/timthumb.php?&q=100&src=".$large_image_url[0]."&w=781&h=375";
                    ?>
                    <?php if (!empty($large_image_url)) { ?>
                        <img alt="<?php the_title(); ?>" class="img-full" src="<?php echo $img_data ?>">
                    <?php } ?>
                </div>
            <?php } wp_reset_query(); ?>    
        </div>
        <div class="col-md-3">
        	<?php
			wp_reset_query();
            $query = new WP_Query($args2);
            while ($query->have_posts()){ 
            $query->the_post(); ?>
                <!--<span class="pleka-1"></span>-->
              	<?php the_content(); ?>
                <a class="title-name" href="#<?php //the_permalink(); ?>">Leer más</a> 
            <?php } wp_reset_query(); ?>
        </div>
        <div class="nav-pager"></div>
    </div>
    <div class="slider-xs hidden-md hidden-lg">
    	<div class="col-xs-12">
            <?php
			wp_reset_query();
            $query = new WP_Query($args2);
            while ($query->have_posts()){ 
            $query->the_post(); ?>
                <?php the_content(); ?>
                <a class="title-name" href="#<?php //the_permalink(); ?>">Leer más</a>   
            <?php } wp_reset_query(); ?>
            <div class="nav-pager hidden-xs"></div>
        </div>	
        <div class="cycle-slideshow col-xs-12" data-cycle-timeout="5000" data-cycle-slides="> div">
            <?php
            $query = new WP_Query($args);
            while ($query->have_posts()){ 
            $query->the_post();
            $query->in_the_loop = true; ?>
                <div class="item-slider">
                    <?php 
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full'); 
                        $img_data = get_bloginfo('template_url')."/timthumb.php?&q=100&src=".$large_image_url[0]."&w=781&h=375";
                    ?>
                    <?php if (!empty($large_image_url)) { ?>
                        <img alt="<?php the_title(); ?>" class="img-full" src="<?php echo $img_data ?>">
                    <?php } ?>
                </div>
            <?php } wp_reset_query(); ?>    
        </div>
    </div>
    <div class="clearfix"></div>
    
</div>
