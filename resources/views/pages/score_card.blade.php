@include('partials.header', ['title'=> 'Score Cards'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-message></x-message>
<section class="bg-green-100 w-[86.6%] absolute top-40 left-64 p-10">
    <div class="text-2xl font-black text-[#168753]">
        Score Cards
    </div>
    <div class="w-[100%] h-[30vh] px-5 py-5 flex flex-row gap-x-10 ">
        <div class="bg-slate-100 flex flex-col items-center justify-center gap-2 w-[33.33%] h-[20vh] rounded-md shadow-md px-6 py-5">
            <h2 class="text-3xl font-bold">Graduates</h2>
            <div class="text-2xl font-bold">{{$scoreCard->number_of_graduates}}</div>
        </div>
        <div class="bg-slate-100 flex flex-col items-center justify-center gap-2 w-[33.33%] h-[20vh] rounded-md shadow-md px-6 py-5">
            <h2 class="text-3xl font-bold">Employed</h2>
            <div class="text-2xl font-bold">{{$scoreCard->number_of_employed}}</div>
        </div>
        <div class="bg-slate-100 flex flex-col items-center justify-center gap-2 w-[33.33%] h-[20vh] rounded-md shadow-md px-6 py-5">
            <h2 class="text-3xl font-bold">Employment Rate</h2>
            <div class="text-2xl font-bold">{{$scoreCard->employment_rate}}%</div>
        </div>
    </div>
    <div class="w-[100%] flex flex-col items-center gap-2">
        <div class="edit-form-content w-[40%] rounded-md shadow-md px-4 py-7 animate__animated animate__fadeInDown" style="display: none" id="form-edit">
            <form action="{{ route('updateScoreCards', ['id' => $scoreCard->id]) }}" method="post" class="flex flex-col gap-2">
                @method('PUT')
                @csrf
                <div class="w-[100%]">
                    <label for="number_of_graduates">Graduates</label>
                    <input type="number" name="number_of_graduates" id="number_of_graduates" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Graduates" value="{{!session()->has('error')?$scoreCard->number_of_graduates:old('number_of_graduates')}}" oninput="calRate()">
                    <p class="text-red-500">
                        @error('number_of_graduates')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </p>
                </div>
                <div class="w-[100%]">
                    <label for="number_of_employed">Employed</label>
                    <input type="number" name="number_of_employed" id="number_of_employed" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Graduates" value="{{!session()->has('error')?$scoreCard->number_of_employed:old('number_of_employed')}}" oninput="calRate()">
                    <p class="text-red-500">
                        @error('number_of_employed')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </p>
                </div>
                <div class="w-[100%]">
                    <label for="employment_rate">Employment Rate</label>
                    <input type="number" name="employment_rate" id="employment_rate" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Graduates" value="{{$scoreCard->employment_rate}}" readonly>
                </div>
                <div class="w-[100%]">
                    <button class="w-[100%] bg-[#168753] rounded-md text-white hover:bg-green-900 py-2 px-3 h-[5%] font-black" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <button class="w-[10%] bg-[#168753] rounded-md text-white hover:bg-green-900 py-2 px-3 h-[5%] font-black" onclick="show()" id="showForm">Edit</button>
        <button class="w-[10%] bg-red-500 rounded-md text-white hover:bg-red-900 py-2 px-3 h-[5%] font-black" onclick="hide()" id="hideForm" style="display: none">Hide</button>
    </div>
</section>
<script>

    function calRate() {
        let num_grand = parseInt(document.getElementById("number_of_graduates").value);
        let num_emp = parseInt(document.getElementById("number_of_employed").value);
        if (num_grand > 0) {
            var employmentRate = (num_emp / num_grand) * 100;
            document.getElementById('employment_rate').value = employmentRate.toFixed(2);
        } else {
            document.getElementById('employment_rate').value = '';
        }

    }

    function show() {
        document.getElementById("form-edit").style.display = "block";
        document.getElementById("showForm").style.display = "none";
        document.getElementById("hideForm").style.display = "block";
    }
    function hide() {
        document.getElementById("form-edit").style.display = "none";
        document.getElementById("showForm").style.display = "block";
        document.getElementById("hideForm").style.display = "none";
    }
</script>
@include('partials.footer')
