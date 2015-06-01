<?php get_header(); ?>
<style type="text/css">
    html{ overflow-y: initial; }
</style>
<div id="main-content">
    <h3>Loop de prueba de categoria multimedia - Ejemplo de lightbox con Post de WP</h3>
    <?php   
    $args = array( 'category_name'=>'noticias', 'posts_per_page'=>6, 'post_type'=>'post', 'order'=>'ASC' ); ?>
    <p>Note: uses modal plugin title option via <code>data-title</code>, and the custom footer tag using <code>data-footer</code></p>
        <div class="col-sm-offset-2 col-sm-8">
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
                echo '<a href="'.$img_data.'" data-toggle="lightbox" class="col-sm-4 '.$category.'" data-category="'.$category.'" ';
                echo 'data-title="Es importante que tomemos en cuenta las siguientes recomendaciones para el uso de WhatsApp."';
                echo 'data-permalink="'.get_permalink($post->ID).'" data-gallery="gallery-img" data-excerpt="http://youtu.be/">';
                echo '<img src="'.$img_data.'" class="img-responsive">';
                echo '</a>';
            }else if( $category == "video"){
                //video
                $link = get_post_meta($post->ID, 'youtube-link' , true);
                echo '<a href="http://youtu.be/'.$link.'" data-toggle="lightbox"  class="col-sm-4 '.$category.'" ';
                echo 'data-title="Es importante que tomemos en cuenta las siguientes recomendaciones para el uso de WhatsApp." ';
                echo 'data-permalink="'.get_permalink($post->ID).'" data-category="'.$category.'" data-gallery="gallery-video" data-excerpt="http://youtu.be/'.$link.'">';
                echo '<img src="//i1.ytimg.com/vi/'.$link.'/mqdefault.jpg" class="img-responsive">';
                echo '</a>';

                /*echo '<a href="http://youtu.be/KsE9iXoXB6s" data-toggle="lightbox"  class="col-sm-4 '.$category.'" ';
                echo 'data-title="Es importante que tomemos en cuenta las siguientes recomendaciones para el uso de WhatsApp." ';
                echo 'data-permalink="'.get_permalink($post->ID).'" data-category="'.$category.'" data-gallery="gallery-video">';
                echo '<img src="//i1.ytimg.com/vi/KsE9iXoXB6s/mqdefault.jpg" class="img-responsive">';
                echo '</a>';*/

                /*<div class="iframe-video hidden-more-600">
                    <iframe src="//www.youtube.com/embed/<?php echo $link; ?>?controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>*/
            }
    ?>
    <?php }?>
    <a href="//distilleryimage6.ak.instagram.com/ba70b8e8030011e3a31b22000a1fbb63_7.jpg" data-toggle="lightbox" data-title="A random title" 
    data-footer="A custom footer text" class="col-sm-4" data-gallery="gallery-img">
        <img src="//distilleryimage6.ak.instagram.com/ba70b8e8030011e3a31b22000a1fbb63_7.jpg" class="img-responsive">
    </a>
    </div>

    <div id="default_addthis_charge" class="addthis_sharing_toolbox"></div>

</div><!-- #main-content -->
<script type="text/javascript">
    $(document).ready(function ($){
        //delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    if (window.console) {
                        //console.log('onShown');
                    }
                },
                onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
                },
                onShow: function (e){
                    if (window.console) {
                        //console.log('e', e);
                        //console.log('onShow');
                    }
                },
                onHide: function (e){
                    if (window.console) {
                        //console.log('e', e);
                        //console.log('onHide');
                    }
                },
                onHidden: function (e){
                    if (window.console) {
                        //console.log('onHidden');
                    }
                },
                onContentLoaded: function (e){
                    if (window.console) {
                        console.log('this', this);
                        var category = this.options.category;
                        console.log('category', category);
                        var selector;
                        var addthis = $('#default_addthis_charge');
                        var facebook = addthis.find('span.aticon-facebook');
                        var twitter = addthis.find('span.aticon-twitter');
                        var pinterest = addthis.find('span.aticon-pinterest_share');
                        var google = addthis.find('span.aticon-google_plusone_share');
                        if( category == 'video'){
                            selector = ".lightbox-video-footer";
                            facebook.text('');
                            twitter.text('');
                            pinterest.text('');
                            google.text('');
                        }else{
                            selector = ".lightbox-img-header";
                            //Reajustar tamano de dialog
                            var widthHeader = this.widthHeader.width();
                            //console.log('widthHeader', widthHeader);
                            var dialog = $('div.ekko-lightbox .modal-dialog');
                            var widthDialog = dialog.width();
                            //console.log('width dialog', widthDialog );
                            var widthNew = widthHeader + widthDialog;
                            //console.log('widthNew', widthNew);
                            dialog.css('max-width', widthNew);
                            //Agregar texto a redes sociales
                            facebook.text('Compartir');
                            twitter.text('Tweet');
                            pinterest.text('Pin it');
                            google.text('Plus');
                        }
                        $(selector+' .list-redes').html("");
                        $(selector+' .list-redes').append( addthis.html() );
                        /*console.log( 'div insert addthis', $(selector+' .list-redes') );
                        console.log('find addthis', $('#default_addthis_charge') );
                        console.log('html addthis', addthis);
                        console.log('onContentLoaded');*/
                        //console.log('onContentLoaded');
                    }
                }
            });
        });
    });
</script>
<?php get_footer(); ?>
