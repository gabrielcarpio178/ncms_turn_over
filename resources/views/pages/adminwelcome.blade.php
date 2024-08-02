@include('partials.header', ['title'=> 'Upload Welcome Page'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 flex flex-col gap-y-8">
    <x-alertmessage></x-alertmessage>
    <div class="text-2xl font-black text-[#168753] pt-5 pl-5">
        Update Welcome
    </div>
    <div class="relative" style="width:100%; height: 60vh">
        <img src="{{'assets/img/'.$image['image']}}" alt="cover photo" class="w-full h-full" id="imgPreview">

        <div class="absolute shadow-md right-4 top-4 cursor-pointer flex gap-x-2" >
            <button class="w-20 bg-[#168753] rounded-md text-white hover:bg-green-900 hidden" id="btn_save">Save</button>
            <div class="bg-slate-50 p-2 rounded-lg" id="btn_pen">
                <i class="fa-solid fa-pen fa-2x"></i>
            </div>
        </div>
    </div>
  </div>


    <form action="{{route('upload_cover')}}" class="hidden" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="file" id="image_file" name="image_upload">
        <button type="submit" id="save">Save</button>
    </form>
</main>
<script>
    $(document).ready(()=>{
        $("#btn_pen").on('click', function(){
            $("#image_file").click();
        })
        const photoInp = $("#image_file");
        photoInp.change(function (e) {
            if(document.getElementById("image_file").files.length !== 0 ){
                $("#btn_save").removeClass('hidden')
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            }

        });
        $("#btn_save").on('click', ()=>{
            $("#save").click();
        })
    })
</script>
@include('partials.footer')
