<style type="text/css">
	.back-blue-color{
		background-color: #354184;
		height: 107px;
	}
	.logo_veracruz_footer{
		margin-top: 14px;
	  margin-left: 10px;
	  float: right;
	  margin-right: 14px;
	}
	.wrap_foter{
		float: right;
	}
	.back-softblue{
		background-color: #4553A2;
		height: 107px;
	}
	.wrap_footer{
		border-top: 8px solid #FFF400;
		color: #FFF;
	}
	.reset-padding-boostrap{
		padding-left: 0px;
		padding-right: 0px;
	}
	.wrapper-footer{
		width: 100%;
		overflow: hidden;
	}
	.resaltado_url{
		color: #FFF400;
	}
	.url-web-ver{
		  font-family: "ubunturegular";
	}
	.copyright_font_footer{
		font-size: 13px;
		font-family: "ubuntulight";
	}
</style>
    <div class="wrapper-footer-ver">
    	<div class="wrapper-footer wrap_footer  hidden-xs reset-padding-boostrap">
    		<div class="col-md-4 col-sm-4 back-blue-color">
					<div class="wrap_logo">
						<img src="<?php bloginfo("template_url") ?>/images/logo_ver.png" alt="" class="logo_veracruz_footer" />
					</div><!--FIN wrap_logo-->
				</div>
				<div class="col-md-8 col-sm-8 back-softblue">
					<div class="wrap_foter ">
						<h2 class="url-web-ver">www.<span class="resaltado_url">veracruz-digital</span>.com.mx</h2>
						<h5 class="copyright_font_footer">Algunos Derechos Reservados &#64; 2015</h5>
					</div>
				</div>
		</div>



		<div class="container-fluid wrap_footer  visible-xs reset-padding-boostrap">
			<div class="col-xs-12 back-softblue">
				<div class="container wrap_foter">
					<h2 class="url-web-ver">www.veracruz-digital.com.mx</h2>
					<h5 class="copyright_font_footer">Algunos Derechos Reservados &copyright; 2015</h5>
				</div>
			</div>
			<div class="col-xs-12 back-blue-color">
				<img src="<?php bloginfo("template_url") ?>/images/logo_ver.png" alt="" class="logo_veracruz_footer">
			</div>
		</div>
    </div><!--.wrapper-footer-->
    <?php //wp_footer(); ?>
    
    <!--code google analitycs-->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', '<?php echo $general_settings['code-google-analytics'] ?>', 'auto');
	  ga('send', 'pageview');
	</script>
    <!--fin code google analitycs-->
</body>
</html>