<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="About Page" />
    <meta name="keywords" content="about"/>
    <meta name="author" content="Michael Haryanto, Phuthai, Narongdech, Roshaan, Hirad"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cabin:wght@700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&family=Pacifico&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Camera Purchase Web Application: About</title>
</head>

<body>
    <?php
        include_once "includes/header.inc";
    ?>

    <!-- <section id ="about-body"> -->
    <section id = "h-n-hr">
        <h1 id ="members">Project Team Members</h1>
        <hr>
    </section>


        <!-- ROSHAAN's INFO -->
        <section id ="ROSHAAN" class ="about-members">
            <table id ="roshaan-tt" class="about-tts">
                <thead>
                    <tr>
                        <th class ="about-tt-h" colspan ="6"><strong>Swinburne Student Timetable Details</strong></th>
                    </tr>
                    <tr class ="about-tt-TnD">
                        <th rowspan ="2">Time</th>
                        <th colspan ="5">Days of The Week</th>
                    </tr>
                    <tr>
                        <th class ="ttcolumn">Monday</th>
                        <th class ="ttcolumn">Tuesday</th>
                        <th class ="ttcolumn">Wednesday</th>
                        <th class ="ttcolumn">Thursday</th>
                        <th class ="ttcolumn">Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class =about-t1>08:00 am</th>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td rowspan="14"></td>
                        <td rowspan="2"></td>
                        <td rowspan="24"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>08:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>09:00 am</th>
                        <td rowspan="2" class="COS10026" ><strong>COS10026</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                        <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                        <td rowspan="4" class="COS10004"><strong>COS10004</strong><br>Lab 1(9)<br>Hawthorn BA405</td>
                    </tr>
                    <tr>
                        <th class =about-t2>09:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>10:00 am</th>
                        <td rowspan="6"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>10:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>11:00 am</th>
                        <td rowspan="18"></td>
                        <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Workshop 1(8)<br>Hawthorn AS404</td>
                    </tr>
                    <tr>
                        <th class =about-t2>11:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>12:00 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t2>12:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>01:00 pm</th>
                        <td rowspan="4" class="TNE10006"><strong>TNE10006</strong><br>Lecture 1(1)<br>Hawthorn BA201</td>
                        <td rowspan="4"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>01:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>02:00 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t2>02:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>03:00 pm</th>
                        <td rowspan="2" class="COS10004"><strong>COS10004</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                        <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Lab 1(19)<br>Hawthorn ATC325</td>
                        <td rowspan="4" class="COS10026" ><strong>COS10026</strong><br>Workshop 1(8)<br>Hawthorn EN402</td>
                    </tr>
                    <tr>
                        <th class =about-t2>03:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>04:00 pm</th>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>04:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>05:00 pm</th>
                        <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Seminar 1(1)<br>Hawthorn ATC627</td>
                        <td rowspan="2"></td>
                        <td rowspan="6"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>05:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>06:00 pm</th>
                        <td rowspan="4"></td>
                        <td rowspan="4" class="TNE10006"><strong>TNE10006</strong><br>Lab 1(13)<br>Hawthorn ATC328</td>
                    </tr>
                    <tr>
                        <th class =about-t2>06:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>07:00 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t2>07:30 pm</th>
                    </tr>
                </tbody>
            </table>
            <figure id ="f-roshaan-photo" class ="about-figures">
                <img id ="roshaan-photo" class ="about-photos"  src= "images/_roshaan.jpg" alt= "Roshaan's photo" >
            </figure>
            <div id ="roshaan-info" class ="about-info">
            <dl>
                <dt><strong>Name</strong></dt>       <dd>Roshaan Cheema</dd>
                <dt><strong>Student ID</strong></dt> <dd>s102992866</dd>
                <dt><strong>Course</strong></dt>     <dd>Bachelor of Computer Science</dd>
                <dt><strong>Email</strong></dt>      <dd><a class ="about-emails" href ="mailto:102992866@student.swin.edu.au">102992866@student.swin.edu.au</a></dd>
            </dl>
        </section>
        <!-- <p class ="about-icons"><i class="material-icons">cloud</i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">cloud</i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">cloud</i></p> -->
        <!-- HIRAD's INFO -->
        <section id ="HIRAD" class ="about-members">
            <table id ="hirad-tt" class ="about-tts">
                <thead>
                    <tr>
                        <th class ="about-tt-h" colspan ="6"><strong>Swinburne Student Timetable Details</strong></th>
                    </tr>
                    <tr class ="about-tt-TnD">
                        <th rowspan ="2">Time</th>
                        <th colspan ="5">Days of The Week</th>
                    </tr>
                    <tr>
                        <th class ="ttcolumn">Monday</th>
                        <th class ="ttcolumn">Tuesday</th>
                        <th class ="ttcolumn">Wednesday</th>
                        <th class ="ttcolumn">Thursday</th>
                        <th class ="ttcolumn">Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class =about-t1>08:00 am</th>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td rowspan="14"></td>
                        <td rowspan="2"></td>
                        <td rowspan="24"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>08:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>09:00 am</th>
                        <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                        <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                        <td rowspan="4" class="COS10004"><strong>COS10004</strong><br>Lab 1(2)<br>Hawthorn ATC325</td>
                    </tr>
                    <tr>
                        <th class =about-t2>09:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>10:00 am</th>
                        <td rowspan="6"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>10:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>11:00 am</th>
                        <td rowspan="12"></td>
                        <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Workshop 1(8)<br>Hawthorn AS404</td>
                    </tr>
                    <tr>
                        <th class =about-t2>11:30 am</th>
                    </tr>
                    <tr>
                        <th class =about-t1>12:00 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t2>12:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>01:00 pm</th>
                        <td rowspan="4" class="TNE10006"><strong>TNE10006</strong><br>Lecture 1(1)<br>Hawthorn BA201</td>
                        <td rowspan="4"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>01:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>02:00 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t2>02:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>03:00 pm</th>
                        <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Seminar 1(7)<br>Hawthorn ATC627</td>
                        <td rowspan="6" class="TNE10006"><strong>TNE10006</strong><br>Lab 1(1)<br>Hawthorn ATC329</td>
                        <td rowspan="4" class="COS10026"><strong>COS10026</strong><br>Workshop 1(8)<br>Hawthorn EN402</td>
                    </tr>
                    <tr>
                        <th class =about-t2>03:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>04:00 pm</th>
                        <td rowspan="8"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>04:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>05:00 pm</th>
                        <td rowspan="4" class ="COS10009"><strong>COS10009</strong><br>Lab 1(4)<br>Hawthorn ATC625</td>
                        <td rowspan="6"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>05:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>06:00 pm</th>
                        <td rowspan="4"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>06:30 pm</th>
                    </tr>
                    <tr>
                        <th class =about-t1>07:00 pm</th>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <th class =about-t2>07:30 pm</th>
                    </tr>
                </tbody>
            </table>
            <figure id ="f-hirad-photo" class ="about-figures">
                <img id ="hirad-photo" class="about-photos" src="images/_hirwd.jpg" alt="Hirad's photo" >
            </figure>
            <div id ="hirad-info" class ="about-info">
            <dl>
                <dt><strong>Name</strong></dt>       <dd>Hirad Ostovar</dd>
                <dt><strong>Student ID</strong></dt> <dd>s104166825</dd>
                <dt><strong>Course</strong></dt>     <dd>Bachelor of Computer Science</dd>
                <dt><strong>Email</strong></dt>      <dd><a class ="about-emails" href ="mailto:104166825@student.swin.edu.au">104166825@student.swin.edu.au</a></dd>
            </dl>
            </div>
        </section>
        <!-- MICHAEL's INFO -->
        <section id ="MICHAEL" class ="about-members">
            <table id ="michael-tt" class="about-tts">
            <thead>
                <tr>
                    <th class ="about-tt-h" colspan ="6"><strong>Swinburne Student Timetable Details</strong></th>
                </tr>
                <tr class ="about-tt-TnD">
                    <th rowspan ="2">Time</th>
                    <th colspan ="5">Days of The Week</th>
                </tr>
                <tr>
                    <th class ="ttcolumn">Monday</th>
                    <th class ="ttcolumn">Tuesday</th>
                    <th class ="ttcolumn">Wednesday</th>
                    <th class ="ttcolumn">Thursday</th>
                    <th class ="ttcolumn">Friday</th>
                    </tr>
            </thead>
            <tbody>
                <tr>
                    <th class =about-t1>08:00 am</th>
                    <td rowspan="2"></td>
                    <td rowspan="2"></td>
                    <td rowspan="24"></td>
                    <td rowspan="10"></td>
                    <td rowspan="6"></td>
                </tr>
                <tr>
                    <th class =about-t2>08:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>09:00 am</th>
                    <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                    <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                </tr>
                <tr>
                    <th class =about-t2>09:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>10:00 am</th>
                    <td rowspan="6"></td>
                </tr>
                <tr>
                    <th class =about-t2>10:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>11:00 am</th>
                    <td rowspan="8"></td>
                    <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Workshop 1(9)<br>Hawthorn EN213</td>
                </tr>
                <tr>
                    <th class =about-t2>11:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>12:00 pm</th>
                </tr>
                <tr>
                    <th class =about-t2>12:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>01:00 pm</th>
                    <td rowspan="4" class="TNE10006"><strong>TNE10006</strong><br>Lecture 1(2)<br>Hawthorn BA403</td>
                    <td rowspan="4" class="COS10025"><strong>COS10025</strong><br>Workshop 1(21)<br>Hawthorn EN303</td>
                    <td rowspan="14"></td>
                </tr>
                <tr>
                    <th class =about-t2>01:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>02:00 pm</th>
                </tr>
                    <tr>
                    <th class =about-t2>02:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>03:00 pm</th>
                    <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Seminar 1(7)<br>Hawthorn ATC627</td>
                    <td rowspan="4" class="COS10009"><strong>COS10009</strong><br>Lab 1(18)<br>Hawthorn AS405</td>
                    <td rowspan="4" class="COS10026"><strong>COS10026</strong><br>Workshop 1(8)<br>Hawthorn EN402</td>
                </tr>
                <tr>
                    <th class =about-t2>03:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>04:00 pm</th>
                    <td rowspan="8"></td>
                </tr>
                <tr>
                    <th class =about-t2>04:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>05:00 pm</th>
                    <td rowspan="2"></td>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th class =about-t2>05:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>06:00 pm</th>
                    <td rowspan="2" class="COS10025"><strong>COS10025</strong><br>Seminar 1(1)<br>Hawthorn ONLINE</td>
                    <td rowspan="4" class="TNE10006"><strong>TNE10006</strong><br>Lab 1(18)<br>Hawthorn ATC328</td>
                </tr>
                <tr>
                    <th class =about-t2>06:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>07:00 pm</th>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th class =about-t2>07:30 pm</th>
                </tr>
            </tbody>
            </table>
            <figure id ="f-michael-photo" class ="about-figures">
                <img id ="michael-photo" class="about-photos" src="images/_michael.jpg" alt="Michael's photo" >
            </figure>
            <div id ="micheal-info" class ="about-info">
            <dl>
                <dt><strong>Name</strong></dt>       <dd>Michael Haryanto</dd>
                <dt><strong>Student ID</strong></dt> <dd>s103841613</dd>
                <dt><strong>Course</strong></dt>     <dd>Bachelor of computer science</dd>
                <dt><strong>Email</strong></dt>      <dd><a class ="about-emails" href ="mailto:103841613@student.swin.edu.au">103841613@student.swin.edu.au</a></dd>
            </dl>
            </div>
        </section>
        <!-- PHUTHAI's INFO -->
        <section id ="PHUTHAI" class ="about-members">
            <table id ="phuthai-tt" class="about-tts">
            <thead>
                <tr>
                    <th class ="about-tt-h" colspan ="6"><strong>Swinburne Student Timetable Details</strong></th>
                </tr>
                <tr class ="about-tt-TnD">
                    <th rowspan ="2">Time</th>
                    <th colspan ="5">Days of The Week</th>
                </tr>
                <tr>
                    <th class ="ttcolumn">Monday</th>
                    <th class ="ttcolumn">Tuesday</th>
                    <th class ="ttcolumn">Wednesday</th>
                    <th class ="ttcolumn">Thursday</th>
                    <th class ="ttcolumn">Friday</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class =about-t1>08:00 am</th>
                    <td rowspan="2"></td>
                    <td rowspan="20"></td>
                    <td rowspan="2"></td>
                    <td rowspan="14"></td>
                    <td rowspan="6"></td>
                </tr>
                <tr>
                    <th class =about-t2>08:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>09:00 am</th>
                    <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                    <td rowspan="4" class="COS20007"><strong>COS20007</strong><br>Lab 1(10)<br>Hawthorn EN310</td>
                </tr>
                <tr>
                    <th class =about-t2>09:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>10:00 am</th>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th class =about-t2>10:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>11:00 am</th>
                    <td rowspan="2" class="TNE10005"><strong>TNE10005</strong><br>Lecture 1(1)<br>Hawthorn EN102</td>
                    <td rowspan="18"></td>
                    <td rowspan="4" class="COS10025"><strong>COS10025</strong><br>Workshop 1(9)<br>Hawthorn BA708</td>
                </tr>
                <tr>
                    <th class =about-t2>11:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>12:00 pm</th>
                    <td rowspan="2" class="COS20007"><strong>COS20007</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                </tr>
                <tr>
                    <th class =about-t2>12:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>01:00 pm</th>
                    <td rowspan="2"></td>
                    <td rowspan="14"></td>
                </tr>
                <tr>
                    <th class =about-t2>01:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>02:00 pm</th>
                    <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Seminar 1(6)<br>Hawthorn ATC627</td>
                </tr>
                <tr>
                    <th class =about-t2>02:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>03:00 pm</th>
                    <td rowspan="10"></td>
                    <td rowspan="4" class="COS10026" ><strong>COS10026</strong><br>Workshop 1(8)<br>Hawthorn EN402</td>
                </tr>
                <tr>
                    <th class =about-t2>03:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>04:00 pm</th>
                </tr>
                <tr>
                    <th class =about-t2>04:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>05:00 pm</th>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th class =about-t2>05:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>06:00 pm</th>
                    <td rowspan="2" class="COS10025" ><strong>COS10025</strong><br>Seminar 1(1)<br>Hawthorn ONLINE</td>
                    <td rowspan="4" class="TNE10005"><strong>TNE10005</strong><br>Practical 1(9)<br>Hawthorn ATC626</td>
                </tr>
                <tr>
                    <th class =about-t2>06:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>07:00 pm</th>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th class =about-t2>07:30 pm</th>
                </tr>
            </tbody>
            </table>
            <figure id ="f-phuthai-photo" class ="about-figures" >
                <img id ="phuthai-photo" class ="about-photos" src="images/_phuthai.jpg" alt="Phuthai's photo" >
            </figure>
            <div id ="phuthai-info" class ="about-info">
            <dl>
                <dt><strong>Name</strong></dt>       <dd>Phuthai Hemathulintra</dd>
                <dt><strong>Student ID</strong></dt> <dd>s103804205</dd>
                <dt><strong>Course</strong></dt>     <dd>Bachelor of Computer Science</dd>
                <dt><strong>Email</strong></dt>      <dd><a class ="about-emails" href ="mailto:103804205@student.swin.edu.au">103804205@student.swin.edu.au</a></dd>
            </dl>
            </div>
        </section>
        <!-- NARONGDECH's INFO -->
        <section id ="NARONGDECH" class ="about-members">
            <table id ="narongdech-tt" class="about-tts">
            <thead>
                <tr>
                    <th class ="about-tt-h" colspan ="6"><strong>Swinburne Student Timetable Details</strong></th>
                </tr>
                <tr class ="about-tt-TnD">
                    <th rowspan ="2">Time</th>
                    <th colspan ="5">Days of The Week</th>
                </tr>
                <tr>
                    <th class ="ttcolumn">Monday</th>
                    <th class ="ttcolumn">Tuesday</th>
                    <th class ="ttcolumn">Wednesday</th>
                    <th class ="ttcolumn">Thursday</th>
                    <th class ="ttcolumn">Friday</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class =about-t1>08:00 am</th>
                    <td rowspan="2"></td>
                    <td rowspan="10"></td>
                    <td rowspan="24"></td>
                    <td rowspan="14"></td>
                    <td rowspan="6"></td>
                </tr>
                <tr>
                    <th class =about-t2>08:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>09:00 am</th>
                    <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                </tr>
                <tr>
                    <th class =about-t2>09:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>10:00 am</th>
                    <td rowspan="4"></td>
                </tr>
                <tr>
                    <th class =about-t2>10:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>11:00 am</th>
                    <td rowspan="4" class="COS10025"><strong>COS10025</strong><br>Workshop 1(10)<br>Hawthorn ATC320</td>
                </tr>
                <tr>
                    <th class =about-t2>11:30 am</th>
                </tr>
                <tr>
                    <th class =about-t1>12:00 pm</th>
                    <td rowspan="2" class="COS20007"><strong>COS20007</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                </tr>
                <tr>
                    <th class =about-t2>12:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>01:00 pm</th>
                    <td rowspan="2"></td>
                    <td rowspan="4" class="COS10004" ><strong>COS10004</strong><br>Lab 1(20)<br>Hawthorn ATC627</td>
                    <td rowspan="4"></td>
                </tr>
                <tr>
                    <th class =about-t2>01:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>02:00 pm</th>
                    <td rowspan="2" class="COS10026"><strong>COS10026</strong><br>Seminar 1(6)<br>Hawthorn ATC627</td>
                </tr>
                <tr>
                    <th class =about-t2>02:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>03:00 pm</th>
                    <td rowspan="2" class="COS10004"><strong>COS10004</strong><br>Live Online 1(1)<br>Hawthorn ONLINE</td>
                    <td rowspan="6"></td>
                    <td rowspan="4" class="COS10026"><strong>COS10026</strong><br>Workshop 1(8)<br>Hawthorn EN402</td>
                    <td rowspan="4" class="COS20007"><strong>COS20007</strong><br>Lab 1(18)<br>Hawthorn EN310</td>
                </tr>
                <tr>
                    <th class =about-t2>03:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>04:00 pm</th>
                    <td rowspan="8"></td>
                </tr>
                <tr>
                    <th class =about-t2>04:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>05:00 pm</th>
                    <td rowspan="6"></td>
                    <td rowspan="6"></td>
                </tr>
                <tr>
                    <th class =about-t2>05:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>06:00 pm</th>
                    <td rowspan="2" class="COS10025"><strong>COS10025</strong><br>Seminar 1(1)<br>Hawthorn ONLINE</td>
                </tr>
                <tr>
                    <th class =about-t2>06:30 pm</th>
                </tr>
                <tr>
                    <th class =about-t1>07:00 pm</th>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th class =about-t2>07:30 pm</th>
                </tr>
            </tbody>
            </table>
            <figure id ="f-narongdech-photo" class ="about-figures">
                <img id ="narongdech-photo" class="about-photos" src="images/_narongdech.jpg" alt="narongdech's photo" >
            </figure>
            <div id ="narongdech-info" class ="about-info">
            <dl>
                <dt><strong>Name</strong></dt>       <dd>Narongdech Soontornekajit</dd>
                <dt><strong>Student ID</strong></dt> <dd>s103498705</dd>
                <dt><strong>Course</strong></dt>     <dd>Bachelor of Computer Science</dd>
                <dt><strong>Email</strong></dt>      <dd><a class ="about-emails" href ="mailto:103498705@student.swin.edu.au">103498705@student.swin.edu.au</a></dd>
            </dl>
            </div>
        </section>

	<?php
        include_once "includes/footer.inc";
    ?>
</body>
