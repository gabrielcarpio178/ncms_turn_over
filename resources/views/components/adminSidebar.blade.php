
@auth
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        getNumber({{$total_numbers}})
    });
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('8c71bc67cd5671227ddc', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        getNumber(parseInt({{$total_numbers}})+1);
    });

    function getNumber(total_number){
        document.getElementById('total_number').textContent = total_number;
    }

</script>
@endauth
{{-- adminSideColor --}}
<div class="absolute right-0 top-44 z-40" id="notification">

</div>

<style>
    a, a:hover{
        text-decoration: none;
        color: #fff;
    }
</style>

<section class="fixed mt-40 bg-[#2c7b1f] w-64 h-full py-20 px-1">

    <ul class="flex flex-col gap-y-8">
        {{-- headerColor #fff--}}
        @if ($user!=='officer')
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded">
                <a href="{{$user==='admin'?route('admin'):route('staff')}}">Dashboard</a>
            </li>
        @endif
        @if ($user==='staff'||$user==='admin')
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded">
                <a href="{{route('register_admin')}}" class="flex justify-between w-full">
                    <div>
                        Student's List
                    </div>
                    <div class="rounded-full bg-red-600 w-6 text-center" id="total_number">

                    </div>
                </a>
            </li>
        @endif
        @if ($user==='admin'||$user==='officer')
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded"><a href="{{route('upload-welcome')}}">Update Welcome</a></li>
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded"><a href="{{route('program_management')}}">Program Managemant</a></li>
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded"><a href="#">Manage NOLITC Update</a></li>
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded"><a href="{{route('showScoreCard')}}">Update Score Cards</a></li>
            <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded"><a href="{{route('managePartners')}}">Manage Partners</a></li>
        @endif
        <li class="px-10 text-md text-[#fff] text-md hover:bg-slate-600 py-1 rounded"><a href="{{route('settings')}}">Account Settings</a></li>
        <li class="px-10 text-md text-[#fff] text-lg hover:bg-slate-600 py-1 rounded">
            <form action="{{route('signoutAction')}}" method="POST">
                @method("POST")
                @csrf
                <button type="submit">
                    Log out
                </button>
            </form>
        </li>
    </ul>
</section>
