<?php 
	wp_reset_query();
    $args = array(
        'category_name'  => 'slider',
        'posts_per_page' => 6,
        'post_type'      => 'post'
    );
?>
<div class="content-slider">
	<div class="slider-md visible-md visible-lg">
        <div class="cycle-slideshow col-md-9" data-cycle-timeout="5000" data-cycle-pager=".nav-pager" data-cycle-slides="> div">
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
        <div class="col-md-3">
            <p>
                <span class="pleka-1"></span>Las redes sociales, sin duda, han conseguido enlazar a las personas
                de una forma novedosa y eficaz, pero existe también una serie de amenazas 
                a las que tenemos que hacer frente para evitar cualquier daño o situación 
                peligrosa<span class="pleka-2"></span>
            </p>
            <p class="text-right title-name">Karime</p>
            <div class="nav-pager"></div>
        </div>
    </div>
    <div class="slider-xs hidden-md hidden-lg">
    	<div class="col-xs-12">
            <p>
                <span class="pleka-1"></span>Las redes sociales, sin duda, han conseguido enlazar a las personas
                de una forma novedosa y eficaz, pero existe también una serie de amenazas 
                a las que tenemos que hacer frente para evitar cualquier daño o situación 
                peligrosa<span class="pleka-2"></span>
            </p>
            <p class="text-right title-name">Karime</p>
            <div class="nav-pager"></div>
        </div>	
        <div class="cycle-slideshow col-xs-12" data-cycle-timeout="5000" data-cycle-pager=".nav-pager" data-cycle-slides="> div">
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
