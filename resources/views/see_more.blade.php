<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/see_more.css">
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    <title>TESDA Qualifications - Visual Graphic Design NCIII</title>
</head>
<body>
    <header>
        <div class="header-content">
            <img src="{{URL::asset('image-website/logo.png');}}" alt="NOLITC Logo" class="logo">
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
    <main>
        <section class="qualification-banner">
            <a href="{{route('tesda_qual')}}">
                <img src="{{URL::asset('image-website/Polygon 1.png');}}" alt="polygon" class="polygon" onclick="window.location = '{{route('tesda_qual')}}'">
            </a>
            <h1>TESDA QUALIFICATIONS</h1>
        </section>
        <section class="qualification-details">
            <h2>{{$datas->name}}</h2>
            <p class="hours">({{$datas->hours}} hours)</p>
            <div class="image-container">
                <img src="{{URL::asset('assets/img/'.$datas->img_name);}}" alt="{{$datas->name}}">
            </div>
            <p class="description">
                {{$datas->caption}}
            </p>
        </section>
        <section class="additional-details">
            <div class="qualifications">
                <h3>QUALIFICATIONS</h3>
                <ul>
                   @foreach ($datas->qualifications as $qualification)
                    <li>{{$qualification->qualification}}</li>
                   @endforeach
                </ul>
                <a href="/register"><button class="register-button">Register Now</button></a>
            </div>
            <div class="benefits">
                <h3>Benefits:</h3>
                <ul>
                    @foreach ($datas->benefits as $benefits)
                    <li>{{$benefits->benefit}}</li>
                    @endforeach

                </ul>
            </div>
            <div class="core-competencies">
                <h3>Core Competencies:</h3>
                <ul>
                    @foreach ($datas->competencies as $competencies)
                    <li>{{$competencies->competencie}}</li>
                    @endforeach

                </ul>
            </div>
        </section>
    </main>

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
          <img src="{{URL::asset('image-website/phil-seal 1.png');}}" alt="logo" class="pic">
        </div>
    </footer>

</body>
</html>
