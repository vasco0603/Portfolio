<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Product Range Page" />
    <meta name="keywords" content="product page"/>
    <meta name="author" content="Michael Haryanto, Phuthai, Narongdech, Roshaan, Hirad"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cabin:wght@700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&family=Pacifico&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Camera Purchase Web Product Range</title>
</head>

<body>
    <?php
        include_once "includes/header.inc";
    ?>

    <!--enhancements Page Body-->
    <section id="enhancebody">
        <section class="enhanceblock">
            <div>
                <h2 class="enhanceheader">Enhancement 1<hr></h2>
                <h2 class="enhanceheader"><a href="index.html#youtube" class="enhancehyperlink">Youtube Box</a></h2>
                <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" id="enhanceyoutube" allowfullscreen></iframe>
                <p class="enhanceparagraph">The displayed youtube video in the index page is based on the w3schools website that helps me implement the video in a box where it does not hyperlink to another youtube page, instead it plays the video in the index page.</p>
                <h3>Code needed to implement the feature</h3>
                <p class="enhanceparagraph">&#60;iframe src="" id="youtube" allowfullscreen&#62;&#60;/iframe&#62;</p>
                <a class="referencehyperlink" href="https://www.w3schools.com/html/html_youtube.asp">Link to reference</a>
            </div>
        </section>
        <section class="enhanceblock">
            <div id="enhancelist">
                <h2 class="enhanceheader">Enhancement 2<hr></h2>
                <h2 class="enhanceheader enhancehyperlink"><a class="enhancehyperlink" href="enhancements.html#pagefooter">Flex-box paradigm</a></h2>
                <p class="enhanceparagraph">The flexbox paradigm was applied to the html and CSS parts of the footer section, allowing for a more responsive website layout for both desktop and mobile sites. This is possible using flex containers and item properties, which allow us to centralise the positioning of our site layout. This is also implemented for a further increase of footer elements in a more scalable way as block model elements respectively within their relatively positioned parent container.</p>
                <h3>Code needed to implement the feature</h3>
                <div class="column">
                    <h3>HTML part</h3>
                    <p class="enhanceparagraph">html flex container, item, and content</p>
                    <ul>
                        <li> &#60;div class="flex-container"&#62; </li>
                        <li>&#160;&#160;&#60;div>1&#60;/div&#62;</li>
                        <li>&#160;&#160;&#60;div>2&#60;/div&#62;</li>
                        <li>&#160;&#160;&#60;div>3&#60;/div&#62;</li>
                        <li>&#60;/div&#62;</li>
                    </ul>
                </div>
                <div class="column">
                    <h3>CSS part</h3>
                    <h3>flex container properties</h3>
                    <ul>
                        <li>.flex-container{</li>
                        <li>&#160;&#160;&#160;&#160;display: flex;</li>
                        <li>&#160;&#160;&#160;&#160;flex-direction: row;</li>
                        <li>&#160;&#160;&#160;&#160;flex-wrap: wrap;</li>
                        <li>&#160;&#160;&#160;&#160;justify-content: stretch;</li>
                        <li>&#160;&#160;&#160;&#160;align-content}</li>
                    </ul>
                </div>
                <a class="referencehyperlink" href="https://www.w3schools.com/css/css3_flexbox.asp">Link to reference</a>
            </div>
        </section>
    </section>
    <!--End of enhancements body page-->
    <?php
        include_once "includes/footer.inc";
    ?>
</body>
</html>
