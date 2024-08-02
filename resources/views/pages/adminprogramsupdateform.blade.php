@include('partials.header', ['title'=> 'TESDA QUALIFICATIONS ADD'])

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-alertmessage></x-alertmessage>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div>
        <form action="{{route('updateContent_program', ['id'=>$program->id])}}" method="post" class="flex flex-col gap-y-6" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="inline-block w-1/2">
                    <label for="course_name" class="text-2xl">Course Name:</label>
                    <input type="text" name="course_name" id="course_name" class="h-10 bg-transparent border-green-500 border-b-4 ml-3" value="{{$program->name}}">
                    @error('course_name')
                        <p class="text-red-500">Required</p>
                    @enderror
                </div>
                <div class="inline-block w-1/2">
                    <label for="hours" class="text-2xl">Hours:</label>
                    <input type="number" name="hours" id="hours" class="h-10 bg-transparent border-green-500 border-b-4 ml-3" value="{{$program->hours}}">
                    @error('hours')
                        <p class="text-red-500">Required</p>
                    @enderror
                </div>
            </div>
            <div class="w-1/2 flex flex-col">
                <label for="exampleLink" class="text-2xl align-top">Example Link:</label>
                <textarea name="exampleLink" id="exampleLink" cols="80" rows="10" class="h-[150px]">{{$program->exam_link}}</textarea>
                @error('exampleLink')
                    <p class="text-red-500">Required</p>
                @enderror
            </div>
            <div class="inline-block w-1/2">
                <label for="course_caption" class="text-2xl align-top">Course Captions:</label>
                <textarea name="course_caption" id="course_caption" cols="80" rows="10" class="h-[150px]">{{$program->caption}}</textarea>
                @error('course_caption')
                    <p class="text-red-500">Required</p>
                @enderror
            </div>

            <div class="text-2xl">
                Qualification:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                @php
                    $q=0;
                @endphp
                @foreach ($program->qualifications as $qualification)
                <div class="relative qualification qualification-{{$q}}" id="qualification-{{$q}}"  data-qualification-id="{{$q}}">
                    <input type="text" name="qualification[]"  class="h-10 bg-transparent border-green-500 border-b-4 mr-3 w-[100%] qualification-{{$q}}" value="{{!session()->has('error')?$qualification->qualification:old('qualification')[$q]}}" required>
                    <div class="absolute right-1 top-1 bg-slate-300 px-2 py-1 rounded-md cursor-pointer " onclick="delete_id({{$q}},'qualification-'+{{$q}}, 'qualification')"><i class="fa-solid fa-trash-can"></i></div>
                </div>
                    @php
                        $q+=1;
                    @endphp
                @endforeach

                <div id="last_q" class="hidden">{{$q-1}}</div>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="qualification-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="qualification-cancel"><i class="fa-solid fa-x"></i></div>
                </div>

            </div>

            <div class="text-2xl">
                Benefits:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                @php
                $b = 0;
                @endphp
                @foreach ($program->benefits as $benefits)
                <div class="relative benefits benefit-{{$b}}" id="benefits-{{$b}}"  data-benefit-id="{{$b}}">
                    <input type="text" name="benefits[]"  class="h-10 bg-transparent border-green-500 border-b-4 mr-3 w-[100%] benefit-{{$b}}" value="{{!session()->has('error')?$benefits->benefit:old('benefits')[$b]}}" required>
                    <div class="absolute right-1 top-1 bg-slate-300 px-2 py-1 rounded-md cursor-pointer delete-btn " onclick="delete_id({{$b}},'benefit-'+{{$b}},'benefit')"><i class="fa-solid fa-trash-can"></i></div>
                </div>
                    @php
                        $b+=1;
                    @endphp
                @endforeach
                <div id="last_b" class="hidden">{{$b-1}}</div>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="benefits-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="benefits-cancel"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>

            <div class="text-2xl">
                Core Competencies:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                @php
                $c = 0;
                @endphp
                @foreach ($program->competencies as $competencies)
                <div class="relative competencies competencie-{{$c}}" id="competencies-{{$c}}"  data-competencies-id="{{$c}}">
                    <input type="text" name="competencies[]"  class="h-10 bg-transparent border-green-500 border-b-4 mr-3 w-[100%] " value="{{!session()->has('error')?$competencies->competencie:old('competencies')[$c]}}" required>
                    <div class="absolute right-1 top-1 bg-slate-300 px-2 py-1 rounded-md cursor-pointer delete-btn competencie-{{$c}}" onclick="delete_id({{$c}},'competencie-'+{{$c}}, 'competencie')"><i class="fa-solid fa-trash-can"></i></div>
                </div>
                    @php
                        $c+=1;
                    @endphp
                @endforeach
                <div id="last_c" class="hidden">{{$c-1}}</div>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="competencies-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="competencies-cancel"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex gap-x-3">
                    <p>Attach file here:</p>
                    <div class="bg-slate-300 w-[20%] flex items-center justify-center h-[20vh] rounded-md cursor-pointer" >
                        <img src="{{'/assets/img/'.$program->img_name}}" alt="attach-file" id="img-file" class="w-full h-full">
                    </div>
                </div>
                @error('image')
                    <p class="text-red-500">Invalid Image</p>
                @enderror
            </div>
            <input type="file" name="image" id="image" class="hidden" value="{{$program->img_name}}">
            <center class="mt-2">
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-[10%]">Save</button>
                <input type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 w-[10%]" id="btn_delete" value="Delete">
            </center>
        </form>
        <center>
            <form action="{{route('delete.programs')}}" method="post" class="hidden">
                @csrf
                @method('DELETE')
                <input type="text" value="{{$program->id}}" name="delete_id">
                <button type="submit" id="delete_btn_submit">Delete</button>
            </form>
        </center>

    </div>
</main>
<script>
let qualification_input = parseInt($("#last_q").text());
let benefits_input = parseInt($("#last_b").text());
let competencies_input = parseInt($("#last_c").text());
$(document).ready(()=>{

    $('#qualification-add').on('click',()=>{
        if(qualification_input===0){

        }
        $(`#qualification-${qualification_input}`).eq(0).after(`<input type="text" name="qualification[]" id="qualification-${parseInt(qualification_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 qualification-${parseInt(qualification_input)+1}"  data-qualification-id=${parseInt(qualification_input)+1} required>`);
        qualification_input++;
    });
    $("#qualification-cancel").on('click', ()=>{
        if(qualification_input!==parseInt($("#last_q").text())){
            $(`#qualification-${qualification_input}`).remove();
        qualification_input--;
        }
    });

    $('#benefits-add').on('click',()=>{
        $(`#benefits-${benefits_input}`).eq(0).after(`<input type="text" name="benefits[]" id="benefits-${parseInt(benefits_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 benefits" required data-qualification-id="${parseInt(benefits_input)+1}">`);
        benefits_input++;
    });
    $("#benefits-cancel").on('click', ()=>{
        if(benefits_input!==parseInt($("#last_b").text())){
            $(`#benefits-${benefits_input}`).remove();
            benefits_input--;
        }
    });

    $('#competencies-add').on('click',()=>{
        $(`#competencies-${competencies_input}`).eq(0).after(`<input type="text" name="competencies[]" id="competencies-${parseInt(competencies_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3" required data-competencie-id="${parseInt(competencies_input)+1}">`);
        competencies_input++;
    });
    $("#competencies-cancel").on('click', ()=>{
        if(competencies_input!==parseInt($("#last_c").text())){
            $(`#competencies-${competencies_input}`).remove();
            competencies_input--;
        }
    });

    $("#img-file").on('click',()=>{
        $("#image").click();
    });

    const photoInp = $("#image");
    photoInp.change(function (e) {
        if(document.getElementById("image").files.length !== 0 ){
            file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#img-file")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#btn_delete").on('click',()=>{
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete success",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#delete_btn_submit').click();
            }
        });
    });

})
function delete_id(id, content, input_type){
    if(input_type === "qualification"){
        qualification_input--;
    }else if(input_type === "benefit"){
        benefits_input--;
    }else if(input_type === "competencie"){
        competencies_input--;
    }
    $(`.${input_type}-${id}`).remove();
}
</script>
@include('partials.footer')
