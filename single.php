<?php get_header(); ?>
<div id="main-content">
    <div class="container-fluid sin-padding">
        <div class="col-md-9 col-xs-12 border-bottom">
            <h2 class="titulo_single hidden-xs">
                <?php the_title(); ?>
            </h2>
            <?php 
            while ( have_posts() ) : the_post();
           
                $imagen_destacada = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full' );
                $img = $imagen_destacada[0];
            ?>
            <?php 
                if (empty($img)):
            ?>
                 <!--<img src="<?php bloginfo('template_url'); ?>/images/imagen_single.png" alt="" class="img_destacada_single">-->
            <?php 
                else:
            ?>
                <img class="img_destacada_single" src="<?php echo $img; ?>" />
            <?php 
                endif;
            ?>
            <h2 class="titulo_single  visible-xs">
                <?php the_title(); ?>
            </h2>
            <div class="content_text">
                <div class="col-md-3 hidden-xs ajuste_margenes">
                    <ul class="redes_sociales_single">
                        <li>
                            <a href="#">
                                <span class="tweet_single"></span>
                                <span class="titulo_red">Tweet</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="face_single"></span>
                                <span class="titulo_red">Compartir</span>
                            </a>
                        </li>
                        <div class="separador-redes"></div>
                        <li>
                            <a href="#">
                                <span class="pinte_single"></span>
                                <span class="titulo_red">Pin it</span>
                            </a>
                        </li>
                        <div class="separador-redes"></div>
                        <li>
                            <a href="#">
                                <span class="plus_single"></span>
                                <span class="titulo_red">Compartir</span>
                            </a>
                        </li>
                        <div class="separador-redes"></div>
                    </ul><!--FIN redes_sociales_single-->
                </div>
                <div class="col-md-9 col-xs-12 wrap_content_single">
                <?php 
                        the_content();
                    endwhile;
                ?>
                </div>
            </div>
        </div>
        <!--<div class="col-md-4 col-xs-12">-->
            <?php get_sidebar(); ?>
        <!--</div>-->
    </div>
</div><!-- #main-content -->
<?php get_footer(); ?>