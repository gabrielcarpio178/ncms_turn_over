@include('partials.header', ['title'=> 'Register Student'])
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script></script>

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="text-2xl font-black text-[#168753]">
        Registered Student
    </div>
    <form action="{{route('filter')}}" method="POST">
        @csrf
        <section class="w-full flex flex-row gap-x-2">
            {{-- nolitcText --}}
            <div class="flex flex-col">
                <select name="course" id="course" class="border border-solid border-black-600 w-56 h-11 rounded-md focus:outline-none px-2">
                    <option value="" selected disabled>Filter by Course</option>
                    @foreach ($programs as $program)
                        <option value="{{$program->id}}">{{$program->name}}</option>
                    @endforeach
                </select>
                @error('course')
                    <p class="text-red-600">Required</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <select name="status" id="status" class="border border-solid border-black-600 w-56 h-11 rounded-md focus:outline-none px-2">
                    <option value="" selected disabled>Filter by Status</option>
                    <option value="1">Accepted</option>
                    <option value="0">Pending</option>
                </select>
                @error('status')
                    <p class="text-red-600">Required</p>
                @enderror

            </div>
            <div class="flex flex-col">
                <input type="text" name="start_date" id="start_date" placeholder="Start Date" class="border border-solid border-black-600 w-56 h-11 rounded-md focus:outline-none px-2" onfocus="(this.type='date')">
                @error('start_date')
                    <p class="text-red-600">Required</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <input type="text" name="end_date" id="end_date" placeholder="End Date" class="border border-solid border-black-600 w-56 h-11 rounded-md focus:outline-none px-2" onfocus="(this.type='date')">
                @error('end_date')
                    <p class="text-red-600">Required</p>
                @enderror
            </div>

            <button class="w-20 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit">Search</button>
        </section>
    </form>
    <div class="bg-white p-3 rounded-md mt-6">
        <table id="myTable" class="display">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="px-6 py-3 uppercase">#</th>
                <th scope="col" class="px-6 py-3 capitalize">Name</th>
                <th scope="col" class="px-6 py-3 capitalize">Course</th>
                <th scope="col" class="px-6 py-3 capitalize">Contact Number</th>
                <th scope="col" class="px-6 py-3 capitalize">Email</th>
                <th scope="col" class="px-6 py-3 capitalize">Date</th>
                <th scope="col" class="px-6 py-3 capitalize">Status</th>
            </thead>
            <tbody>
                @php
                    $x=1;
                @endphp
                @foreach ($students as $student)
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer" onclick="clickRow('{{route('student_profile', $student->id) }}')">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$x++}}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{$student->fname." ".$student->lname}}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{$student->program->name}}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            0{{$student->contact_number}}
                        </td>
                        <td class="px-6 py-4 uppercase">
                            {{$student->email}}
                        </td>
                        <td class="px-6 py-4 uppercase">
                            {{$student->created_at->format('M-d-Y')}}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{$student->status===false?'Pending':'Accepted'}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    @if ($isAll==true)
        <div class="export-btn mt-4">
            <a href="{{route('export_excel')}}" class="w-20 bg-[#168753] rounded-md text-white hover:bg-green-900 px-3 py-2">Export</a>
        </div>
    @else
          <form action="{{route('export')}}" method="POST" class="export-btn mt-4">
            @csrf
            <input type="number" name="course" value="{{$filter['id_course']}}" class="hidden">
            <input type="number" name="status" value="{{$filter['status']}}" class="hidden">
            <input type="date" name="start_date" value="{{$filter['start_date']}}" class="hidden">
            <input type="date" name="end_date" value="{{$filter['end_date']}}" class="hidden">
            <button type="submit" class="w-20 bg-[#168753] rounded-md text-white hover:bg-green-900 px-3 py-2">Export</button>
        </form>
    @endif





</main>
<script src="js/student-table.js"></script>

<script>
    function clickRow(url){
        window.location.href=url;
    }
</script>
@include('partials.footer')
