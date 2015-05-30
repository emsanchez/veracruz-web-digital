<?php get_header(); ?>
<div id="main-content">
    <h3>Loop de prueba de categoria multimedia - Ejemplo de lightbox con Post de WP</h3>
    <?php   
    $args = array( 'category_name'=>'noticias', 'posts_per_page'=>6, 'post_type'=>'post', 'order'=>'ASC' ); ?>
    <p>Note: uses modal plugin title option via <code>data-title</code>, and the custom footer tag using <code>data-footer</code></p>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-3">
    <?php
        $query = new WP_Query($args);
        while ($query->have_posts()){
            $query->the_post();            
            $category = get_cat_slug_by_id($post->ID);
            //the_title();
            //the_content();
            //the_excerpt();
            /* Notas:
            1.- En el caso de la infografía y la nota se debe visualizar la imagen destacada y el extracto
            2.- En el caso del video debe ser un custom meta en post */
            //Codigo para custom meta en post
            if( $category == "nota" || $category == "infografia" ){
                //imagen
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                $img_data = $large_image_url[0];
                echo '<a href="'.$img_data.'" data-toggle="lightbox" data-gallery="multiimages" class="col-sm-4 '.$category.'">';
                echo '<img src="'.$img_data.'" class="img-responsive">';
                echo '</a>';
            }else if( $category == "video"){
                //video
                $link = get_post_meta($post->ID, 'youtube-link' , true);
                echo '<a href="http://youtu.be/'.$link.'" data-toggle="lightbox" data-gallery="multiimages" class="col-sm-4 '.$category.'">';
                echo '<img src="//i1.ytimg.com/vi/'.$link.'/mqdefault.jpg" class="img-responsive">';
                echo '</a>';
                /*<div class="iframe-video hidden-more-600">
                    <iframe src="//www.youtube.com/embed/<?php echo $link; ?>?controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>*/
            }
    ?>
    <?php }?>
        </div>
    </div>

</div><!-- #main-content -->
<script type="text/javascript">
    $(document).ready(function ($){
        //delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    if (window.console) {
                        console.log('this', this );
                        return console.log('Checking our the events huh?');
                    }
                },
                onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
                },
                onShow: function (e){
                    if (window.console) {
                        console.log('e', e);
                        console.log('onShow');
                    }
                },
                onHide: function (e){
                    if (window.console) {
                        console.log('e', e);
                        console.log('onHide');
                    }
                },
                onHidden: function (e){
                    if (window.console) {
                        console.log('onHidden');
                    }
                },
                onNavigate: function (e){
                    if (window.console) {
                        console.log('e', e);
                        console.log('onNavigate');
                    }
                },
                onContentLoaded: function (e){
                    if (window.console) {
                        console.log('onContentLoaded');
                    }
                }
            });
        });
    });
</script>
<?php get_footer(); ?>
