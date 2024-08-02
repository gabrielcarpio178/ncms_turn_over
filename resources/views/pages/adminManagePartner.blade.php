@include('partials.header', ['title'=> 'Manage Partners'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-message></x-message>
<style>
    td{
        text-align: center;
        padding: 1% 0;
    }
</style>
<main class="w-[86.6%] absolute top-[14%] left-64 p-10">
    <h1 class="text-[#168753] text-5xl font-bold">Manage Partners</h1>
    <section class="flex flex-row w-[100%] h-[72vh] py-10">
        <div class="w-[100%] h-[70vh]">
            <table id="partners" class="w-[100%]">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="px-6 py-3 uppercase">#</th>
                    <th scope="col" class="px-6 py-3 capitalize">Logo</th>
                    <th scope="col" class="px-6 py-3 capitalize">Link</th>
                    <th scope="col" class="px-6 py-3 capitalize">Date Created</th>
                    <th scope="col" class="px-6 py-3 capitalize" colspan="2">Action</th>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($partners as $partner)
                    <tr>
                        <td>{{$i++}}</td>
                        <td class="flex justify-center items-center">
                            <img src="{{'./assets/partners_logo/'.$partner->logo}}" alt="partners logo" width="90"
                            height="100">
                        </td>
                        <td>{{$partner->link}}</td>
                        <td>{{\Carbon\Carbon::parse($partner->created_at)->format('M-d-Y')}}</td>
                        <td>
                            <form action="{{route('delete_partners')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="number" value="{{$partner->id}}" class="hidden" name="partners_id">
                                <button class="w-[80%] bg-red-500 rounded-md text-white hover:bg-red-900 px-3 py-2" type="submit">Delete</button>
                            </form>
                        </td>
                        <td>
                            <button class="w-[80%] bg-[#168753] rounded-md text-white hover:bg-green-900 px-3 py-2">Update</button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="w-full mt-10">
                {{ $partners->links('vendor.pagination.tailwind') }}
            </div>
            <div  class="w-[100%] flex flex-col items-center">
                <form action="{{route('add_partners')}}" method="post" class="w-[50%] flex flex-col items-center rounded-md shadow-md py-5 bg-slate-100 px-10 gap-5" enctype="multipart/form-data">
                    @csrf
                    <h3 class="font-bold text-2xl">Add Partners</h3>
                    <input type="file" id="image" class="hidden" name="image">
                    <div class="w-[30%] h-[20vh] border border-slate-800 flex flex-row items-center justify-center rounded-md cursor-pointer"  onclick="insertImage()">
                        <h3 class="font-bold" id="attach_file">Attach Image</h3>
                        <img src="" id="img-file" class="hidden">
                    </div>
                    @error('image')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <input type="text" name="link" id="link" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Link" value="">
                    @error('link')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <button class="w-[100%] bg-[#168753] rounded-md text-white hover:bg-green-900 px-3 py-2" type="submit">Add</button>
                </form>
            </div>
        </div>
    </section>
</main>
<script>
    function insertImage(){
        document.getElementById('image').click();
    }
    const photoInp = $("#image");
        photoInp.change(function (e) {
            if(document.getElementById("image").files.length !== 0 ){
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#img-file").attr("src", event.target.result);
                        document.getElementById('attach_file').style.display = 'none';
                        document.getElementById('img-file').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
</script>
@include('partials.footer')
