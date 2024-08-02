<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOLITC</title>
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    <link rel="stylesheet" href="/css/welcome.css">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="image-website/logo.png" alt="NOLITC Logo" class="logo">
            <h2>NEGROS OCCIDENTAL LANGUANGE <br>AND INFORMATION TECHNOLOGY  CENTER</h2>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/#programs">Programs</a></li>
                    <li><a href="/#updates">Updates</a></li>
                    <li><a href="/#about">About Us</a></li>
                    <li><a href="/#contact">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="intro">
            <img src="{{'./assets/img/'.$datas->image}}" alt="Group of Students" class="student">
        <h1>Upskill Your Way to Success at NOLITC</h1>
        <p>Unlock your potential and pave the way to success with NOLITC's upskilling programs!</p>
        <a href="/register"><button>Register Now!</button></a>
    </section>

    <section id="about" class="about">
        <span class="span"></span>
        <img src="image-website/mascot.png" alt="NOLITC Mascot" class="mascot">
        <p>
            The Negros Occidental Language and Information Technology Center (NOLITC) is a preferred human resource provider of leading Business Process Management companies in Negros Occidental. It is the only government-run language and IT center in Negros island, duly registered and accredited by TESDA. NOLITC is a talent development initiative of the Provincial Government of Negros Occidental geared towards poverty reduction in the countryside.
        </p>
        <a href="{{route('know_more')}}"><button class="know">Know more</button></a>
        <img src="image-website/Abanse-Negrense-Logo-horizontal-Transparent 1.png" alt="abanse negrense" class="abanse">
        <img src="image-website/nolitc inspire 1.png" alt="nolitc" class="nolitc">
    </section>

    <section id="programs" class="programs">
        <h1 class="program">Programs</h1>

        <div class="program-cards">
            <div class="card">
                    <img src="image-website/program 1.png" alt="TESDA Qualifications" class="tesda">
                <h3>TESDA<br>Qualifications</h3>
                <a href="{{route('tesda_qual')}}">See more</a>
            </div>

            <div class="card">
                    <img src="image-website/program 2.png" alt="TESDA Accredited Assessment Center" class="tesda">
                <h3>TESDA Accredited <br> Assessment Center</h3>
                <a href="#">See more</a>
            </div>

            <div class="card">
                    <img src="image-website/program 3.png" alt="Special Programs" class="tesda">
                <h3>Special <br> Programs</h3>
                <a href="#">See more</a>
            </div>
        </div>
    </section>

    <section id="updates" class="updates">
        <h1>NOLITC Updates</h1>

        <div class="carousel">
        <div class="update-cards">
            <div class="card" id="mindset">
                <img src="image-website/mask group 3.jpg" alt="Update 1">
                <p>Talk Focusing Positive Mindset</p>
                <span>May 7, 2024</span>
                <a href="#" class="read">Read more</a>
                <a href="#215th" class="previous round">&#8249;</a>
                <a href="#216th" class="next round">&#8250;</a>
            </div>

            <div class="card" id="216th">
                <img src="image-website/Mask group.png" alt="Update 2">
                <p>NOLITC’s 216th Culmination Ceremony</p>
                <span>May 7, 2024</span>
                <a href="#" class="read">Read more</a>
            </div>

            <div class="card" id="panaad">
                <img src="image-website/Mask group (1).png" alt="Update 3">
                <p>2nd Panaad sa Negros Festival: MLBB <br> Governor’s Cup Esports Competition 2024</p>
                <span class="date">April 18, 2024</span>
                <a href="#" class="more">Read more</a>
            </div>

            <div class="card" id="215th" >
                <img src="image-website/mask group 2.jpg" alt="Update 4">
                <p>NOLITC’s 215th Culmination Ceremony</p>
                <span>April 12, 2024</span>
                <a href="#" class="read">Read more</a>
            </div>
        </div>
    </div>
    </section>

    <section id="scorecard" class="scorecard">
        <h1>Our score card</h1>
        <div class="scorecard-metrics">
            <div class="metric">
                <h3>{{$scoreCard->number_of_graduates}}</h3>
                <p>Graduates</p>
            </div>
            <div class="metric">
                <h3>{{$scoreCard->number_of_employed}}</h3>
                <p>Employed</p>
            </div>
            <div class="metric">
                <h3>{{$scoreCard->employment_rate}}%</h3>
                <p>Employment Rate</p>
            </div>
        </div>
    </section>

    <section id="partners" class="partners">
        <h1>Our partners</h1>
        <div class="partner-logos">

            <div class="mySlides fade">
                <a href="https://www.negros-occ.gov.ph/abanse-negrense/"><img src="image-website/abanse.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.deped.gov.ph/"><img src="image-website/education.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.tesda.gov.ph/"><img src="image-website/tesda.png" alt="Partner 1" class="image1"></a>
                <a href="https://dict.gov.ph/"><img src="image-website/dict.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://tech4edcenters.wordpress.com/what-is-tech4ed/"><img src="image-website/tech4ed.png" alt="Partner 1" class="image1"></a>
                <a href="https://nt.gov.au/"><img src="image-website/northern.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.hugedomains.com/domain_profile.cfm?d=bnefit.com"><img src="image-website/bnefit.png" alt="Partner 1" class="image1"></a>
                <a href="https://afs.org/"><img src="image-website/afs.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.animationcouncil.org/"><img src="image-website/acpi.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.facebook.com/OutdoMediaSolutions/"><img src="image-website/outdo.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.tooncityanimation.com/Home.php"><img src="image-website/toon.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.coderstribe.net/"><img src="image-website/coders tribe.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.facebook.com/stratiumsoftware/"><img src="image-website/stratium.png" alt="Partner 1" class="image1"></a>
                <a href="https://transcom.com/"><img src="image-website/transcom.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.linkedin.com/company/arbcallfacilitiesinc"><img src="image-website/arb.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.ttec.com/"><img src="image-website/teletech.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.panasiaticsolutions.com/"><img src="image-website/panasiatic.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.concentrix.com/"><img src="image-website/concentrix.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.focusservices.com/"><img src="image-website/focus.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.iqor.com/"><img src="image-website/iqor.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.ubiquity.com/"><img src="image-website/ubiq.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.servicefirstcx.com/"><img src="image-website/service.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.teleperformance.com/"><img src="image-website/teleporformance.png" alt="Partner 1" class="image1"></a>
            </div>


            <div style="text-align:center" >
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

        </div>
    </section>

    <footer class="footer">
        <h3 class="republic">REPUBLIC OF THE PHILIPPINES</h3><br>
        <p class="content">All content is the public domain unless<br>otherwise stated</p>

        <h3 class="ph">ABOUT GOV.PH</h3><br>
        <p class="learn">Learn more about Philippine Goverment, its<br>structure, how government works and the<br>people behind it</p>
        <p class="gov1">GOV.PH</p>
        <p class="gov2">Open Data Patrol</p>
        <p class="gov3">Official Gazettte</p>

        <h3 class="goverment">GOVERMENT LINKS</h3>
        <div class="links">
          <a href="https://op-proper.gov.ph/" class="pres">Office of the President</a>
          <a href="https://www.ovp.gov.ph/" class="vice">Office of the Vice President</a>
          <a href="https://legacy.senate.gov.ph/" class="senate">Senate of the Philippines</a>
          <a href="https://www.congress.gov.ph/" class="house">House of the Representative</a>
          <a href="https://sc.judiciary.gov.ph/" class="supreme">Supreme Court</a>
          <a href="https://ca.judiciary.gov.ph/" class="appeals">Court of Appeals</a>
          <a href="https://sb.judiciary.gov.ph/" class="sandigan">Sandigan Bayan</a>
          <a href="https://www.negros-occ.gov.ph/" class="negros">Province of Negros Occidental</a>

          <h3 class="visit">Visit Us</h3>
          <p class="paglaum">Paglaum Sports Complex<br>Hernaez St.Bacolod City,<br>Negros Occidental</p>
          <p class="phone">Telephone: (034) 435 6092<br>Email: nolitc@gmail.com</p>
          <img src="image-website/phil-seal 1.png" alt="logo" class="pic">
        </div>
    </footer>

    <script src="js/welcome.js"></script>
</body>
</html>
