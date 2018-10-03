<?php /* Smarty version 2.6.13, created on 2017-04-21 20:56:49
         compiled from main.html */ ?>
<header class="front" id="header" role="header">
    <div id="slider">
        <ul class="nolist slides">
            <li class="textcenter animated slideInDown" style="background-image: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/Untitled-14.jpg);" title="The next level.">
                <h1 class="animated bounceInLeft">The next level.</h1>
                <div class="animated bounceInUp"><p>Stand out. Take your site to the next level with Epicism.</p>
                    <p><a class="button" href="#">I want it now</a></p>
                </div>
            </li>
            <li class="textcenter animated slideInDown" style="background-image: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/Untitled-13.jpg);" title="We build awesome.">
                <h1 class="animated bounceInLeft">We build awesome.</h1>
                <div class="animated bounceInUp"><p>We put everything into building our themes so you don&#8217;t have to.</p>
                    <p><a class="button" href="#">I want it now</a></p>
                </div>
            </li>
            <li class="textcenter animated slideInDown" style="background-image: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/Untitled-16.jpg);" title="Don&#8217;t be shy, be social.">
                <h1 class="animated bounceInLeft">Don&#8217;t be shy, be social.</h1>
                <div class="animated bounceInUp"><p>We&#8217;ve built in tons of social features to get you going!</p>
                    <p><a class="button" href="#">I want it now</a></p>
                </div>
            </li>
        </ul>
    </div>
    <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/js/slider.js"></script>
    <?php echo '
    <script type="text/javascript">
jQuery(document).ready(function ($) {
$(\'#slider\').unslider({
speed: 1000, //  The speed to animate each slide (in milliseconds)
delay: 6000, //  The delay between slide animations (in milliseconds)
complete: function () {}, //  A function that gets called after every slide animation
keys: true, //  Enable keyboard (left, right) arrow shortcuts
dots: true, //  Display dot navigation
fluid: true                //  Support responsive design. May break non-responsive designs
});
var slides = $(\'.slides\'),
    i = 0;
slides.on(\'swipeleft\', function (e) {
slides.eq(i + 1).addClass(\'active\');
}).on(\'swiperight\', function (e) {
slides.eq(i - 1).addClass(\'active\');
});
});
    </script>                
    '; ?>

</header>
<div id="content">
    <a href="#" target="_blank">
        <section id="callto">
            <div class="boxed textcenter">
                This is the theme you&#039;ve been waiting for. What? Why are you still here? Go grab it!
            </div>
        </section>
    </a>
    <section id="page">
        <div class="boxed">
             <?php echo $this->_tpl_vars['main_page']; ?>

        </div>
    </section>
</div>
<section id="testimonials">
    <ul id="quotes" class="nolist textcenter aligncenter">
        <li class="animated flipInX">
            <div class="quote"><p>It&#8217;s rare to find someone that is so technologically competent and artistically creative. Scott is always on hand to assist me and show me what websites are capable of, and open minded enough to listen to my exacting requirements!</p>
            </div>
            <div class="person">Ian Burton</div>
        </li>
        <li class="animated flipInX">
            <div class="quote"><p>We would like to thank Scott for taking our old website which did not work properly and turning it into something beautiful that not only does everything we require, but it is also super-easy to use and maintain on a daily basis.</p>
            </div>
            <div class="person">Holly Oldham</div>
        </li>
        <li class="animated flipInX">
            <div class="quote"><p>Scott has listened very carefully to our needs as a club, and has given us his time and talents to create a website that is easy to manage and maintain as well as providing us with a more up to date profile.</p>
            </div>
            <div class="person">Rachel Marsters</div>
        </li>
    </ul>
</section>