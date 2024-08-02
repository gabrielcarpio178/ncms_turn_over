@include('partials.header', ['title'=> 'Staff'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>

<main class="w-[86.6%] absolute top-[14%] left-64 p-10">
   <section>
        <h1 class="text-[#168753] text-5xl font-bold">Dashboard</h1>
   </section>
   <section class="cards-content flex flex-cols px-16 py-10 justify-between">
        <div class="w-[25%] h-[20vh] rounded-md shadow-md bg-slate-100 flex flex-col items-center justify-between py-3 px-2">
            <h2 class="text-2xl font-bold">Total Students</h2>
            <div class="text-4xl font-bold">{{$total_student}}</div>
            <p cass="text-xl">Total Number of Students</p>
        </div>
        <div class="w-[25%] h-[20vh] rounded-md shadow-md bg-slate-100 flex flex-col items-center justify-between py-3 px-2">
            <h2 class="text-2xl font-bold">New Students</h2>
            <div class="text-4xl font-bold">{{$totalNewStudent}}</div>
            <p cass="text-xl">Total Number of New Students</p>
        </div>
        <div class="w-[25%] h-[20vh] rounded-md shadow-md bg-slate-100 flex flex-col items-center justify-between py-3 px-2">
            <h2 class="text-2xl font-bold">Total of Pending Students</h2>
            <div class="text-4xl font-bold">{{$total_pending}}</div>
            <p cass="text-xl">Total Number of Pending Students</p>
        </div>
   </section>
   <section class="w-full h-[43vh] flex flex-row justify-center">
    <div class="w-[60%] h-[100%]">
        <canvas id="graph-bar" width="60vw" height="26vh"></canvas>
    </div>
   </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const graph_bar = document.getElementById('graph-bar').getContext('2d');
    const chart_graph_bar = new Chart(graph_bar, {
        type: 'bar',
        data: {
            labels: {!!json_encode($data_labels)!!},
            datasets: [{
            label: 'Course',
            data: {!!json_encode($data_values)!!},
            }],
        },
        options: {
            responsive: true,
            scales: {
                x:{
                    beginAtZero: true
                }
            }
        }
    });
</script>

@include('partials.footer')
