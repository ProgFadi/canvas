<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/fontawesome-free-5.15.3-web/css/all.min.css" />
    <link rel="stylesheet" href="./styles/common.css" />
    <link rel="stylesheet" href="./styles/index.css" />
</head>

<body onload="displayImage()">
    <header>
        <img id="logo" width="150px" height="50px" src="assets/images/CANVAS.svg" />
        <div id="div-ul">
            <ul id="menu-ul">
                <li> <a class="menu-items-white" href="index.html">HOME </a></li>
                <li> <a class="menu-items-white" href="#"> PAINTERS</a></li>
                <li> <a class="menu-items-white" href="#"> GALLERY</a></li>
                <li> <a class="menu-items-white" href="#">ABOUT US </a></li>

            </ul>
        </div>
        <i id="ibars" class="fas fa-bars bars"></i>
    </header>

    <section id="section1">
        <div id="section1-content" class="margin-sides">
            <!-- left side -->
            <img id="face-img-id" class="face-img" src="./assets/images/face-img.png" />
            <!-- right side -->
            <div id="section1-content-rs">
                <!-- top div of the right side -->
                <div>
                    <p id="p-quote">"Every canvas is a <br> journey all its own"</p>
                    <p id="writer-p">Helen Frankenthaler</p>
                </div>
                <button onclick="sum(4,8)" id="btn-see-more"> See More </button>
            </div>

        </div>
    </section>

    <!-- Section2 -->
    <section id="section2" class="tm fit-hv center-content-to-section">
        <div class="margin-sides">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img id="section2_left_img" src="./assets/images/section2_left.png" />

                    </div>
                    <div class="col-12 col-xl-6">
                        <div id="section2_right" style="min-height: 100%;">
                            <img src="./assets/images/logo.svg" />
                            <div id="section2_right_bottom">
                                <h1>A platform for painters and interested people.</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="section3" class="tm fit-hv center-content-to-section">

        <div style="padding-left: 0;" id="section3-content" class="container-fluid margin-sides">
            <p id="p-top-painter">Top Painters</p>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div style="height: 946px">
                        <p id="top-p-descr">Top painters have been choosen based on people rating</p>
                        <div class="div-joinus-2">
                            <img id="painter-img" class="painter-img-class" src="./assets/images/painter.jpg" />
                            <div id="div-joinus">
                                <p id="p-aup">Are you painter?</p>
                                <button id="btn-joinus" type="button" class="btn btn-warning">JOIN US</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 container-fluid">
                    <div class="row justify-content-around">
                        <?php
                        function dateToAge($birth)
                        {

                            $tz  = new DateTimeZone('Asia/Baghdad');
                            $age = DateTime::createFromFormat('Y-m-d', $birth, $tz)
                                ->diff(new DateTime('now', $tz))
                                ->y;
                            return $age;
                        }
                        // 1- connect to database
                        $con = mysqli_connect("localhost", "root", "", "canvas");
                        if ($con) {
                            // 2- get data
                            $query = "SELECT * FROM painters ORDER BY rate DESC LIMIT  0,4";

                            $results = mysqli_query($con, $query);
                            if ($results) {
                                $list = $results->fetch_all(MYSQLI_ASSOC); // 
                                if (count($list) > 0) {

                                    for ($i = 0; $i < count($list); $i++) {
                                        echo ' <div class="col-12 col-md-5 card p-card  mb-4">
                                       <div class="card-content">
                                           <div class="top-img">
                                               <img class="painter-img" src="./assets/images/painters/' . $list[$i]["image_name"] . '" />
                                               <div class="name-type">
                                                   <p>' . $list[$i]["full_name"] . '</p>
                                                   <p>' . $list[$i]["art_type"] . '</p>
                                               </div>
                                           </div>
                                       </div>
           
                                       <div class="p-card-info">
                                           <div class="p-card-info-left">
                                               <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span>' . dateToAge($list[$i]["birth"]) . '</span></div>
                                               <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span>' . $list[$i]["experience"] . '</span></div>
                                               <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> ' . $list[$i]["rate"] . '/5 </span></div>
                                           </div>
                                           <div class="p-card-info-right">
                                               <button class="btn-see-more">SEE MORE</button>
                                           </div>
                                       </div>
                                   </div>';
                                    }
                                } else {

                                    echo "<h1>Painters Not Found</h1>";
                                }
                            } else {
                                echo "<h1>Error in execute query</h1>";
                            }
                        } else {
                            echo "<h1>error while connecting to the db, try again</h1>";
                        }


                        ?>
                        <!-- <div class="col-5 card p-card  mb-4">
                            <div class="card-content">
                                <div class="top-img">
                                    <img class="painter-img" src="./assets/images/painter2.png" />
                                    <div class="name-type">
                                        <p>Fadi Ramzi Mohammed</p>
                                        <p>Art Type</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-card-info">
                                <div class="p-card-info-left">
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span> 35</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span> 5 Years</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> 4.5/5 </span></div>
                                </div>
                                <div class="p-card-info-right">
                                    <button class="btn-see-more">SEE MORE</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 card p-card  mb-4">
                            <div class="card-content">
                                <div class="top-img">
                                    <img class="painter-img" src="./assets/images/painter2.png" />
                                    <div class="name-type">
                                        <p>Fadi Ramzi Mohammed</p>
                                        <p>Art Type</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-card-info">
                                <div class="p-card-info-left">
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span> 35</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span> 5 Years</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> 4.5/5 </span></div>
                                </div>
                                <div class="p-card-info-right">
                                    <button class="btn-see-more">SEE MORE</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 card p-card  mb-4">
                            <div class="card-content">
                                <div class="top-img">
                                    <img class="painter-img" src="./assets/images/painter2.png" />
                                    <div class="name-type">
                                        <p>Fadi Ramzi Mohammed</p>
                                        <p>Art Type</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-card-info">
                                <div class="p-card-info-left">
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span> 35</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span> 5 Years</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> 4.5/5 </span></div>
                                </div>
                                <div class="p-card-info-right">
                                    <button class="btn-see-more">SEE MORE</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 card p-card  mb-4">
                            <div class="card-content">
                                <div class="top-img">
                                    <img class="painter-img" src="./assets/images/painter2.png" />
                                    <div class="name-type">
                                        <p>Fadi Ramzi Mohammed</p>
                                        <p>Art Type</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-card-info">
                                <div class="p-card-info-left">
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span> 35</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span> 5 Years</span></div>
                                    <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> 4.5/5 </span></div>
                                </div>
                                <div class="p-card-info-right">
                                    <button class="btn-see-more">SEE MORE</button>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <!-- <div class="row justify-content-around mt-4">
                    <div class=" col-5 card p-card  mb-4">
                        <div class="card-content">
                            <div class="top-img">
                            <img class="painter-img" src="./assets/images/painter2.png" />
                           <div class="name-type"> 
                            <p>Fadi Ramzi Mohammed</p>
                             <p>Art Type</p>
                           </div>
                            </div>
                        </div>

                        <div class="p-card-info">
                          <div class="p-card-info-left">
                            <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span> 35</span></div>
                            <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span> 5 Years</span></div>
                            <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> 4.5/5 </span></div>
                          </div>
                       <div class="p-card-info-right">
                           <button class="btn-see-more">SEE MORE</button>
                       </div>
                        </div>
                       </div>
                       <div class=" col-5 card p-card  mb-4">
                        <div class="card-content">
                            <div class="top-img">
                            <img class="painter-img" src="./assets/images/painter2.png" />
                           <div class="name-type"> 
                            <p>Fadi Ramzi Mohammed</p>
                             <p>Art Type</p>
                           </div>
                            </div>
                        </div>

                        <div class="p-card-info">
                          <div class="p-card-info-left">
                            <div class="p-card-info-row"><span class="p-card-info-row-title">AGE: </span> <span> 35</span></div>
                            <div class="p-card-info-row"><span class="p-card-info-row-title">Experience: </span> <span> 5 Years</span></div>
                            <div class="p-card-info-row"><span class="p-card-info-row-title">Rating: </span> <span> 4.5/5 </span></div>
                          </div>
                       <div class="col-5 p-card-info-right">
                           <button class="btn-see-more">SEE MORE</button>
                       </div>
                        </div>
                       </div>
                    
                   </div> -->

                </div>
            </div>
        </div>
    </section>
    <!-- Section 4 -->
    <section id="section4" class="tm fit-hv center-content-to-section">
        <div class="margin-sides">
            <div class="container-fluid justify-h">
                <div class="row" style="height:100%;">
                    <div class="col-6" id="section4-left">
                        <div id="section4-left-content">
                            <h1 style="color: #FFD6A0;">
                                There Are A lot Of Arts
                                Waiting For You
                            </h1>
                            <!-- Button div -->
                            <a id="btn-gallery" href="gallery.html">Visit <span id="span-gallery">Gallery </span></a>


                        </div>
                    </div>
                    <div class="col-6" id="section4-right">
                        <div>
                            <img src="./assets/images/gallery_pic.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section5 -->
    <section id="section5" class="tm fit-hv center-content-to-section">
        <div class="margin-sides">
            <div class="container-fluid justify-h">
                <div class="row" style="height:100%;">
                    <div class="col-6" id="section4-left">
                        <div id="section5-left-content">
                            <img src="./assets/images/shop_pic.svg" />

                        </div>
                    </div>
                    <div class="col-6" id="section5-right">
                        <div id="shop-text-div">
                            <div>
                                <h1>CANVAS SHOP</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                            </div>
                            <div>
                                <button id="btn-shop">SHOP NOW</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section6 - footer -->
    <section id="section5" class="tm fit-hv center-content-to-section">
      
              
                    <div id="footer-b-part">
                        <div id="footer-content" class="margin-sides">
                            <div id="footer-content-contact">
                                <h1 style="color:#FFD6A0;">
                                    Contact us
                                </h1>
                                <ul>
                                    <li><i class="fas fa-envelope"></i>  <span>example@email.com</span></li>
                                    <li><i class="fas fa-phone"></i> <span> +964771558000XX</span></li>
                                    <li><i class="fas fa-location-arrow"></i>  <span> Iraq, Baghdad</span></li>
                                </ul>
                            </div>
                            <div id="footer-content-copy">
                            <div>
                            <a href="#"><i class="fab fa-facebook" style="color:white;"></i></a>
                               <a href="#"><i class="fab fa-instagram" style="color:white;"></i></a> 
                                </div>
                              
                              
                                <p style="color:#FFFFFF;">copyrights@2021 BY MK</p>
                            </div>
                        </div>

                        <!-- image floating -->

                        <img id="img-btn-logo" src="./assets/images/circle.svg"/>
                    </div>
            
    </section>

    <!-- Comment -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>
