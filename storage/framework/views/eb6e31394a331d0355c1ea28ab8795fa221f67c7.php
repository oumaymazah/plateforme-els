

<?php $__env->startSection('title'); ?>Scroll Reveal
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/photoswipe.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Scroll Reveal</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Animation</li>
		<li class="breadcrumb-item active">Scroll Reveal</li>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Scroll Reveal Example</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gallery my-gallery" id="aniimated-thumbnials" itemscope="">
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/01.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/01.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 1</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/02.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/02.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 2</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/03.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/03.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 3</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/04.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/04.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 4</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/05.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/05.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 5</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/06.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/06.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 6</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/07.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/07.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 7</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/08.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/08.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 8</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/09.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/09.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 9</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/010.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/010.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 10</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/011.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/011.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 11</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/012.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/012.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 12</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/013.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/013.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 13</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/014.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/014.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 14</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/015.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/015.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 15</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/016.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/016.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 16</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/01.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/01.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 17</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/02.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/02.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 18</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/03.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/03.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 19</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/04.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/04.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 20</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/05.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/05.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 21</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/010.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/010.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 22</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/011.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/011.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 23</figcaption>
                            </figure>
                            <figure class="reveal col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-lightgallry/012.jpg')); ?>" itemprop="contentUrl" data-size="1600x950">
                                    <img class="img-thumbnail" src="<?php echo e(asset('assets/images/lightgallry/012.jpg')); ?>" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description">Image caption 24</figcaption>
                            </figure>
                        </div>
                        <!-- Root element of PhotoSwipe. Must have class pswp.-->
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                            <!--
                          Background of PhotoSwipe.
                          It's a separate element, as animating opacity is faster than rgba().
                          -->
                            <div class="pswp__bg"></div>
                            <!-- Slides wrapper with overflow:hidden.-->
                            <div class="pswp__scroll-wrap">
                                <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory.-->
                                <!-- don't modify these 3 pswp__item elements, data is added later on.-->
                                <div class="pswp__container">
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                </div>
                                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
                                <div class="pswp__ui pswp__ui--hidden">
                                    <div class="pswp__top-bar">
                                        <!-- Controls are self-explanatory. Order can be changed.-->
                                        <div class="pswp__counter"></div>
                                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                        <button class="pswp__button pswp__button--share" title="Share"></button>
                                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                        <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
                                        <!-- element will get class pswp__preloader--active when preloader is running-->
                                        <div class="pswp__preloader">
                                            <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                        <div class="pswp__share-tooltip"></div>
                                    </div>
                                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                                    <div class="pswp__caption">
                                        <div class="pswp__caption__center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>How to Use Scroll Reveal(Customize options according to requirements)</h5>
                        <span>Add <code>.reveal</code> class to any tag for Archive animation like this</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <span class="comment">// The Below Function is example of how to initlize reveal</span>
                            <div class="line">
                                <span class="text-danger">if (Modernizr.csstransforms3d)</span><span class="text-success">{</span><br />
                                window.sr = ScrollReveal();<br />
                                sr.reveal('.reveal', {<br />
                                duration: 800,<br />
                                delay: 400,<br />
                                reset: true,<br />
                                easing: 'linear',<br />
                                scale: 1<br />
                                });<br />
                                <span class="text-success"> }</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Scroll Reveal Settings options</h5>
                    </div>
                    <div class="card-body">
                        <div class="p-b-15">
                            <span class="comment">// 'bottom', 'left', 'top', 'right'</span>
                            <div class="line">origin: <span class="text-danger">'bottom',</span></div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Can be any valid CSS distance, e.g. '5rem', '10%', '20vw', etc.</span>
                            <div class="line">distance: <span class="text-danger">'20px',</span></div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Time in milliseconds.</span>
                            <div class="line">duration: <span class="text-danger">500,</span> delay: <span class="text-danger">0,</span></div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Starting angles in degrees, will transition from these values to 0 in all axes.</span>
                            <div class="line">rotate: { x: <span class="text-danger">0</span>, y: <span class="text-danger">0</span>, z: <span class="text-danger">0</span> },</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Starting opacity value, before transitioning to the computed opacity.</span>
                            <div class="line">opacity: <span class="text-danger">0</span>,</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Starting scale value, will transition from this value to 1</span>
                            <div class="line">scale: <span class="text-danger"> 0.9</span>,</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Accepts any valid CSS easing, e.g. 'ease', 'ease-in-out', 'linear', etc.</span>
                            <div class="line">easing: 'cubic-bezier(0.6, 0.2, 0.1, 1)',</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">
                                // is the default reveal container. You can pass either:<br />
                                // DOM Node, e.g. document.querySelector('.fooContainer')<br />
                                // Selector, e.g. '.fooContainer'
                            </span>
                            <div class="line">easing: 'cubic-bezier(0.6, 0.2, 0.1, 1)',</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// true/false to control reveal animations on mobile.</span>
                            <div class="line">mobile: true,</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">
                                // true: reveals occur every time elements become visible<br />
                                // false: reveals occur once as elements become visible
                            </span>
                            <div class="line">reset: false,</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">
                                // 'always' — delay for all reveal animations<br />
                                // 'once' — delay only the first time reveals occur<br />
                                // 'onload' - delay only for animations triggered by first load
                            </span>
                            <div class="line">useDelay: 'always',</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">
                                // Change when an element is considered in the viewport. The default value<br />
                                // of 0.20 means 20% of an element must be visible for its reveal to occur.
                            </span>
                            <div class="line">viewFactor: 0.2,</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">
                                // Pixel values that alter the container boundaries.<br />
                                // e.g. Set `{ top: 48 }`, if you have a 48px tall fixed toolbar.<br />
                                // --<br />
                                // Visual Aid: https://scrollrevealjs.org/assets/viewoffset.png
                            </span>
                            <div class="line">viewOffset: { top: 0, right: 0, bottom: 0, left: 0 },</div>
                        </div>
                        <div class="p-b-15">
                            <span class="comment">// Callbacks that fire for each triggered element reveal, and reset.</span>
                            <div class="line">
                                beforeReveal: <span class="text-danger">function</span> (domEl) {},<br />
                                beforeReset: <span class="text-danger">function</span> (domEl) {},
                            </div>
                        </div>
                        <div>
                            <span class="comment">// Callbacks that fire for each completed element reveal, and reset.</span>
                            <div class="line">
                                afterReveal: <span class="text-danger">function</span> (domEl) {},<br />
                                afterReset: <span class="text-danger">function</span> (domEl) {}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <?php $__env->startPush('scripts'); ?> 
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/scroll-reveal/scrollreveal.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/modernizr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/scroll-reveal/reveal-custom.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/animation/scroll-reval.blade.php ENDPATH**/ ?>