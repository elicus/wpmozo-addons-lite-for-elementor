( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOWavyGallery = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                jQuery(document).ready(function($) {
                    
                    gsap.registerPlugin(ScrollTrigger);
                    ScrollTrigger.normalizeScroll(true);

                    $('.wpmozo_wavy_gallery_wrapper').each(function() {
                      let $section = $(this),
                          $wrapper = $section.find('.wpmozo_wavy_gallery_items'),
                          $images = $wrapper.find('.wpmozo_wavy_gallery_item'),
                          $overlay = $section.find('.wpmozo_wavy_gallery_overlay'),
                          $overlayContent = $overlay.find('.wpmozo_wavy_gallery_overlay_items'),
                          $overlayTitle = $overlay.find('.wpmozo_wavy_gallery_overlay_item_title');

                      
                      (function moveOverlayToPageContainer(){
                        const $galleryRoot = $section.closest('.wpmozo_wavy_gallery');
                        const pageId = $galleryRoot.data('page_id');
                        if (pageId && $overlay.length) {
                          const $pageContainer = $('[data-elementor-id="' + pageId + '"]').first();
                          if ($pageContainer.length) {
                            
                            $overlay.appendTo($pageContainer);
                          }
                        }
                      })();
                      

                      let wrapperEl = $wrapper[0],
                          sectionEl = $section[0],
                          scrollDistance = wrapperEl.scrollWidth - sectionEl.offsetWidth;

                      let lastScrollX = 0,
                          lastTime = performance.now(),
                          scrollSpeed = 0,
                          isScrolling = false,
                          scrollTimeout,
                          imageData = new Map();

                      function lerp(start, end, amt) {
                        return (1 - amt) * start + amt * end;
                      }

                      gsap.to(wrapperEl, {
                        x: () => `-${scrollDistance}`,
                        ease: "none",
                        scrollTrigger: {
                          trigger: sectionEl,
                          start: "top top",
                          end: () => `+=${scrollDistance}`,
                          scrub: true,
                          pin: true,
                          onEnter: () => $('html').addClass("wpmozo_hide_scrollbar"),
                          onLeave: () => $('html').removeClass("wpmozo_hide_scrollbar"),
                          onEnterBack: () => $('html').addClass("wpmozo_hide_scrollbar"),
                          onLeaveBack: () => $('html').removeClass("wpmozo_hide_scrollbar"),
                          onUpdate: (self) => {
                            isScrolling = true;
                            let currentScrollX = self.scroll(),
                                currentTime = performance.now(),
                                deltaTime = currentTime - lastTime || 1;

                            scrollSpeed = Math.abs(currentScrollX - lastScrollX) / deltaTime * 100;
                            lastScrollX = currentScrollX;
                            lastTime = currentTime;

                            clearTimeout(scrollTimeout);
                            scrollTimeout = setTimeout(() => {
                              isScrolling = false;
                            }, 200);
                          }
                        }
                      });

                      $section.on('wheel', function(e) {
                        if (Math.abs(e.originalEvent.deltaX) > 0 || (e.shiftKey && e.originalEvent.deltaY !== 0)) {
                          e.preventDefault();
                          window.scrollBy({ top: e.originalEvent.deltaX, behavior: 'auto' });
                        }
                      });

                      function animate() {
                        let centerX = $(window).width() / 2,
                            zoneWidth = $(window).width() * 0.5,
                            zoneStart = centerX - zoneWidth / 2,
                            zoneEnd = centerX + zoneWidth / 2,
                            closestImage = null,
                            closestDistance = Infinity;

                        $images.each(function() {
                          let $img = $(this),
                              rect = this.getBoundingClientRect(),
                              imgCenter = rect.left + rect.width / 2,
                              inZone = imgCenter >= zoneStart && imgCenter <= zoneEnd;

                          if (!imageData.has(this)) imageData.set(this, { scale: 1 });
                          let data = imageData.get(this);

                          if (inZone && isScrolling) {
                            let distance = Math.abs(centerX - imgCenter),
                                maxDistance = zoneWidth / 2,
                                proximity = Math.max(0, 0.5 - distance / maxDistance),
                                speedFactor = Math.min(Math.max(scrollSpeed / 50, 1), 10),
                                targetScale = 1 + proximity * 0.5 * speedFactor;

                            data.scale = lerp(data.scale, targetScale, 0.1);
                            let rotateY = imgCenter > centerX ? 20 : -20;
                            $img.css('transform', `perspective(1000px) rotateY(${rotateY}deg) scale(${data.scale})`);

                            if (distance < closestDistance) {
                              closestDistance = distance;
                              closestImage = $img;
                            }
                          } else {
                            data.scale = lerp(data.scale, 1, 0.1);
                            $img.css('transform', `scale(${data.scale})`);
                          }
                          $img.removeClass("active");
                        });

                        if (closestImage) {
                          closestImage.addClass("active");
                        }
                        requestAnimationFrame(animate);
                      }

                      animate();

                      function updateOverlayTitle() {
                        let overlayRect = $overlayContent[0].getBoundingClientRect(),
                            centerX = overlayRect.left + overlayRect.width / 2,
                            closestImg = null,
                            closestDistance = Infinity;

                        $overlayContent.find('.wpmozo_wavy_gallery_item').each(function() {
                          let rect = this.getBoundingClientRect(),
                              imgCenter = rect.left + rect.width / 2,
                              distance = Math.abs(centerX - imgCenter),
                              $imgEl = $(this).find('img');

                          $imgEl.css('filter', 'grayscale(1)');

                          if (distance < closestDistance) {
                            closestDistance = distance;
                            closestImg = $(this);
                          }
                        });

                        if (closestImg) {
                          let $imgEl = closestImg.find('img');
                          $imgEl.css('filter', 'grayscale(0)');
                          $overlayTitle.text($imgEl.attr('title') || '');
                        }
                      }

                      $overlayContent.on('scroll', updateOverlayTitle);
                      $(window).on('resize', updateOverlayTitle);

                      function openOverlayWithImage($originalImage) {
                        $overlayContent.empty();
                        $overlayTitle.text('');
                        $('body').css('overflow', 'hidden');

                        let clickedIndex = $images.index($originalImage),
                            overlayImageElements = [];

                        $images.each(function(index) {
                          let $clone = $(this).clone(true);
                          $clone.find('img').css('filter', 'grayscale(1)');
                          $overlayContent.append($clone);
                          overlayImageElements.push($clone);
                        });

                        $overlay.addClass("active");

                        requestAnimationFrame(() => {
                          setTimeout(() => {
                            let $target = overlayImageElements[clickedIndex],
                                targetPos = $target[0].offsetLeft - ($overlayContent[0].offsetWidth / 2) + ($target[0].offsetWidth / 2);
                            $overlayContent[0].scrollLeft = targetPos;
                            updateOverlayTitle();
                          }, 0);
                        });

                        centerOverlayImageOnClick();
                      }

                      function centerOverlayImageOnClick() {
                        $overlayContent.find('.wpmozo_wavy_gallery_item').off('click').on('click', function () {
                          gsap.to($overlayContent[0], {
                            duration: 1,
                            scrollTo: {
                              x: this.offsetLeft - ($overlayContent[0].offsetWidth / 2) + (this.offsetWidth / 2)
                            },
                            ease: "sine.out",
                            onUpdate: updateOverlayTitle
                          });
                        });
                      }

                      function closeOverlay() {
                        $overlay.removeClass("active");
                        $overlayContent.empty();
                        $overlayTitle.text('');
                        $('body').css('overflow', '');
                      }

                      $images.on('click', function() {
                        openOverlayWithImage($(this));
                      });

                      let overlayScrollTriggered = false;

                      function handleManualScrollClose() {
                        if (!overlayScrollTriggered) {
                          overlayScrollTriggered = true;
                          closeOverlay();
                          setTimeout(() => {
                            overlayScrollTriggered = false;
                          }, 0);
                        }
                      }

                      $overlayContent.on('wheel touchmove', handleManualScrollClose);
                      $(window).on('wheel touchmove', handleManualScrollClose);

                      $(window).on('keydown', function(e) {
                        if (e.key === 'Escape' || e.key === 'Esc') {
                          if ($overlay.css('display') === 'flex') {
                            closeOverlay();
                          }
                        }
                      });
                    });
                  });             
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_wavy_gallery", WPMOZOWavyGallery );
    } );
} )( jQuery );
