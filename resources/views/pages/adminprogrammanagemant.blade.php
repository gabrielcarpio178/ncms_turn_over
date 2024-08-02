@include('partials.header', ['title'=> 'Program Managemant'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="text-2xl font-black text-[#168753]">
        Program Managemant
    </div>
    <div class="w-full h-[60vh] mt-10 flex gap-x-5">
        <div class="w-[33.33%] h-[60vh] bg-[url('images/tesdaqualification.jpg')] bg-cover bg-center before:content-[''] before:absolute before:bg-[#168753] before:-z-1 before:w-[100%] before:opacity-[60%] before:h-[60vh] relative">
            <div class="absolute bottom-[10%] left-[7%]">
                <div class="font-black text-3xl text-white">
                    TESDA <br>QUALIFICATIONS
                </div>
                <form action="{{route('programs')}}">
                    <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                        SEE MORE
                    </button>
                </form>

            </div>
        </div>
        <div class="w-[33.33%] h-[60vh] bg-[url('images/tesdaassessmentcenter.jpg')] bg-cover bg-center before:content-[''] before:absolute before:bg-[#168753] before:z-1 before:w-[100%] before:opacity-[60%] before:h-[60vh] relative">
            <div class="absolute bottom-[10%] left-[7%]">
                <div class="font-black text-3xl text-white">
                    TESDA ACCREDITED <br>ASSESSMENT CENTER
                </div>
                <form action="{{route('programs',['id'=>2])}}">
                    <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                        SEE MORE
                    </button>
                </form>
            </div>
        </div>
        <div class="w-[33.33%] h-[60vh] bg-[url('images/specialprograms.png')] bg-cover bg-center before:content-[''] before:absolute before:bg-[#168753] before:z-1 before:w-[100%] before:opacity-[60%] before:h-[60vh] relative">
            <div class="absolute bottom-[10%] left-[7%]">
                <div class="font-black text-3xl text-white">
                    SPECIAL <br>PROGRAMS
                </div>
                <form action="{{route('programs',['id'=>3])}}">
                    <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                        SEE MORE
                    </button>
                </form>
            </div>
        </div>
    </div>

</main>

@include('partials.footer')
