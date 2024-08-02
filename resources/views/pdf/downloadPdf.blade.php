<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['title']}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .header-logo{
        position: relative;
    }
    .logo{
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0);
        width: 20%;
        height: 13%;
    }
    .text-content{
        position: absolute;
        top: 13.5%;
        width: 50%;
        left: 50%;
        transform: translate(-50%, 0);
    }
    .body-content{
        position: absolute;
        top: 27%;
    }

    .body-content > h1{
        font-weight: bold;
        font-size: 1.4rem;
    }
    hr{
        border: 1px solid #168753;
    }
    span{
        text-transform: capitalize;
    }
    .data-content{
        white-space: nowrap;
        position: relative;
    }
    .right-div{
        position: absolute;
        top: 0%;
        float: right;
    }

</style>

<body>
    <div class="header-content">
        <div class="header-logo w-100">
            <img src="images/nolitc.png" alt="nolitc logo" class="logo">
        </div>
        <div class="text-center text-content">
            NEGROS OCCIDENTAL LANGUAGE AND INFORMATION TECHNOLOGY CENTER
        </div>
    </div>

    <div class="body-content w-100">
        <h1>LEARNERS PROFILE FORM</h1>
        <hr>
        <div class="data-content">
            <p class="w-50">Full name: <span>{{$data['student']->fname." ".$data['student']->lname}}</span></p>
            <p class="w-25 right-div">Nationality: <span>{{$data['student']->nationality}}</span></p>
        </div>
        <div class="data-content">
            <p class="w-50">Employment Status: <span>{{$data['student']->employment}}</span></p>
            <p class="w-25 right-div">Sex: <span>{{$data['student']->gender}}</span></p>
            <p class="w-25 right-div">Civil Status: <span>{{$data['student']->civil_status}}</span></p>
        </div>

        <div class="data-content border border-white">
            <p class="text-nowrap positon-relative">Complete Address: <span class="position-absolute top-0">{{$data['student']->street_number." ".$data['student']->city." "."Negros Occidental"." ".$data['student']->zipcode}}</span></p>
        </div>

        <div class="data-content">
            <p class="w-50">Birthday: <span>{{$data['student']->birthdate}}</span></p>
        </div>

        <div class="data-content">
            <p class="w-50 positon-relative">Contact Number: <span class="position-absolute top-0">0{{$data['student']->contact_number}}</span></p>
            <p class="w-50 right-div">Email: <span>{{$data['student']->email}}</span></p>
        </div>

        <div class="data-content">
            <p class="w-75">Educational Attainment Before the Training (Trainee): <span>{{$data['student']->education}}</span></p>
        </div>
        <div class="data-content">
            <p class="w-25">Birthplace: <span>{{$data['student']->birthplace}}</span></p>
        </div>
        <div class="data-content">
            <p>Learner/Trainee/Student (Clients) Classification:</p>
            <ul class="classification">
                @foreach ($data['student']->classification as $classification)
                    <li>{{$classification->classification_data}}</li>
                @endforeach
            </ul>
        </div>
        <hr>
        <div class="data-content border border-white">
            <p class="w-50">Parent/Guardian: <span>{{$data['student']->parent->pfname." ".$data['student']->parent->plname}}</span></p>
            <p class="w-50 right-div text-nowrap">Complete Address: <span>{{$data['student']->parent->pstreet_number." ".$data['student']->parent->pmunicipality." ".$data['student']->parent->pzipcode}}</span></p>
        </div>
    </div>
</body>
</html>
