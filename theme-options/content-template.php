<?php 
	global $themename; 
	$general_settings = get_option($themename . "_general_setting");
	$slider_options = get_option($themename . "_slider");
?>
<!-- Nav tabs -->
<div class="col-md-3">
	<div class="content-tab-link">
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#general-settings" role="tab" data-toggle="tab">General Setting</a></li>
          <li><a href="#slider" role="tab" data-toggle="tab">Slider</a></li> 
          <li><a href="#home" role="tab" data-toggle="tab">Home</a></li>         
        </ul>
    </div>
</div>
<!-- Tab panes -->
<div class="col-md-9">
	<?php 
	if($_POST["action"]==$themename . "_save"){
	?>
	<div class="updated"> 
		<p>
			<strong>
				<?php _e('Options saved', 'evolucion_e'); ?>
			</strong>
		</p>
	</div>
	<?php } ?>
 	
    <div class="tab-content">
        <div class="tab-pane active form-horizontal" id="general-settings">
            <div class="title-section">
                <h3>General settings</h3>    
            </div>
            <div class="form-group">
                <div class="col-lg-3 label-option">
                	<label for="logo-url-main" class="control-label">Logo url main</label>
                    <span class="description-title">
                    	Medidas 100x100px
                    </span>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="logo-url-main" name="logo-url-main" value="<?php echo esc_attr($general_settings["logo-url-main"]); ?>" >
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-3 label-option">
                	<label for="text-header-title" class="control-label">Texto header title</label>
                    <span class="description-title">
                    	This text it’s for SEO 
                    </span>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="text-header-title" name="text-header-title" value="<?php echo esc_attr($general_settings["text-header-title"]); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-3 label-option">
                	<label for="footter-description" class="control-label">Footer text description</label>
                    <span class="description-title">
                    	Copyright, description or whatever
                    </span>
                </div>
                <div class="col-lg-9">
                    <textarea class="form-control" id="footter-description" name="footter-description" rows="3"><?php echo esc_attr($general_settings["footter-description"]); ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-3 label-option">
                	<label for="code-google-analytics" class="control-label">Code Google Analytics</label>
                    <span class="description-title">
                    	Copy paste your ID Account
                        ejemplo: "UA-XXXXXXXX-1" 
                    </span>
                </div>
                <div class="col-lg-9">
                    <input class="form-control" id="code-google-analytics" name="code-google-analytics" value="<?php echo $general_settings["code-google-analytics"]; ?>">
                </div>
            </div>
        </div> <!--#general-settings-->
        <div class="tab-pane" id="slider">
        	<div class="general-settings">
                <h3>Slider</h3>
            </div>
            <div id="content-img-slider">
            	<?php 
					$num_slide = count($slider_options['slide-img']);
					for($i=0; $i < $num_slide; $i++){
						
				?>
                    <div class="item-slider">
                        <a class="delete-slide">
                            <img src="<?php bloginfo('template_url') ?>/theme-options/images/btn-close.png">
                        </a>
                        <?php $img_default = get_bloginfo('template_url')."/theme-options/images/dummy-83x83.png" ;?>
                        <div class="col-md-2">
                            <img class="img-preview-0 img-full" src="<?php echo ($slider_options['slide-img'][$i]=='') ? $img_default : $slider_options['slide-img'][$i]; ?>">
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="col-md-9 sin-padding-left">
                                    <input type="text" class="form-control input-sm" id="slide-img-0" name="slide-img[]" placeholder="Url Slider" value="<?php echo esc_url($slider_options['slide-img'][$i]); ?>">
                                </div>
                                <div class="col-md-3 sin-padding-right">
                                    <input type='button' class="button-primary form-control" value="Subir imagen" id="uploadimage0"/>
                                </div> 
                                <div class="clearfix"></div>                  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" id="slide-url-0" name="slide-url[]" placeholder="Link de slider" value="<?php echo esc_url($slider_options['slide-url'][$i]); ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" id="slide-title-0" name="slide-title[]" placeholder="Titúlo de slider" value="<?php echo esc_attr($slider_options['slide-title'][$i]); ?>">
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                <?php  } ?>
            	<input type="button" id="add-more" class="btn-add-more" value="Add More">
            </div><!--.content-img-slider-->
        </div><!--#slider-->
        <div class="tab-pane" id="home">
        	<?php get_template_part( 'home/content', 'quienes-somos' ); ?> 
        </div>
        <div class="clearfix"></div>
        
        <img id="theme_options_preloader" src="<?php echo get_template_directory_uri();?>/theme-options/images/ajax-loader.gif" />
        <img id="theme_options_tick" src="<?php echo get_template_directory_uri();?>/theme-options/images/tick.png" />
        <div class="pull-right">
            <input type="hidden" name="action" value="<?php echo $themename; ?>_save" />
            <input type="submit" class="btn-custom" name="submit" value="Save Options" />
        </div>
         
    </div>
</div>
