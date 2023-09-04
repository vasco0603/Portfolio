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

    <!--Product Page Body-->
    <div id="productbody">
        <h1 id="contenttitle">Product Range</h1>
        <hr>
        <aside id="productasidebar">
            <table id="asidetable" >
                <tr>
                    <th class="asidehyperlink">Camera Types</th>
                </tr>
                <tr>
                    <td><a href="#compactcamera" class="asidehyperlink">Compact</a></td>
                </tr>
                <tr>
                    <td><a href="#mirrorlesscamera" class="asidehyperlink">Mirrorless</a></td>
                </tr>
                <tr>
                    <td><a href="#dslrcamera" class="asidehyperlink">DSLR</a></td>
                </tr>
                <tr>
                    <td><a href="#videocamera" class="asidehyperlink">Video</a></td>
                </tr>
            </table>
        </aside>

            <section id="compactcamera">
                <h1>Compact Camera</h1>

                <article id="compact1">
                    <img src="images/compactcam1.png" alt="compactimg1" id="compactimg1">
                    <h2>Canon PowerShot G7X Mark III Digital Camera</h2>
                    <h3>&#36;905</h3>
                    <p>The compact G7 X Mark III is THE vlogging camera, with key features including 20.1 Megapixel Stacked CMOS Sensor, Live Streaming to YouTube4K (30p), Full HD (120p), HD Video Recording.</p>
                </article>

                <article id="compact2">
                    <img src="images/compactcam2.png" alt="compactimg2" id="compactimg2">
                    <h2>Sony Cyber-shot DSC-RX100 VII</h2>
                    <h3>&#36;1205</h3>
                    <p>Another compact camera, the RX100 VII is packed with features allowing for gorgeous image quality, including a fast 20fps tracking speed, a 24-200mm1 zoom lens, allowing for 7 still images a second.</p>
                </article>
            </section>

            <section id="mirrorlesscamera">
                <h1>Mirrorless Camera</h1>
                <article id="mirrorless1">
                    <img src="images/mirrorcam1.png" alt="mirrorimg1" id="mirrorimg1">
                    <h2>Sony A1</h2>
                    <h3>&#36;5090</h3>
                    <p>The Sony A1, a jack of all trades camera, allowing for high speed shots, slow-speed landscape photos and video, it comes with a 50 megapixel camera shooting at upto 90fps speeds.</p>
                </article>

                <article id="mirrorless2">
                    <img src="images/mirrorcam2.png" alt="mirrorimg1" id="mirrorimg2">
                    <h2>Sony A9 II</h2>
                    <h3>&#36;6205</h3>
                    <p>While the A9 II (compared to the A1) has a lower megapixel quality at 24.2, it features improved colour reproduction, being better optimized for still photography, also including settings to further customize images, and an effective autofocus.</p>
                </article>
            </section>

            <section id="dslrcamera">
                <h1>DSLR Camera</h1>
                <article id="dslr1">
                    <img src="images/dslrcam1.png" alt="dslrimg1" id="dslrimg1">
                    <h2>Nikon D7500</h2>
                    <h3>&#36;1200</h3>
                    <p>The D7500 is built to perform, with swift speeds, 4k Ultra HD-video recording, excellent autofocus and a wide set of creative tools.</p>
                </article>
                <article id="dslr2">
                    <img src="images/dslrcam2.png" alt="dslrimg2" id="dslrimg2">
                    <h2>Canon EOS R10</h2>
                    <h3>&#36;1415</h3>
                    <p>The EOS r10 allows for high end tracking, and like the D7500, exceptional autofocus, 4k Ultra-HD video, and creativity in editing photographs. </p>
                </article>
            </section>

            <section id="videocamera">
                <h1>Video Camera</h1>
                <article id="video1">
                    <img src="images/videocam1.png" alt="videoimg1" id="videoimg1">
                    <h2>Panasonic HC x1500</h2>
                    <h3>&#36;2650</h3>
                    <p>The HC x1500 is as far as camcorders go, extremely light, while also allowing for 4k 60fps recording with a long life battery and a 25mm wide angle shot.</p>
                </article>
                <article id="video2">
                    <img src="images/videocam2.png" alt="videoimg2" id="videoimg2">
                    <h2>Panasonic HC x2000</h2>
                    <h3>&#36;3455</h3>
                    <p>The x2000 like the x1500, is also an extremely light camera for a camcorder, with exceptional video quality and battery as well. It does include a few additional features, such as sensor shift, allowing for greater stabilization when taking photos/recording</p>
                </article>
            </section>
    </div>

    <!--End of Product body page-->
    <?php
        include_once "includes/footer.inc";
    ?>
</body>
</html>
