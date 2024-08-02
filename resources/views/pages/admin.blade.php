@include('partials.header', ['title'=> 'Dashboard'])

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-message></x-message>
{{-- @dd($total_count) --}}
<main class="w-[86.6%] absolute top-[14%] left-64 p-10">
    <h1 class="text-[#168753] text-5xl font-bold">Dashboard</h1>
    <div class="graphs-number flex flex-row w-full h-[70vh] mt-2">
        <div class="number-content flex flex-col w-[20%] h-[100%]">
            <div class="px-1 py-2 flex flex-col gap-y-10">
                <div class="rounded-md shadow-lg text-label items-center flex flex-row justify-between px-10 bg-slate-100 h-[20vh]">
                    <p class="text-2xl">Total students</p>
                    <div class="font-extrabold text-6xl">{{$total_student}}</div>
                </div>
                <div class="rounded-md shadow-md text-label items-center flex flex-row justify-between px-10 bg-slate-100 h-[20vh]">
                    <p class="text-2xl">New Students</p>
                    <div class="font-extrabold text-6xl">{{$totalNewStudent}}</div>
                </div>
                <div class="rounded-md shadow-md text-label items-center flex flex-row justify-between px-10 bg-slate-100 h-[20vh]">
                    <p class="text-2xl">Total Number of Pending Student</p>
                    <div class="font-extrabold text-6xl">{{$total_pending}}</div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 py-2 px-3">
            <div class="rounded-md shadow-lg bg-slate-100 w-[30vw] h-[100%] flex flex-col p-3">
                <h2 class="font-bold text-xl">Student by Course</h2>
                <div class="graph w-[100%] h-[100%]">
                    <canvas id="bar"></canvas>
                </div>
            </div>
            <div class="rounded-md shadow-lg bg-slate-100 w-[30vw] h-[100%] flex flex-col p-3">
                <h2 class="font-bold text-xl">Student by Gender</h2>
                <div class="graph w-[100%] h-[90%] flex flex-row items-center justify-center">
                    <canvas id="doughnut"></canvas>
                </div>
            </div>
            <div class="rounded-md shadow-lg bg-slate-100 w-[30vw] h-[100%] flex flex-col p-3">
                <h2 class="font-bold text-xl">Student by Age</h2>
                <div class="graph w-[100%] h-[100%]">
                    <canvas id="horizontal-bar"></canvas>
                </div>
            </div>
            <div class="rounded-md shadow-lg bg-slate-100 w-[30vw] h-[100%] flex flex-col p-3">
                <h2 class="font-bold text-xl">Applicants by Month</h2>
                <div class="graph w-[100%] h-[90%] flex flex-row items-center justify-center">
                    <canvas id="line"></canvas>
                </div>
            </div>
        </div>
    </div>


</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    //horizontal-bar
    const horizontal = document.getElementById('horizontal-bar').getContext('2d');
    const chart_horizontal = new Chart(horizontal, {
        type: 'bar',
        data: {
            labels: {!!json_encode($labels_age)!!},
            datasets: [{
            label: 'Age',
            data: {!!json_encode($values_age)!!},
            }],
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            scales: {
                x:{
                    beginAtZero: true
                }
            }
        }
    });
    //line
    const bar = document.getElementById('bar').getContext('2d');
    const chart_bar = new Chart(bar, {
        type: 'bar',
        data: {
            labels: {!!json_encode($labels_course)!!},
            datasets: [{
            label: 'Course',
            data: {!!json_encode($values_course)!!},
            }],
        },
        options: {
            indexAxis: 'x',
            responsive: true
        }
    });
    //doughnut
    const doughnut = document.getElementById('doughnut').getContext('2d');
    const chart_doughnut = new Chart(doughnut, {
        type: 'doughnut',
        data: {
            labels: {!!json_encode($labels_gender)!!},
            datasets: [{
            label: 'Gender',
            data: {!!json_encode($values_gender)!!},
            }],
        },
        options: {
            indexAxis: 'x',
            responsive: true
        }
    });
    //pie

    const line = document.getElementById('line').getContext('2d');
    const chart_line = new Chart(line, {
        type: 'line',
        data: {
            labels: {!!json_encode($data_month_labels)!!},
            datasets: [{
                label: 'Applicants',
                data: {!!json_encode($data_month_values)!!},
            }],
        },
        options: {
            indexAxis: 'x',
            responsive: true
        }
    });
</script>
@include('partials.footer')
