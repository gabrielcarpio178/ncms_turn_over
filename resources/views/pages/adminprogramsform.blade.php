@include('partials.header', ['title'=> 'TESDA QUALIFICATIONS'])

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="text-2xl font-black text-[#168753]">
        TESDA QUALIFICATIONS
    </div>
    <div class="flex justify-end w-full">
        <form action="{{route('programs_addform')}}">
             <button class="text-xl text-white bg-[#168753] font-black py-1 px-4 rounded-md" type="submit">
                ADD
            </button>
        </form>
    </div>
    <div class="flex flex-col gap-y-5">
        @if (count($programs)===0)
            <p>No Programs Uploaded</p>
        @endif
        @foreach ($programs as $program)
            <div class="w-full h-[65vh] mt-3 px-2 flex gap-x-4">
                <div class="w-[40%] h-[65vh]">
                    <img src="{{'/assets/img/'.$program->img_name}}" alt="img-{{$program->img_name}}" class="w-full h-full">
                </div>
                <div class="w-[60%] h-[65vh] flex flex-col">
                    <div class="font-black text-4xl text-[#168753] w-96">
                        {{$program->name}}
                    </div>
                    <div class="font-black text-[#168753] text-2xl mt-10">
                        ({{$program->hours}} hours)
                    </div>
                    <div class="text-xl mt-10">
                       {{$program->caption}}
                    </div>
                    <form action="{{route('see_more_program', ['id'=>$program->id])}}" class="mt-10">
                        <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                            SEE MORE
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>

</main>

@include('partials.footer')
