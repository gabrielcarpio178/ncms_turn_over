<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="icon" type="image/x-icon" href="../images/nolitc.png">
  <title>Registration Form Review</title>
</head>
<body>
    @include('students.privacy')
    <header>
        <div class="header-content">
            <div class="text-logo-img">
                <div class="logo-img">
                    <img src="/images/nolitc.png" alt="NOLITC Logo" class="logo">
                    <h2 class="nolitc">NEGROS OCCIDENTAL LANGUANGE <br>AND INFORMATION TECHNOLOGY  CENTER</h2>
                </div>
                <div class="burger-icon" id="burger-icon" onclick="isShowNav()">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <nav id="navigition" class="navi">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#programs">Programs</a></li>
                    <li><a href="#updates">Updates</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
        </div>
      </header>
  <div class="header-title">
    <a href="#" class="back-icon">
      <img src="image-website/Polygon 1.png" alt="back logo">
    </a>
    <h1>REGISTRATION FORM</h1>
  </div>
  <main class="main-container">
    <h2>LEARNERS PROFILE FORM</h2>
    <hr>
    <section class="qualification-section">
      <form action="{{route("register_student_submit")}}" method="POST">
        <div class="btn-div">
            <button class="edit-btn" id="btn_edit" onclick="removeDisabled()" type="button">Edit Profile</button>
        </div>
        <div class="inputs preferred-qualification">
          <h3>Preferred Qualification</h3>
           @csrf
          <div class="input-data">
            <label for="qualification" class="label-input-tag">Qualification *</label>
            <select name="course" id="qualification" class="qualification-select" style="width: 25%" disabled>
                @foreach ($programs as $program)
                    <option value="{{$program->id}}"  {{(int)$data['course']===$program->id?'selected':''}}>{{$program->name}}</option>
                @endforeach
                {{-- <option value="" selected>Qualification</option>
                <option value="Visual Graphic Design NCIII"  {{$data['course']==='Visual Graphic Design NCIII'?'selected':''}}>Visual Graphic Design NCIII</option>
                <option value="Contact Center Services NC II" {{$data['course']==='Contact Center Services NC II'?'selected':''}}>Contact Center Services NC II</option>
                <option value="Animation NC II" {{$data['course']==='Animation NC II'?'selected':''}}>Animation NC II</option>
                <option value="2D Animation NC III" {{$data['course']==='2D Animation NC III'?'selected':''}}>2D Animation NC III</option> --}}
            </select>
            @error('course')
                <p class="error">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="inputs fullname">
          <h3>Learner Profile/Manpower Profile</h3>
          <h4>Full Name</h4>
          <div class="content-info">
            <div class="input-data">
              <label for="lname" class="label-input-tag">Last Name *</label>
              <input type="text" id="lname" name="lname" placeholder="Last Name" value="{{$data['lname']}}" disabled>
              @error('lname')
                <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="fname" class="label-input-tag">First Name *</label>
              <input type="text" id="fname" name="fname" placeholder="First Name" value="{{$data['fname']}}" disabled>
              @error('fname')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="mname" class="label-input-tag">Middle Name *</label>
              <input type="text" id="mname" name="mname" placeholder="Middle Name" value="{{$data['mname']}}" disabled>
              @error('mname')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="suffix" class="label-input-tag">Suffix *</label>
              <input type="text" id="suffix" name="suffix" placeholder="Suffix" value="{{$data['suffix']}}" disabled>
              @error('suffix')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>

        <div class="complete-address inputs">

          <h3>Complete Permanent Mailing Address</h3>
          <div class="content-info">
            <div class="input-data">

              <label for="region" class="label-input-tag">Region  *</label>
              <select id="region" name="region" class="region" disabled>
                <option value="{{$data['region']}}" selected>{{$data['region']}}</option>
              </select>
              @error('region')
              <p class="error">{{$message}}</p>
              @enderror

            </div>
            <div class="input-data">
                <label for="province" class="label-input-tag">Province *</label>
                <select id="province" name="province" class="province" disabled>
                    <option value="{{$data['province']}}" selected>{{$data['province']}}</option>
                </select>
                @error('province')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input-data">
                <label for="muni" class="label-input-tag">City/Municipality *</label>
                <select id="muni" name="city-municipality" class="city-municipality" disabled>
                  <option value="{{$data['city-municipality']}}" selected>{{$data['city-municipality']}}</option>
                </select>
                @error('city-municipality')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input-data">
                <label for="number-street" class="label-input-tag">Number, Street *</label>
                <input type="text" list="number-street" name="number-street" placeholder="Number, Street" value="{{$data['number-street']}}" disabled>
                <datalist id="number-street">

                </datalist>
                @error('number-street')
                <p class="error">{{$message}}</p>
                @enderror

            </div>
            <div class="input-data">
              <label for="dist" class="label-input-tag">District *</label>
              <select id="dist" name="district" class="district" disabled>
                <option value="{{$data['district']}}" selected id="selected_zip">{{$data['district']}}</option>
              </select>
              @error('district')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="zip" class="label-input-tag">Zip *</label>
              <input type="number" name="zip" id="zip" placeholder="zip code" value="{{$data['zip']}}" disabled>
              @error('zip')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="nationality" class="label-input-tag">Nationality *</label>
              <select id="nationality" name="nationality" class="nationality" disabled>
                <option value="" disabled selected>Select Nationality</option>
                <option value="Chinese" {{$data['nationality']==='Chinese'?'selected':''}}>Chinese</option>
                <option value="Japanese" {{$data['nationality']==='Chinese'?'selected':''}}>Japanese</option>
                <option value="Korean" {{$data['nationality']==='Korean'?'selected':''}}>Korean</option> <option value="">Indian</option>
                <option value="Pakistani" {{$data['nationality']==='Pakistani'?'selected':''}}>Pakistani</option>
                <option value="Bangladeshi" {{$data['nationality']==='Pakistani'?'selected':''}}>Bangladeshi</option>
                <option value="Filipino" {{$data['nationality']==='Filipino'?'selected':''}}>Filipino</option>
              </select>
              @error('nationality')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="contact-number" class="label-input-tag">Contact Number *</label>
              <input class="contact-number" type="number" placeholder="cellphone number" id="contact-number" name="contact-number" value="{{$data['contact-number']}}" disabled>
              @error('contact-number')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="email-address" class="label-input-tag">Email Address *</label>
              <input class="email-address" type="email" placeholder="Email" id="email-address" name="email" value="{{$data['email']}}" disabled>
              @error('email')
              <p class="error">{{$message}}</p>
              @enderror
            </div>

          </div>
        </div>



        <div class="personal-information inputs">
          <h3>Personal Information</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="gender" class="label-input-tag">Sex *</label>
              @error('gender')
              <p class="error">{{$message}}</p>
              @enderror
              <div id="gender" class="radio radio-sex">
                <div class="radio radio-input-sex">
                  <input class="radio-input sex" type="radio" id="male" name="gender" value="Male" {{$data['gender']==='Male'?'checked':''}} disabled>
                  <label for="male">Male</label>
                </div>
                <div class="radio radio-input-sex">
                  <input class="radio-input sex" type="radio" id="female" name="gender" value="Female" {{$data['gender']==='Female'?'checked':''}} disabled>
                  <label for="female">Female</label>
                </div>
              </div>
            </div>

            <div class="input-data">
              <label for="civil-status" class="label-input-tag">Civil Status *</label>
              @error('civil-status')
              <p class="error">{{$message}}</p>
              @enderror
              <div id="civil-status" class="radio radio-civil-status">
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="single" name="civil-status" value="Single" {{$data['civil-status']==='Single'?'checked':''}} disabled>
                  <label for="single">Single</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="married" name="civil-status" value="Married" {{$data['civil-status']==='Married'?'checked':''}} disabled>
                  <label for="married">Married</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="widow-er" name="civil-status" value="Widow/er" {{$data['civil-status']==='Widow/er'?'checked':''}} disabled>
                  <label for="widow-er">Widow/er</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="seperated" name="civil-status" value="Seperated" {{$data['civil-status']==='Seperated'?'checked':''}} disabled>
                  <label for="seperated">Seperated</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="soloParent" name="civil-status" value="SoloParent" {{$data['civil-status']==='SoloParent'?'checked':''}} disabled>
                  <label for="soloParent">SoloParent</label>
                </div>
              </div>
            </div>

            <div class="input-data">
              <label for="employment-status" class="label-input-tag">Civil Status *</label>
              @error('employement')
              <p class="error">{{$message}}</p>
              @enderror
              <div id="employment-status" class="radio radio-employment-status">
                <div class="radio radio-input-employment-status">
                  <input class="radio-input employment" type="radio" id="employed" name="employement" value="Employed"  {{$data['employement']==='Employed'?'checked':''}} disabled>
                  <label for="employed">Employed</label>
                </div>
                <div class="radio radio-input-employment-status">
                  <input class="radio-input employment" type="radio" id="unemployed" name="employement" value="Unemployed" {{$data['employement']==='Unemployed'?'checked':''}} disabled>
                  <label for="unemployed">Unemployed</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="inputs birthdate">
          <h3>Birthdate</h3>
          <div class="input-data">
            <label for="birthdate" class="label-input-tag">Date *</label>
            <input type="date" name="birthdate" id="birthdate" value="{{$data['birthdate']}}" disabled>
            <div class="label">MM/DD/YYYY</div>
            @error('birthdate')
            <p class="error">{{$message}}</p>
            @enderror
          </div>
        </div>

        <div class="inputs birthdate">
          <h3>Birthplace</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="birthplace-region" class="label-input-tag">Region  *</label>
              <select id="birthplace-region" name="birthplace-region" class="region"  disabled>
                <option value="{{$data['birthplace-region']}}" selected>{{$data['birthplace-region']}}</option>
              </select>
              @error('birthplace-region')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
                <label for="birthplace-province" class="label-input-tag">Province *</label>
                <select id="birthplace-province" name="birthplace-province" class="province" disabled>
                    <option value="{{$data['birthplace-province']}}" selected>{{$data['birthplace-province']}}</option>
                </select>
                @error('birthplace-province')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input-data">
              <label for="birthplace-pmuni" class="label-input-tag">City/Municipality *</label>
              <select id="birthplace-pmuni" name="birthplace-pcity-municipality" class="city-municipality" disabled>
                <option value="{{$data['birthplace-pcity-municipality']}}" selected>{{$data['birthplace-pcity-municipality']}}</option>
              </select>
              @error('birthplace-pcity-municipality')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
          </div>

        </div>

        <div class="inputs Trainee">
          <h3>Educational Attainment Before the Training (Trainee)</h3>
          @error('trainee')
          <p class="error">{{$message}}</p>
          @enderror
          <div class="trainee radio">

            <div class="input-radio">
              <input type="radio" name="trainee" id="no-grade-complete" class="radio-input" value="No Grade Complete" {{$data['trainee']==='No Grade Complete'?'checked':''}} disabled>
              <label for="no-grade-complete">No Grade Complete</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="elementary-undergraduate" class="radio-input" value="Elementary Undergraduate" {{$data['trainee']==='Elementary Undergraduate'?'checked':''}} disabled>
              <label for="elementary-undergraduate">Elementary Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="elementary-graduate" class="radio-input" value="Elementary Graduate" {{$data['trainee']==='Elementary Graduate'?'checked':''}} disabled>
              <label for="elementary-graduate">Elementary Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="pre-school" class="radio-input" value="Pre-School (Nursery/Kinder/Prep)" {{$data['trainee']==='Pre-School (Nursery/Kinder/Prep)'?'checked':''}} disabled>
              <label for="pre-school">Pre-School (Nursery/Kinder/Prep)</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="post-secondary-undergraduate" class="radio-input" value="Post Secondary Undergraduate" {{$data['trainee']==='Post Secondary Undergraduate'?'checked':''}} disabled>
              <label for="post-secondary-undergraduate">Post Secondary Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="high-school-under-graduate" class="radio-input" value="High School Under Graduate" {{$data['trainee']==='High School Under Graduate'?'checked':''}} disabled>
              <label for="high-school-under-graduate">High School Under Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="college-undergraduate" class="radio-input" value="College Undergraduate" {{$data['trainee']==='College Undergraduate'?'checked':''}} disabled>
              <label for="college-undergraduate">College Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="junior-high-graduate" class="radio-input" value="Junior High Graduate" {{$data['trainee']==='Junior High Graduate'?'checked':''}} disabled>
              <label for="junior-high-graduate">Junior High Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="high-school-graduate" class="radio-input" value="High School Graduate" {{$data['trainee']==='High School Graduate'?'checked':''}} disabled>
              <label for="high-school-graduate">High School Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="college-graduate-or-higher" class="radio-input" value="College Graduate or Higher" {{$data['trainee']==='College Graduate or Higher'?'checked':''}} disabled>
              <label for="college-graduate-or-higher">College Graduate or Higher</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="senior-high-graduate" class="radio-input" value="Senior High Graduate" {{$data['trainee']==='Senior High Graduate'?'checked':''}} disabled>
              <label for="senior-high-graduate">Senior High Graduate</label>
            </div>

          </div>
        </div>

        <div class="inputs parent-personal-data">
          <h3>Parent/Guardian</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="plname" class="label-input-tag">Last Name *</label>
              <input type="text" id="plname" name="plname" placeholder="Last Name" value="{{$data['plname']}}" disabled>
              @error('plname')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="pfname" class="label-input-tag">First Name *</label>
              <input type="text" id="pfname" name="pfname" placeholder="First Name" value="{{$data['pfname']}}" disabled>
              @error('pfname')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="pmname" class="label-input-tag">Middlename *</label>
              <input type="text" id="pmname" name="pmname" placeholder="Middlename" value="{{$data['pmname']}}" disabled>
              @error('pmname')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="psname" class="label-input-tag">Suffix Name *</label>
              <input type="text" id="psname" name="psname" placeholder="Suffix Name" value="{{$data['psname']}}" disabled>
              @error('psname')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="input-data">
              <label for="pcontact" class="label-input-tag">Contact Number *</label>
              <input type="text" id="pcontact" name="pcontact" placeholder="Contact Number" value="{{$data['pcontact']}}" disabled>
              @error('pcontact')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>

        <div class="complete-address inputs">

            <h3>Complete Permanent Mailing Address</h3>
            <div class="content-info">
                <div class="input-data">
                    <label for="region" class="label-input-tag">Region  *</label>
                    <select id="pregion" name="pregion" class="pregion" disabled>
                        <option value="{{$data['pregion']}}" selected>{{$data['pregion']}}</option>
                    </select>
                    @error('pregion')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-data">
                    <label for="pprovince" class="label-input-tag">Province *</label>
                    <select id="pprovince" name="pprovince" class="province" disabled>
                        <option value="{{$data['pprovince']}}" selected>{{$data['pprovince']}}</option>
                    </select>
                    @error('pprovince')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-data">
                    <label for="pmuni" class="label-input-tag">City/Municipality *</label>
                    <select id="pmuni" name="pcity-municipality" class="city-municipality" disabled>
                        <option value="{{$data['pcity-municipality']}}" selected>{{$data['pcity-municipality']}}</option>
                    </select>
                    @error('pcity-municipality')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-data">
                    <label for="pnumber-street" class="label-input-tag">Number, Street *</label>
                    <input type="text" list="pnumber-street" name="pnumber-street" placeholder="Number, Street" value="{{$data['pnumber-street']}}" disabled>
                    <datalist id="pnumber-street">

                    </datalist>
                    @error('pnumber-street')
                    <p class="error">{{$message}}</p>
                    @enderror

                </div>
                <div class="input-data">
                    <label for="pdist" class="label-input-tag">District *</label>
                    <select id="pdist" name="pdistrict" class="district" disabled>
                        <option value="{{$data['pdistrict']}}" selected id="pselected_zip">{{$data['pdistrict']}}</option>
                    </select>
                    @error('pdistrict')
                    <p class="error">{{$message}}</p>
                    @enderror

                </div>
                <div class="input-data">
                    <label for="pzip" class="label-input-tag">Zip *</label>
                    <input type="number" name="pzip" id="pzip" placeholder="zip code" value="{{$data['pzip']}}" disabled>
                    @error('pzip')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>


            </div>
        </div>

        <div class="inputs parent-address">
          <h3>Learner/Trainee/Student(Clients)Classification</h3>
          @error('classification')
          <p class="error">{{$message}}</p>
          @enderror
          <div class="content-info">
            <div class="input-check">
              <input type="checkbox" id="student" name="classification[]" value="Student" {{is_array($data['classification'])&&in_array('Student', $data['classification'])?"checked":""}} disabled>
              <label for="student">Student</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="workers" name="classification[]" value="Informal Workers" {{is_array($data['classification'])&&in_array('Informal Workers', $data['classification'])?"checked":""}} disabled>
              <label for="workers">Informal Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="communities" name="classification[]" value="Indigenous People & Cultural Communities" {{is_array($data['classification'])&&in_array('Indigenous People & Cultural Communities', $data['classification'])?"checked":""}} disabled>
              <label for="communities">Indigenous People & Cultural Communities</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="youth" name="classification[]" value="Out of School Youth" {{is_array($data['classification'])&&in_array('Out of School Youth', $data['classification'])?"checked":""}} disabled>
              <label for="youth">Out of School Youth</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="iWorkers" name="classification[]" value="Industry Workers" {{is_array($data['classification'])&&in_array('Industry Workers', $data['classification'])?"checked":""}} disabled>
              <label for="iWorkers">Industry Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dWoman" name="classification[]" value="Disadvantage Woman" {{is_array($data['classification'])&&in_array('Disadvantage Woman', $data['classification'])?"checked":""}} disabled>
              <label for="dWoman">Disadvantage Woman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="sParent" name="classification[]" value="Solo Parent" {{is_array($data['classification'])&&in_array('Solo Parent', $data['classification'])?"checked":""}} disabled>
              <label for="sParent">Solo Parent</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="cooperatives" name="classification[]" value="Cooperatives" {{is_array($data['classification'])&&in_array('Cooperatives', $data['classification'])?"checked":""}} disabled>
              <label for="cooperatives">Cooperatives</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="calamities" name="classification[]" value="Victim Of Natural Disasters and Calamities" {{is_array($data['classification'])&&in_array('Victim Of Natural Disasters and Calamities', $data['classification'])?"checked":""}} disabled>
              <label for="calamities">Victim Of Natural Disasters and Calamities</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="solo" name="classification[]" value="Solo Parent's Children" {{is_array($data['classification'])&&in_array("Solo Parent's Children", $data['classification'])?"checked":""}} disabled>
              <label for="solo">Solo Parent's Children</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fEnterprises" name="classification[]" value="Family Enterprises" {{is_array($data['classification'])&&in_array('Family Enterprises', $data['classification'])?"checked":""}} disabled>
              <label for="fEnterprises">Family Enterprises</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="trafficking" name="classification[]" value="Victim of Survivor of Human Trafficking" {{is_array($data['classification'])&&in_array('Victim of Survivor of Human Trafficking', $data['classification'])?"checked":""}} disabled>
              <label for="trafficking">Victim of Survivor of Human Trafficking</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="sCitizens" name="classification[]" value="Senior Citizens" {{is_array($data['classification'])&&in_array('Senior Citizens', $data['classification'])?"checked":""}} disabled>
              <label for="sCitizens">Senior Citizens</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="mEntrepreneurs" name="classification[]" value="Micro Entrepreneurs" {{is_array($data['classification'])&&in_array('Micro Entrepreneurs', $data['classification'])?"checked":""}} disabled>
              <label for="mEntrepreneurs">Micro Entrepreneurs</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dsurrenders" name="classification[]" value="Drug Dependent Surrenders" {{is_array($data['classification'])&&in_array('Drug Dependent Surrenders', $data['classification'])?"checked":""}} disabled>
              <label for="dsurrenders">Drug Dependent Surrenders</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dPersonnel" name="classification[]" value="Displaced HEIs Teaching Personnel" {{is_array($data['classification'])&&in_array('Displaced HEIs Teaching Personnel', $data['classification'])?"checked":""}} disabled>
              <label for="dPersonnel">Displaced HEIs Teaching Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="microentrepreneurs" name="classification[]" value="Family Member of Microentrepreneurs" {{is_array($data['classification'])&&in_array('Family Member of Microentrepreneurs', $data['classification'])?"checked":""}} disabled>
              <label for="microentrepreneurs">Family Member of Microentrepreneurs</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="Dcombatants" name="classification[]" value="Rebel Returnees or Decommisioned Combatants" {{is_array($data['classification'])&&in_array('Rebel Returnees or Decommisioned Combatants', $data['classification'])?"checked":""}} disabled>
              <label for="Dcombatants">Rebel Returnees or Decommisioned Combatants</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dWorkers" name="classification[]" value="Displaced Workers" {{is_array($data['classification'])&&in_array('Displaced Workers', $data['classification'])?"checked":""}} disabled>
              <label for="dWorkers">Displaced Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fFisherman" name="classification[]" value="Farmers and Fisherman" {{is_array($data['classification'])&&in_array('Farmers and Fisherman', $data['classification'])?"checked":""}} disabled>
              <label for="fFisherman">Farmers and Fisherman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="idetainees" name="classification[]" value="Inmates and Detainees" {{is_array($data['classification'])&&in_array('Inmates and Detainees', $data['classification'])?"checked":""}} disabled>
              <label for="idetainees">Inmates and Detainees</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="tTrainers" name="classification[]" value="TVET Trainers" {{is_array($data['classification'])&&in_array('TVET Trainers', $data['classification'])?"checked":""}} disabled>
              <label for="tTrainers">TVET Trainers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="aFisherman" name="classification[]" value="Family Members of Farmers and Fisherman" {{is_array($data['classification'])&&in_array('Family Members of Farmers and Fisherman', $data['classification'])?"checked":""}} disabled>
              <label for="aFisherman">Family Members of Farmers and Fisherman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="pPersonnel" name="classification[]" value="Wounded-in-Action AFP and PNP Personnel" {{is_array($data['classification'])&&in_array('Wounded-in-Action AFP and PNP Personnel', $data['classification'])?"checked":""}} disabled>
              <label for="pPersonnel">Wounded-in-Action AFP and PNP Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="eWorkers" name="classification[]" value="Currently Employed Workers" {{is_array($data['classification'])&&in_array('Currently Employed Workers', $data['classification'])?"checked":""}} disabled>
              <label for="eWorkers">Currently Employed Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="eCoordinator" name="classification[]" value="Community Trng. & Employment Coordinator" {{is_array($data['classification'])&&in_array('Community Trng. & Employment Coordinator', $data['classification'])?"checked":""}} disabled>
              <label for="eCoordinator">Community Trng. & Employment Coordinator</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="pnp" name="classification[]" value="Family Members of AFP and PNP killed-and-Wounded-in-Action" {{is_array($data['classification'])&&in_array('Family Members of AFP and PNP killed-and-Wounded-in-Action', $data['classification'])?"checked":""}} disabled>
              <label for="pnp">Family Members of AFP and PNP killed-and-Wounded-in-Action</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="oStatus" name="classification[]" value="Employee with Contractual/Job Order Status" {{is_array($data['classification'])&&in_array('Employee with Contractual/Job Order Status', $data['classification'])?"checked":""}} disabled>
              <label for="oStatus">Employee with Contractual/Job Order Status</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fWorkers" name="classification[]" value="Returning/Repatriated Overseas Filipino Workers" {{is_array($data['classification'])&&in_array('Returning/Repatriated Overseas Filipino Workers', $data['classification'])?"checked":""}} disabled>
              <label for="fWorkers">Returning/Repatriated Overseas Filipino Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="iDetainees" name="classification[]" value="Family Members of Inmates and Detainees" {{is_array($data['classification'])&&in_array('Family Members of Inmates and Detainees', $data['classification'])?"checked":""}} disabled>
              <label for="iDetainees">Family Members of Inmates and Detainees</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="tAlumni" name="classification[]" value="TESDA Alumni" {{is_array($data['classification'])&&in_array('TESDA Alumni', $data['classification'])?"checked":""}} disabled>
              <label for="tAlumni">TESDA Alumni</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="oDependents" name="classification[]" value="Overseas Filipino Workers (OFW) Dependents" {{is_array($data['classification'])&&in_array('Overseas Filipino Workers (OFW) Dependents', $data['classification'])?"checked":""}} disabled>
              <label for="oDependents">Overseas Filipino Workers (OFW) Dependents</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="uPersonnel" name="classification[]" value="Uniformed Personnel" {{is_array($data['classification'])&&in_array('Uniformed Personnel', $data['classification'])?"checked":""}} disabled>
              <label for="uPersonnel">Uniformed Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="uPoor" name="classification[]" value="Urban and Rural Poor" {{is_array($data['classification'])&&in_array('Urban and Rural Poor', $data['classification'])?"checked":""}} disabled>
              <label for="uPoor">Urban and Rural Poor</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="wDisabilities" name="classification[]" value="Person With Disabilities" {{is_array($data['classification'])&&in_array('Person With Disabilities', $data['classification'])?"checked":""}} disabled>
              <label for="wDisabilities">Person With Disabilities</label>
            </div>


          </div>
        </div>
        <div class="btn-submit">
            <div class="accept-content">
                <input type="checkbox" name="accept" id="accept" value="isAccept" checked disabled>
                <p>I have read and accept the <span id="privacyPolicy">Privacy Policy *</span></p>
            </div>
          <button type="submit" onclick="removeDisabled()">Submit</button>
        </div>
      </form>
    </section>

  </main>
  <footer class="footer">
    <div class="footer-content">
        <div class="phi-logo">
            <img src="/image-website/phil-seal 1.png" alt="logo" class="pic">
        </div>
    </div>
    <div class="footer-content">
        <h3 class="republic">REPUBLIC OF THE PHILIPPINES</h3>
        <p class="content">All content is the public domain unless<br>otherwise stated</p>
    </div>
    <div class="footer-content">
        <h3 class="ph">ABOUT GOV.PH</h3>
        <p class="learn">Learn more about Philippine Goverment, its structure,<br> how government works and the people behind it</p>
        <div class="gov">
            <p class="gov1">GOV.PH</p>
            <p class="gov2">Open Data Patrol</p>
            <p class="gov3">Official Gazettte</p>
        </div>
    </div>
    <div class="footer-content">
        <h3 class="goverment">GOVERMENT LINKS</h3>
        <p><a href="https://op-proper.gov.ph/" class="pres">Office of the President</a></p>
        <p><a href="https://www.ovp.gov.ph/" class="vice">Office of the Vice President</a></p>
        <p><a href="https://legacy.senate.gov.ph/" class="senate">Senate of the Philippines</a></p>
        <p><a href="https://www.congress.gov.ph/" class="house">House of the Representative</a></p>
        <p><a href="https://sc.judiciary.gov.ph/" class="supreme">Supreme Court</a></p>
        <p><a href="https://ca.judiciary.gov.ph/" class="appeals">Court of Appeals</a></p>
        <p><a href="https://sb.judiciary.gov.ph/" class="sandigan">Sandigan Bayan</a></p>
        <p><a href="https://www.negros-occ.gov.ph/" class="negros">Province of Negros Occidental</a></p>

    </div>
    <div class="footer-content">
        <h3 class="visit">Visit Us</h3>
        <p class="paglaum">Paglaum Sports Complex<br>Hernaez St.Bacolod City,<br>Negros Occidental</p>
        <p class="phone">Telephone: (034) 435 6092<br>Email: nolitc@gmail.com</p>
    </div>
  </footer>
  <script src="js/register.js"></script>
</body>
</html>
