@if (session()->has('logout'))
    <div role="alert" class="fixed top-0 right-0 mt-10" x-data="{show : true}" x-init="setTimeout(()=>show = false, 3000)" x-show = "show">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Logout
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{session('logout')}}</p>
        </div>
    </div>
@endif
