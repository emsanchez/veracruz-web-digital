<?php get_header(); ?>
<style type="text/css">
    html{ overflow-y: initial; }
</style>
<div id="main-content">
    <!--<h3>Loop de prueba de categoria multimedia - Ejemplo de lightbox con Post de WP</h3>
    <?php   
    //$args = array( 'category_name'=>'noticias', 'posts_per_page'=>6, 'post_type'=>'post', 'order'=>'ASC' ); ?>
    <p>Note: uses modal plugin title option via <code>data-title</code>, and the custom footer tag using <code>data-footer</code></p>
        <div class="col-sm-offset-2 col-sm-8">-->
    <?php
        $query = new WP_Query($args);
        while ($query->have_posts()){
            $query->the_post();            
            /*$category = get_cat_slug_by_id($post->ID);

            if( $category == "nota" || $category == "infografia" ){
                //imagen
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                $img_data = $large_image_url[0];
                echo '<a href="'.$img_data.'" data-toggle="lightbox" class="col-sm-4 '.$category.'" data-category="'.$category.'" ';
                echo 'data-title="Es importante que tomemos en cuenta las siguientes recomendaciones para el uso de WhatsApp."';
                echo 'data-permalink="'.get_permalink($post->ID).'" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="'.$img_data.'">';
                echo '<img src="'.$img_data.'" class="img-responsive">';
                echo '</a>';
            }else if( $category == "video"){
                //video
                $link = get_post_meta($post->ID, 'youtube-link' , true);
                echo '<a href="http://youtu.be/'.$link.'" data-toggle="lightbox" style="background-color:#000;height:20px;"  class="col-sm-4 '.$category.'" ';
                echo 'data-title="Es importante que tomemos en cuenta las siguientes recomendaciones para el uso de WhatsApp." data-media="http://youtu.be/'.$link.'" ';
                echo 'data-permalink="'.get_permalink($post->ID).'" data-category="'.$category.'" data-gallery="gallery" data-excerpt="http://youtu.be/'.$link.'">';
                echo '<img src="//i1.ytimg.com/vi/'.$link.'/mqdefault.jpg" class="img-responsive">';
                echo '</a>';
            }*/
    ?>
    <?php } ?>
    
    <!--</div>-->

</div><!-- #main-content -->
<script type="text/javascript">
    /*$(document).ready(function ($){
        //delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onContentLoaded: function (e){
                    if (window.console) {
                        //console.log('this', this);
                        var category = this.options.category;
                        //console.log('category', category);
                        var selector;
                        if( category == 'video'){
                            selector = ".lightbox-video-footer";
                        }else{
                            selector = ".lightbox-img-header";
                            //Reajustar tamano de dialog
                            var widthHeader = this.widthHeader.width();
                            var dialog = $('div.ekko-lightbox .modal-dialog');
                            var widthDialog = dialog.width();
                            var widthNew = widthHeader + widthDialog;
                            dialog.css('max-width', widthNew);
                        }
                        //console.log('onContentLoaded');
                    }
                }
            });
        });
    });*/
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
