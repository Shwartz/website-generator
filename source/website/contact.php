<?php $webPath = "@@path@@"; ?>
<?php $pageID = "@@pageID@@"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="@styles@">
</head>
<body>
<div id="wrap">
    <?php include 'inc/_header.php'; ?>
    <div id="barba-wrapper">
        <div class="barba-container">
            <?php include 'inc/_menu.php'; ?>
            <div id="container" class="content group">
                <div id="content" class="group">
                    <div id="main" class="group">
                        <div id="posts" class="left-col">

                            <div class="post group">
                                <h1>Contact Me</h1>
                                <div class="col_1_2"><div role="form" class="wpcf7" id="wpcf7-f29-p12-o1" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                        <form action="/contact-me/#wpcf7-f29-p12-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                            <div style="display: none;">
                                                <input type="hidden" name="_wpcf7" value="29">
                                                <input type="hidden" name="_wpcf7_version" value="4.4">
                                                <input type="hidden" name="_wpcf7_locale" value="">
                                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f29-p12-o1">
                                                <input type="hidden" name="_wpnonce" value="c90f5ebb30">
                                            </div>
                                            <p>Your Name (required)<br>
                                                <span class="wpcf7-form-control-wrap name"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
                                            <p>Your Email (required)<br>
                                                <span class="wpcf7-form-control-wrap email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </p>
                                            <p>Your Message<br>
                                                <span class="wpcf7-form-control-wrap message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
                                            <p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://virtualkristine.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;"></p>
                                            <div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div>
                                <div class="col_1_2_last"><a href="http://virtualkristine.com/wp-content/uploads/2015/10/booth-16817_640.jpg"><img class="aligncenter wp-image-47 size-full" src="http://virtualkristine.com/wp-content/uploads/2015/10/booth-16817_640.jpg" alt="booth-16817_640" width="640" height="426" srcset="http://virtualkristine.com/wp-content/uploads/2015/10/booth-16817_640-300x200.jpg 300w, http://virtualkristine.com/wp-content/uploads/2015/10/booth-16817_640.jpg 640w" sizes="(max-width: 640px) 100vw, 640px"></a></div>
                            </div>


                        </div>

                        <aside class="right-col">
                            <div class="grid-1-2 last">
                                <div class="widget-wrap">
                                    <div class="widget gb-widget-right"><h3 class="widget-title">Search</h3><div class="searchbar">
                                            <form name="search" method="get" action="http://virtualkristine.com">
                                                <input class="searchInput" type="text" name="s">
                                                <button class="searchSubmit" title="Search" type="submit"> <span data-icon="" aria-hidden="true"></span></button>
                                            </form>
                                        </div></div><div class="widget gb-widget-right"><h3 class="widget-title">Contact me for a quote</h3><div class="textwidget"><p><strong>Phone:</strong> <span class="btn"><a href="tel:+44-775-7998277">+44-775-7998277</a></span></p>
                                            <p><strong>Email:</strong> <span class="btn"><a href="mailto:08751cc1@opayq.com">Email Us</a></span></p>
                                            <p><strong>LinkedIn:</strong> <span class="btn"><a href="https://uk.linkedin.com/pub/kristine-legzdina/52/514/284" target="_blank">LinkedIn Profile</a></span></p>
                                            <p><strong>Skype:</strong> <span class="btn"><a href="skype:virtual1kristine?chat">Start Skype chat</a></span></p>
                                        </div></div></div>            </div>
                        </aside>

                    </div>

                </div>	<!-- End Main Area -->
                <!--end container-->
            </div>
        </div>
    </div>

</div>

<?php include 'inc/_footer.php'; ?>
<script @script@></script>
</body>
</html>