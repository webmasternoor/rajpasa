<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Corporate Lite
 */
?>
        <div class="copyright-wrapper">
        	<div class="inner">
                <div class="footer-menu">
                        <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                </div><!-- footer-menu -->
                <div class="copyright">
                    	<p>&copy; <?php echo esc_attr(get_theme_mod('footer_copy',__('Rajpasa 2017 | All Rights Reserved.','corporate-lite'))); ?> <?php //echo corporate_lite_credit_link(); ?>Designed by <a href="http://viewsoft.biz">View Soft</a></p>               
                </div><!-- copyright --><div class="clear"></div>           
            </div><!-- inner -->
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>