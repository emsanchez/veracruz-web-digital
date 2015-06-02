/*
Lightbox for Bootstrap 3 by @ashleydw
https://github.com/ashleydw/lightbox
License: https://github.com/ashleydw/lightbox/blob/master/LICENSE
*/
(function() {
  "use strict";
  var $, EkkoLightbox;

  $ = jQuery;

  var Template = function(category, title, excerpt, permalink, media){
    return {
      
      getTemplate: function(){
        var facebook, twitter, google, pinterest, header, footer, mainContainer = "", headerImg ;
        //console.log('category temaplete', category);
        //console.log('title, temaplete', title);
        //console.log('excerpt temaplete', excerpt);

        //Maquetado Video
        if( category == 'video'){
          
          facebook = '<a class="facebook-lightbox" href="http://www.facebook.com/sharer.php?u='+permalink+'" target="_blank"></a>';
          twitter = '<a class="twitter-lightbox" href="https://twitter.com/intent/tweet?text='+title+'" target="_blank"></a>';
          google = '<a class="google-lightbox" href="https://plus.google.com/share?url='+permalink+'" target="_blank"></a>';
          pinterest = '<a class="pinterest-lightbox" href="https://www.pinterest.com/pin/create/button/?url='+media+'" target="_blank"></a>';

          header = '<div class="modal-header lightbox-video-header">';
          header += '<h4 class="modal-title" '+ (title ? '' : ' style="display:none"') +'>' + title + '</h4><a href="'+excerpt+'" '+ (excerpt ? '' : ' style="display:none"')+' >http://"'+excerpt+'"</a></div>';
          footer = '<div class="modal-footer lightbox-video-footer">';
          footer += '<div class="pasa-la-voz col-xs-12 col-sm-4 col-md-4"><div class="hashtag img-responsive"></div></div>';
          footer += '<div class="redes col-xs-12 col-sm-8 col-md-8">';
          footer += '<div class="list-redes">';
          footer += '<ul>';
          footer += '<li>'+twitter+'</li>';
          footer += '<li>'+facebook+'</li>';
          footer += '<li>'+pinterest+'</li>';
          footer += '<li>'+google+'</li>';
          footer += '</ul>';
          footer += '</div>';
          footer += '</div></div>';
        
          mainContainer += '<div class="modal-content lightbox-custom-video">';
          mainContainer += '<div class="modal-body lightbox-video-body">';
          mainContainer += '<div class="ekko-lightbox-container"><div></div></div>';
          mainContainer += '</div>';
          mainContainer += header;
          mainContainer += footer;
          mainContainer += '</div>';

        }
        //Maquetado default
        else{
          
          facebook = '<a class="facebook-lightbox" href="http://www.facebook.com/sharer.php?u='+permalink+'" target="_blank">Compartir</a>';
          twitter = '<a class="twitter-lightbox" href="https://twitter.com/intent/tweet?text='+title+'" target="_blank">Tweet</a>';
          google = '<a class="google-lightbox" href="https://plus.google.com/share?url='+permalink+'" target="_blank">Plus</a>';
          pinterest = '<a class="pinterest-lightbox" href="https://www.pinterest.com/pin/create/button/?url='+media+'" target="_blank">Pin it</a>';

          headerImg = '<div class="modal-header lightbox-img-header col-xs-12 col-sm-4 col-md-4">';
          headerImg += '<h4 class="modal-title" '+ (title ? '' : ' style="display:none"') + '>' + title + '</h4>';
          headerImg += '<div class="lightbox-img-la-voz-redes">';
          headerImg += '<div class="hashtag img-responsive"></div>';
          headerImg += '<div class="redes">';
          headerImg += '<div class="list-redes">';
          headerImg += '<ul>';
          headerImg += '<li>'+twitter+'</li>';
          headerImg += '<li>'+facebook+'</li>';
          headerImg += '<li>'+pinterest+'</li>';
          headerImg += '<li>'+google+'</li>';
          headerImg += '</ul>';
          headerImg += '</div></div></div>';
          headerImg += '<div class="lightbox-img-la-voz-pie"></div>';
          headerImg += '</div>';
          
          footer = '<div class="modal-footer lightbox-video-footer">';
          footer += '</div>';

          mainContainer += '<div class="modal-content lightbox-custom-img">';
          mainContainer += headerImg;
          mainContainer += '<div class="modal-body lightbox-img-body col-xs-12 col-sm-8 col-md-8">';
          mainContainer += '<div class="ekko-lightbox-container"><div></div></div>';
          mainContainer += '</div>';
          mainContainer += '</div>';

        }
        return mainContainer;
      }

    }
  };

  EkkoLightbox = function(element, options) {
    var content, footer, header, headerImg, _this = this;
    var facebook, twitter, google, pinterest;
    this.options = $.extend({
    title: null,
    footer: null,
    remote: null,
    category: null,
    permalink: null,
    excerpt: null,
    media: null
    }, $.fn.ekkoLightbox.defaults, options || {});
    this.$element = $(element);
    content = '';
    this.modal_id = this.options.modal_id ? this.options.modal_id : 'ekkoLightbox-' + Math.floor((Math.random() * 1000) + 1);
    
    var category = this.options.category;
    var title = this.options.title;
    var excerpt = this.options.excerpt;
    var permalink = this.options.permalink;
    var media = this.options.media;

    //Maquetado LightBox
    var mainContainer = "";
    mainContainer += '<div id="' + this.modal_id + '" class="ekko-lightbox modal fade custom" tabindex="-1">';
    mainContainer += '<div class="modal-dialog lightbox-modal-dialog">';
    var template = new Template(category, title, excerpt, permalink, media ).getTemplate();
    mainContainer += template;
    mainContainer += '</div></div>';

    $(document.body).append(mainContainer);
  
    this.modal = $('#' + this.modal_id);
    this.modal_dialog = this.modal.find('.modal-dialog').first();
    this.modal_content = this.modal.find('.modal-content').first();
    this.modal_body = this.modal.find('.modal-body').first();
    this.lightbox_container = this.modal_body.find('.ekko-lightbox-container').first();
    this.lightbox_body = this.lightbox_container.find('> div:first-child').first();

    this.widthHeader = this.modal.find('.modal-dialog').find('.lightbox-custom-img').find('.lightbox-img-header');
    
    this.showLoading();
    this.modal_arrows = null;
    
    this.border = {
      top: parseFloat(this.modal_dialog.css('border-top-width')) + parseFloat(this.modal_content.css('border-top-width')) + parseFloat(this.modal_body.css('border-top-width')),
      right: parseFloat(this.modal_dialog.css('border-right-width')) + parseFloat(this.modal_content.css('border-right-width')) + parseFloat(this.modal_body.css('border-right-width')),
      bottom: parseFloat(this.modal_dialog.css('border-bottom-width')) + parseFloat(this.modal_content.css('border-bottom-width')) + parseFloat(this.modal_body.css('border-bottom-width')),
      left: parseFloat(this.modal_dialog.css('border-left-width')) + parseFloat(this.modal_content.css('border-left-width')) + parseFloat(this.modal_body.css('border-left-width'))
    };
    
    this.padding = {
      top: parseFloat(this.modal_dialog.css('padding-top')) + parseFloat(this.modal_content.css('padding-top')) + parseFloat(this.modal_body.css('padding-top')),
      right: parseFloat(this.modal_dialog.css('padding-right')) + parseFloat(this.modal_content.css('padding-right')) + parseFloat(this.modal_body.css('padding-right')),
      bottom: parseFloat(this.modal_dialog.css('padding-bottom')) + parseFloat(this.modal_content.css('padding-bottom')) + parseFloat(this.modal_body.css('padding-bottom')),
      left: parseFloat(this.modal_dialog.css('padding-left')) + parseFloat(this.modal_content.css('padding-left')) + parseFloat(this.modal_body.css('padding-left'))
    };
    
    this.modal.on('show.bs.modal', this.options.onShow.bind(this)).on('shown.bs.modal', function() {
      _this.modal_shown();
      return _this.options.onShown.call(_this);
    }).on('hide.bs.modal', this.options.onHide.bind(this)).on('hidden.bs.modal', function() {
      if (_this.gallery) {
        $(document).off('keydown.ekkoLightbox');
      }
      _this.modal.remove();
      return _this.options.onHidden.call(_this);
    }).modal('show', options);

    return this.modal;
  };

  EkkoLightbox.prototype = {

    modal_shown: function() {
      var video_id,
        _this = this;
      if (!this.options.remote) {
        return this.error('No remote target given');
      } else {
        this.gallery = this.$element.data('gallery');
        if (this.gallery) {
          if (this.options.gallery_parent_selector === 'document.body' || this.options.gallery_parent_selector === '') {
            this.gallery_items = $(document.body).find('*[data-toggle="lightbox"][data-gallery="' + this.gallery + '"]');
          } else {
            this.gallery_items = this.$element.parents(this.options.gallery_parent_selector).first().find('*[data-toggle="lightbox"][data-gallery="' + this.gallery + '"]');
          }
          this.gallery_index = this.gallery_items.index(this.$element);
          $(document).on('keydown.ekkoLightbox', this.navigate.bind(this));
          if (this.options.directional_arrows && this.gallery_items.length > 1) {
            
            //Rows
            this.modal_dialog.append('<div class="ekko-lightbox-nav-overlay">'+
              '<a href="#" class="' + this.strip_stops(this.options.left_arrow_class) + '"></a>'+
              '<a href="#" class="' + this.strip_stops(this.options.right_arrow_class) + '"></a>'+
              '<button type="button" class="close lightbox-img-video-close" data-dismiss="modal" aria-hidden="true"></button>'+
              '</div>');
            this.modal_arrows = this.modal_dialog.find('div.ekko-lightbox-nav-overlay').first();
            
            this.modal_dialog.find('a' + this.strip_spaces(this.options.left_arrow_class)).on('click', function(event) {
              event.preventDefault();
              return _this.navigate_left();
            });
            
            this.modal_dialog.find('a' + this.strip_spaces(this.options.right_arrow_class)).on('click', function(event) {
              event.preventDefault();
              return _this.navigate_right();
            });

          }
        }
        if (this.options.type) {
          if (this.options.type === 'image') {
            return this.preloadImage(this.options.remote, true);
          } else if (this.options.type === 'youtube' && (video_id = this.getYoutubeId(this.options.remote))) {
            return this.showYoutubeVideo(video_id);
          } else if (this.options.type === 'vimeo') {
            return this.showVimeoVideo(this.options.remote);
          } else if (this.options.type === 'instagram') {
            return this.showInstagramVideo(this.options.remote);
          } else if (this.options.type === 'url') {
            return this.loadRemoteContent(this.options.remote);
          } else if (this.options.type === 'video') {
            return this.showVideoIframe(this.options.remote);
          } else {
            return this.error("Could not detect remote target type. Force the type using data-type=\"image|youtube|vimeo|instagram|url|video\"");
          }
        } else {
          return this.detectRemoteType(this.options.remote);
        }
      }
    },
    strip_stops: function(str) {
      return str.replace(/\./g, '');
    },
    strip_spaces: function(str) {
      return str.replace(/\s/g, '');
    },
    isImage: function(str) {
      return str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i);
    },
    isSwf: function(str) {
      return str.match(/\.(swf)((\?|#).*)?$/i);
    },
    getYoutubeId: function(str) {
      var match;
      match = str.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/);
      if (match && match[2].length === 11) {
        return match[2];
      } else {
        return false;
      }
    },
    getVimeoId: function(str) {
      if (str.indexOf('vimeo') > 0) {
        return str;
      } else {
        return false;
      }
    },
    getInstagramId: function(str) {
      if (str.indexOf('instagram') > 0) {
        return str;
      } else {
        return false;
      }
    },
    navigate: function(event) {
      event = event || window.event;
      if (event.keyCode === 39 || event.keyCode === 37) {
        if (event.keyCode === 39) {
          return this.navigate_right();
        } else if (event.keyCode === 37) {
          return this.navigate_left();
        }
      }
    },
    navigateTo: function(index) {
      var next, src;
      if (index < 0 || index > this.gallery_items.length - 1) {
        return this;
      }
      this.showLoading();
      this.gallery_index = index;
      this.$element = $(this.gallery_items.get(this.gallery_index));
      this.updateTitleAndFooter();

      src = this.$element.attr('data-remote') || this.$element.attr('href');
      //console.log('src', src);
      //console.log('data type', this.$element.attr('data-type'));
      //console.log('category', this.$element.attr('data-category'));
      var category = this.$element.attr('data-category');
      var title =  this.$element.attr('data-title');
      var excerpt =  this.$element.attr('data-excerpt');
      var permalink = this.$element.attr('data-permalink');
      var media = this.$element.attr('data-media');
      var template = new Template( category, title, excerpt, permalink, media ).getTemplate();
      //vaciar modal content
      this.modal_content.remove();
      //agregar content a dialog
      $(template).appendTo(this.modal_dialog);
      this.modal = $('#' + this.modal_id);
      this.modal_dialog = this.modal.find('.modal-dialog').first();
      this.modal_content = this.modal.find('.modal-content').first();
      this.modal_body = this.modal.find('.modal-body').first();
      this.lightbox_container = this.modal_body.find('.ekko-lightbox-container').first();
      this.lightbox_body = this.lightbox_container.find('> div:first-child').first();

      this.detectRemoteType(src, this.$element.attr('data-type') || false);

      if (this.gallery_index + 1 < this.gallery_items.length) {
        //console.log('cambio de slide en galeria');
        next = $(this.gallery_items.get(this.gallery_index + 1), false);
        src = next.attr('data-remote') || next.attr('href');
        //console.log('next src', src);
        if (next.attr('data-type') === 'image' || this.isImage(src)) {
          //console.log('se vuelve a ejecutar preloadImage en next');
          return this.preloadImage(src, false);
        }
      
      }

    },
    navigate_left: function() {
      if (this.gallery_items.length === 1) {
        return;
      }
      if (this.gallery_index === 0) {
        this.gallery_index = this.gallery_items.length - 1;
      } else {
        this.gallery_index--;
      }
      this.options.onNavigate.call(this, 'left', this.gallery_index);
      return this.navigateTo(this.gallery_index);
    },
    navigate_right: function() {
      if (this.gallery_items.length === 1) {
        return;
      }
      if (this.gallery_index === this.gallery_items.length - 1) {
        this.gallery_index = 0;
      } else {
        this.gallery_index++;
      }
      this.options.onNavigate.call(this, 'right', this.gallery_index);
      return this.navigateTo(this.gallery_index);
    },
    detectRemoteType: function(src, type) {
      var video_id;
      type = type || false;
      //console.log('data type en detectRemoteType ', type);
      if (type === 'image' || this.isImage(src)) {
        //console.log('type en detectRemoteType es image');
        this.options.type = 'image';
        return this.preloadImage(src, true);
      } else if (type === 'youtube' || (video_id = this.getYoutubeId(src))) {
        //console.log('type en detectRemoteType es youtube');
        this.options.type = 'youtube';
        return this.showYoutubeVideo(video_id);
      } else if (type === 'vimeo' || (video_id = this.getVimeoId(src))) {
        this.options.type = 'vimeo';
        return this.showVimeoVideo(video_id);
      } else if (type === 'instagram' || (video_id = this.getInstagramId(src))) {
        this.options.type = 'instagram';
        return this.showInstagramVideo(video_id);
      } else if (type === 'video') {
        this.options.type = 'video';
        return this.showVideoIframe(video_id);
      } else {
        //console.log('type false se ejecuta loadRemoteContent');
        this.options.type = 'url';
        return this.loadRemoteContent(src);
      }
    },
    updateTitleAndFooter: function() {
      var caption, footer, header, title;
      header = this.modal_content.find('.modal-header');
      footer = this.modal_content.find('.modal-footer');
      title = this.$element.data('title') || "";
      caption = this.$element.data('footer') || "";
      if (title || this.options.always_show_close) {
        header.css('display', '').find('.modal-title').html(title || "&nbsp;");
      } else {
        header.css('display', 'none');
      }
      if (caption) {
        footer.css('display', '').html(caption);
      } else {
        footer.css('display', 'none');
      }
      return this;
    },
    showLoading: function() {
      this.lightbox_body.html('<div class="modal-loading">' + this.options.loadingMessage + '</div>');
      return this;
    },
    showYoutubeVideo: function(id) {
      var height, width;
      width = this.checkDimensions(this.$element.data('width') || 700);
      height = width / (560 / 315);
      return this.showVideoIframe('//www.youtube.com/embed/' + id + '?badge=0&autoplay=1&html5=1', width, height);
    },
    showVimeoVideo: function(id) {
      var height, width;
      width = this.checkDimensions(this.$element.data('width') || 560);
      height = width / (500 / 281);
      return this.showVideoIframe(id + '?autoplay=1', width, height);
    },
    showInstagramVideo: function(id) {
      var height, width;
      width = this.checkDimensions(this.$element.data('width') || 612);
      this.resize(width);
      height = width + 80;
      this.lightbox_body.html('<iframe width="' + width + '" height="' + height + '" src="' + this.addTrailingSlash(id) + 'embed/" frameborder="0" allowfullscreen></iframe>');
      this.options.onContentLoaded.call(this);
      if (this.modal_arrows) {
        return this.modal_arrows.css('display', 'none');
      }
    },
    showVideoIframe: function(url, width, height) {
      height = height || width;
      this.resize(width);
      this.lightbox_body.html('<div class="embed-responsive embed-responsive-16by9"><iframe width="' + width + '" height="' + height + '" src="' + url + '" frameborder="0" allowfullscreenclass="embed-responsive-item"></iframe></div>');
      this.options.onContentLoaded.call(this);
      if (this.modal_arrows) {
        this.modal_arrows.css('display', 'none');
      }
      return this;
    },
    loadRemoteContent: function(url) {
      var disableExternalCheck, width,
        _this = this;
      width = this.$element.data('width') || 560;
      this.resize(width);
      disableExternalCheck = this.$element.data('disableExternalCheck') || false;
      if (!disableExternalCheck && !this.isExternal(url)) {
        this.lightbox_body.load(url, $.proxy(function() {
          return _this.$element.trigger('loaded.bs.modal');
        }));
      } else {
        this.lightbox_body.html('<iframe width="' + width + '" height="' + width + '" src="' + url + '" frameborder="0" allowfullscreen></iframe>');
        this.options.onContentLoaded.call(this);
      }
      if (this.modal_arrows) {
        this.modal_arrows.css('display', 'none');
      }
      return this;
    },
    isExternal: function(url) {
      var match;
      match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
      if (typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol) {
        return true;
      }
      if (typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":(" + {
        "http:": 80,
        "https:": 443
      }[location.protocol] + ")?$"), "") !== location.host) {
        return true;
      }
      return false;
    },
    error: function(message) {
      this.lightbox_body.html(message);
      return this;
    },
    preloadImage: function(src, onLoadShowImage) {
      //console.log('se ejecuta preloadImage, onLoadShowImage', onLoadShowImage);
      var img,
        _this = this;
      img = new Image();
      if ((onLoadShowImage == null) || onLoadShowImage === true) {
        //console.log('se va agregar imagen');
        img.onload = function() {
          var image;
          image = $('<img />');
          image.attr('src', img.src);
          image.addClass('img-full');
          _this.lightbox_body.html(image);
          if (_this.modal_arrows) {
            _this.modal_arrows.css('display', 'block');
          }
          _this.resize(img.width);
          return _this.options.onContentLoaded.call(_this);
        };
        img.onerror = function() {
          return _this.error('Failed to load image: ' + src);
        };
      }
      img.src = src;
      return img;
    },
    resize: function(width) {
      var width_total;
      width_total = width + this.border.left + this.padding.left + this.padding.right + this.border.right;
      this.modal_dialog.css('width', 'auto').css('max-width', width_total);
      this.lightbox_container.find('a').css('line-height', function() {
        return $(this).parent().height() + 'px';
      });
      return this;
    },
    checkDimensions: function(width) {
      var body_width, width_total;
      width_total = width + this.border.left + this.padding.left + this.padding.right + this.border.right;
      body_width = document.body.clientWidth;
      if (width_total > body_width) {
        width = this.modal_body.width();
      }
      return width;
    },
    close: function() {
      return this.modal.modal('hide');
    },
    addTrailingSlash: function(url) {
      if (url.substr(-1) !== '/') {
        url += '/';
      }
      return url;
    }
  };

  $.fn.ekkoLightbox = function(options) {
    return this.each(function() {
      var $this;
      $this = $(this);
      options = $.extend({
        remote: $this.attr('data-remote') || $this.attr('href'),
        gallery_parent_selector: $this.attr('data-parent'),
        type: $this.attr('data-type')
      }, options, $this.data());
      new EkkoLightbox(this, options);
      return this;
    });
  };

  $.fn.ekkoLightbox.defaults = {
    gallery_parent_selector: 'document.body',
    left_arrow_class: '.glyphicon .glyphicon-chevron-left',
    right_arrow_class: '.glyphicon .glyphicon-chevron-right',
    directional_arrows: true,
    type: null,
    always_show_close: true,
    loadingMessage: 'Cargando...',
    onShow: function() {},
    onShown: function() {},
    onHide: function() {},
    onHidden: function() {},
    onNavigate: function() {},
    onContentLoaded: function() {}
  };

}).call(this);