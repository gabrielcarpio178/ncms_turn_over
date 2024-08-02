@include('partials.header', ['title'=> 'TESDA QUALIFICATIONS'])

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="flex justify-between">
        <div class="text-2xl text-[#168753] w-full">
            <div class="h1 font-black">
                {{$program->name}}
            </div>
            <p>({{$program->hours}} hours)</p>
        </div>
        <form action="{{route('updateContent', ['id'=>$program->id])}}" method="get">
            @csrf
             <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
        </form>
    </div>

    <div class="w-full h-[40vh] mt-5 flex items-center justify-center">
        <img src="{{'/assets/img/'.$program->img_name}}" alt="image" class="w-[80%] h-full">
    </div>

    <p class="font-medium">
        {{$program->caption}}
    </p>

    <div class="flex px-4 mt-3">
        <div>
            <h1 class="font-black text-2xl">
                QUALIFICATIONS:
            </h1>
            <div class="mt-1 px-10">
                <ul class="list-disc">
                    @foreach ($program->qualifications as $qualification)
                        <li>
                            {{$qualification->qualification}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div>
            <h1 class="font-black text-2xl">
                Benefits:
            </h1>
            <div class="mt-1 px-10">
                <ul class="list-disc">
                    @foreach ($program->benefits as $benefit)
                        <li>
                            {{$benefit->benefit}}
                        </li>
                    @endforeach
                </ul>
            </div>

            <h1 class="font-black text-2xl">
                Core Competencies:
            </h1>
            <div class="mt-1 px-10">
                <ul class="list-disc">
                    @foreach ($program->competencies as $competencie)
                        <li>
                            {{$competencie->competencie}}
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>


    </div>

</main>

@include('partials.footer')
