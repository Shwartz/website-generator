<?php $webPath = ""; ?>
<?php $pageID = "@@pageID@@"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="wrap">
    <?php include 'inc/_header.php'; ?>
    <div id="barba-wrapper">
        <div class="barba-container">
            <?php include 'inc/_menu.php'; ?>
            <div id="container" class="group">
                <div id="content" class="content group">
                    <div id="main" class="group">
                        <div id="posts" class="left-col">

                            <div class="post group">
                                <h1>Testimonials</h1>
                                <div class="quote clearfix">
                                    “Highly competent and efficient service, great out of the box thinking. Fantastic time management and people skills. All in all a great business partnering service.”<p></p>
                                    <h4>Suzanne Wood – Director – MSEXCELEXPERT.COM</h4>
                                </div>
                                <div class="quote clearfix">
                                    “I had personal attention and advice from Kristine, she helped me not only to submit tax returns, but also to understand my finances better. What makes Kristine’s services shine above others is the genuine support in keeping my finances straight – whether this is prompt replies, answers to questions or advice and tips, I know they are working for me. I would recommend Kristine Legzdina for tax returns and financial advice.”<p></p>
                                    <h4>Aivars Kaupmanis – Self-employed – carpenter</h4>
                                </div>
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
<script data-main="/dev/js/app" src="/dev/js/require.js"></script>
</body>
</html>