@include('partials.header', ['title'=> $student->fname])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-20 flex flex-col gap-y-8 z-0">
    <div class="flex justify-between mx-40">
        @if ($student->status===true)
            <h1 class="text-2xl font-black text-[#168753]">Registered</h1>
        @elseif ($student->status===false)
            <h1 class="text-2xl font-black text-[#168753]">Applicant</h1>
        @endif

        @if ($student->status===true)
            <a class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900 flex items-center justify-center" href="{{route('print.pdf', ['id'=>$student->id])}}">Export</a>
        @endif

    </div>
    <div class="shadow-md rounded-lg bg-white mx-80 px-20 py-10">
        <div class="grid grid-cols-2">
            <div>
                <h2 class="text-3xl font-black capitalize">
                    {{$student->fname." ".$student->lname}}
                </h2>
                <p>Full name</p>
            </div>
            <div class="text-right">
                <h2 class="text-2xl font-black">
                    {{$student->course}}
                </h2>
                <p>Qualification</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->gender}}
                </h2>
                <p>Sex</p>
            </div>
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->birthdate}}
                </h2>
                <p>Birthdate</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    0{{$student->contact_number}}
                </h2>
                <p>Contact number</p>
            </div>
            <div>
                <h2 class="text-2xl font-black">
                    {{$student->email}}
                </h2>
                <p>Email</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->city}}
                </h2>
                <p>City</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->district}}
                </h2>
                <p>District</p>
            </div>
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->zipcode}}
                </h2>
                <p>Zip Code</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->nationality}}
                </h2>
                <p>Nationality</p>
            </div>
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->civil_status}}
                </h2>
                <p>Civil Status</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->employment}}
                </h2>
                <p>Employment Status</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->birthplace}}
                </h2>
                <p>Birthplace</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    {{$student->education}}
                </h2>
                <p>Educational Attainment</p>
            </div>
        </div>
        <div class="border border-black relative mt-8 p-4">
            <div class="absolute bg-white left-4 top-[-20px] text-2xl">
                Parent/Guardian
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        {{$student->parent->pfname." ".$student->parent->plname}}
                    </h2>
                    <p>Full name</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        0{{$student->parent->pcontact_number}}
                    </h2>
                    <p>Contact number</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black">
                        {{$student->parent->pdistrict}}
                    </h2>
                    <p>District</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        {{$student->parent->pzipcode}}
                    </h2>
                    <p>Zip Code</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        {{$student->parent->pmunicipality}}
                    </h2>
                    <p>City</p>
                </div>
            </div>
        </div>
        <div class="border border-black relative mt-8 p-4">
            <div class="absolute bg-white left-4 top-[-20px] text-2xl">
                Learner/Trainee/Student(Clients)Classification:
            </div>
            <ul>
                @foreach ($student->classification as $classification)
                    <ul>{{$classification->classification_data}}</ul>
                @endforeach
            </ul>
        </div>
        @if ($student->status===false)
            <div class="flex flex-row w-full justify-center mt-10 gap-x-10">
                <form action="{{route('accept.applicant')}}" method="post" class="hidden">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="student_id" value='{{$student->id}}'>
                    <button class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit" id="accept">Accept</button>
                </form>
                <button class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit" onclick="acceptApplicant()">Accept</button>
                <form action="{{route('delete.applicant')}}" method="post" class="hidden">
                    @csrf
                    <input type="hidden" name="student_id" value='{{$student->id}}'>
                    <button class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit" id="delete">delete</button>
                </form>
                <button class="w-20 h-10 bg-red-700 rounded-md text-white hover:bg-red-900" type="submit" onclick="deleteApplicant()">Decline</button>
            </div>
        @endif

    </div>
</main>
<script>
    function deleteApplicant(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete success",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#delete').click();
                getNumber(parseInt({{$total_numbers}})-1);
            }
        });
    }

    function acceptApplicant(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, accept it!"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Accept success",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#accept').click();
                getNumber(parseInt({{$total_numbers}})-1);
            }
        });
    }

</script>
@include('partials.footer')
