

<?php $__env->startSection('title'); ?>Wow Animation
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/photoswipe.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Wow Animation</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Animation</li>
		<li class="breadcrumb-item active">Wow Animation</li>
	<?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>WOW Example animation</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gallery grid my-gallery" id="aniimated-thumbnials" itemscope="">
                            <figure class="grid-item col-md-3 col-6 wow rollIn" itemprop="associatedMedia" data-wow-delay="0.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/1.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/1.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 1</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInDown center" itemprop="associatedMedia" data-wow-delay="0.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/2.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/2.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 2</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow lightSpeedIn" itemprop="associatedMedia" data-wow-delay="0.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/3.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/3.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 3</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/4.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/4.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 4</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow pulse" itemprop="associatedMedia" data-wow-iteration="5" data-wow-duration="0.15s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/5.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/5.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 5</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInRight center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/6.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/6.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 6</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInLeft" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/7.jpg')); ?>" itemprop="contentUrl" data-size="11600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/7.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 7</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow flipInX center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/8.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/8.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 8</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInRight" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/9.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/9.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 9</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/10.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/10.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 10</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow shake" itemprop="associatedMedia" data-wow-iteration="5" data-wow-duration="0.15s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/11.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/11.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 11</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow swing center" itemprop="associatedMedia" data-wow-iteration="2" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/12.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/12.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 12</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/14.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/14.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 13</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInUp center" itemprop="associatedMedia" data-wow-delay="0.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/15.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/15.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 14</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow lightSpeedIn" itemprop="associatedMedia" data-wow-delay="0.5s" data-wow-duration="0.15s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/13.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/13.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 15</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/4.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/4.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 16</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow pulse" itemprop="associatedMedia" data-wow-iteration="5" data-wow-duration="0.25s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/5.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/5.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 17</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow flip" itemprop="associatedMedia" data-wow-iteration="2" data-wow-duration="0.15s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/9.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/9.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 18</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow lightSpeedIn center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/6.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/6.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 19</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounce" itemprop="associatedMedia" data-wow-iteration="5" data-wow-duration="0.15s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/7.jpg')); ?>" itemprop="contentUrl" data-size="11600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/7.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 20</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInUp center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/8.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/8.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 21</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInRight" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/9.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/9.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 22</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/10.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/10.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 23</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInRight center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/10.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/10.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 24</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn" itemprop="associatedMedia" data-wow-delay="0.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/11.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/11.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 25</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInDown center" itemprop="associatedMedia" data-wow-delay="1s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/12.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/12.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 26</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInRight" itemprop="associatedMedia" data-wow-delay="1.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/14.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/14.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 27</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInRight center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/15.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/15.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 28</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow rollIn" itemprop="associatedMedia" data-wow-delay="0.5s" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/13.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/13.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 29</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow bounceInLeft center" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/4.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/4.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 30</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow lightSpeedIn" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/5.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/5.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 31</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow pulse" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/6.jpg')); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/6.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 32</figcaption>
                            </figure>
                            <figure class="grid-item col-md-3 col-6 wow slideInRight" itemprop="associatedMedia" itemscope="">
                                <a href="<?php echo e(asset('assets/images/big-masonry/7.jpg')); ?>" itemprop="contentUrl" data-size="11600x950"><img class="img-thumbnail" src="<?php echo e(asset('assets/images/masonry/7.jpg')); ?>" itemprop="thumbnail" alt="Image description" /></a>
                                <figcaption itemprop="caption description">Image caption 33</figcaption>
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
                    <div class="card-header pb-0 wow-title">
                        <h5><span class="badge badge-primary badge-pill me-2">1</span>Setup wow.js</h5>
                        <span>(You can link to another CSS animation library by changing wow.js settings)</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="line">
                                <code><span>&lt;link rel="stylesheet" href="css/animate.css')}}" &gt;</span></code>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0 wow-title">
                        <h5><span class="badge badge-primary badge-pill me-2">2</span>Link and activate wow.js</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="line">
                                &lt; script src="js/wow.min.js')}}" &gt; &lt; /script &gt; <br />
                                &lt; script &gt; <br />
                                <code> WOW.init();</code><br />
                                &lt; /script &gt;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0 wow-title">
                        <h5><span class="badge badge-primary badge-pill me-2">3</span>Make an element revealable</h5>
                        <span>(You can change this CSS class in the WOW settings to avoid name conflicts.)</span>
                    </div>
                    <div class="card-body">
                        <h6 class="text-muted">Add the CSS class .wow to a HTML element: it will be invisible until the user scrolls to reveal it.</h6>
                        <div>
                            <div class="line">
                                &lt; div class="wow" &gt; <br />
                                <code>Content to Reveal Here</code><br />
                                &lt; /div &gt;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0 wow-title">
                        <h5><span class="badge badge-primary badge-pill me-2">4</span>Choose the animation style</h5>
                        <span>Pick an animation style in Animate.css , then add the CSS class to the HTML element</span>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="line">
                                &lt; div class="wow bounceInUp" &gt; <br />
                                <code>Content to Reveal Here</code><br />
                                &lt; /div &gt;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0 wow-title">
                        <h5><span class="badge badge-success badge-pill me-2">Extra</span>Advance Options</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="line">
                                <p>
                                    <strong>data-wow-duration: </strong>Change the animation duration<br />
                                    <strong>data-wow-delay: </strong>Delay before the animation starts<br />
                                    <strong>data-wow-offset: </strong>Distance to start the animation (related to the browser bottom)<br />
                                    <strong>data-wow-iteration: </strong>Number of times the animation is repeated<br />
                                </p>
                                <pre
                                    class="mb-0"
                                >&lt;section class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s"&gt;<br /> &lt;/section&gt;<br /> &lt;section class="wow slideInRight" data-wow-offset="10" data-wow-iteration="10"&gt;<br /> &lt;/section&gt;</pre>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0 wow-title">
                        <h5><span class="badge badge-danger badge-pill me-2">Settings</span>Customize Settings</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="line">
                                <p><strong>boxClass: </strong>Class name that reveals the hidden box when user scrolls.</p>
                                <p><strong>animateClass: </strong>Class name that triggers the CSS animations (’animated’ by default for the animate.css library)</p>
                                <p>
                                    <strong>offset: </strong>Define the distance between the bottom of browser viewport and the top of hidden box.<br />
                                    When the user scrolls and reach this distance the hidden box is revealed.
                                </p>
                                <p><strong>mobile: </strong>Turn on/off wow.js on mobile devices.</p>
                                <p><strong>live: </strong>consatantly check for new WOW elements on the page.</p>
                                <pre
                                    class="mb-0"
                                >wow = new WOW(<br /> {<br /> boxClass: 'wow', // default<br /> animateClass: 'animated', // default<br /> offset: 0, // default<br /> mobile: true, // default<br /> live: true // default<br /> }<br /> )<br /> wow.init();                    </pre>
                                <!-- Page Body Ends                   -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <?php $__env->startPush('scripts'); ?> 
    <script src="<?php echo e(asset('assets/js/isotope.pkgd.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/wow/wow-init.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/animation/wow.blade.php ENDPATH**/ ?>