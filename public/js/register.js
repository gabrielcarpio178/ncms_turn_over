$(document).ready(()=>{
  regions();
  pregions();
  birthplace_regions();

let region = '';
let muni = '';
let city_ = '';
let birthplace_region_ = ''
let pmuni_ = ''
let pregion_ = ''
let pcity_com = ''
  $(".txt, #region, .checkbox").each(function() {
    $(this).change(function(){
        region = $('option:selected', this).attr('data-id');
        province(region);
    });
  });

  $(".txt, #province, .checkbox").each(function() {
    $(this).change(function(){
        muni = $('option:selected', this).attr('data-id');
        city(region,muni);
    });
  });

  $(".txt, #muni, .checkbox").each(function() {
    $(this).change(function(){
        var city_ = $('option:selected', this).attr('data-id');
        numberStreet(region,muni,city_)
    });
  });

  $(".txt, #pregion, .checkbox").each(function() {
    $(this).change(function(){
        pregion_ = $('option:selected', this).attr('data-id');
        pprovince(pregion_);
    });
  });

  $(".txt, #pprovince, .checkbox").each(function() {
    $(this).change(function(){
        pmuni_ = $('option:selected', this).attr('data-id');
        pcity(pregion_,pmuni_);
    });
  });

  $(".txt, #pmuni, .checkbox").each(function() {
    $(this).change(function(){
        pcity_com = $('option:selected', this).attr('data-id');
        pnumberStreet_com(pregion_, pmuni_, pcity_com)
    });
  });

  $(".txt, #birthplace-region, .checkbox").each(function() {
    $(this).change(function(){
        birthplace_region_ = $('option:selected', this).attr('data-id');
        birthplace_province_select(birthplace_region_);
    });
  });

  $(".txt, #birthplace-province, .checkbox").each(function() {
    $(this).change(function(){
        var muni = $('option:selected', this).attr('data-id');
        birthplace_city(birthplace_region_,muni);
    });
  });

//   iscroll();

})

var regions_ = document.getElementById('region');
var province_ = document.getElementById('province');
var city_= document.getElementById('muni');
var district_ = document.getElementById('dist');
var numberstreet_ = document.getElementById('number-street');

var pregions_ = document.getElementById('pregion');
var pprovince_ = document.getElementById('pprovince');
var pcity_= document.getElementById('pmuni');
var pnumberstreet_com_ = document.getElementById('pnumber-street');


var birthplace_province = document.getElementById('birthplace-province');
var birthplace_region = document.getElementById('birthplace-region');
var birthplace_pmuni = document.getElementById('birthplace-pmuni');

function regions(){

    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result =>
            Object.keys(result).forEach(key=>{
                option = document.createElement('option');
                option.value = result[key].region_name;
                option.dataset.id = key
                option.textContent = result[key].region_name
                regions_.appendChild(option);
            })
        )
        .catch(error => console.log('error', error));
}

function province(regionCode){
    province_.disabled = false;
    city_.disabled = true;
    let option_province = "<option value='' selected disabled>Select Province</option>";
    let option_city = "<option value='' selected disabled>Select City/Municipality</option>";
    province_.innerHTML = option_province;
    city_.innerHTML = option_city;
    province_.innerHTML = option_province;
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result =>
            Object.keys(result[regionCode].province_list).forEach(key=>{
                const option = document.createElement('option');
                option.value = key
                option.dataset.id = key
                option.textContent = key
                province_.appendChild(option);
            })
        )
        .catch(error => console.log('error', error));
}

function city(region,province){
    city_.disabled = false;
    let option_city = "<option value='' selected disabled>Select City/Municipality</option>";
    city_.innerHTML = option_city;
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result => (

            Object.keys(result[region].province_list[province].municipality_list).forEach(key=>{
                const option = document.createElement('option');
                option.value = key;
                option.dataset.id = key
                option.textContent = key
                city_.appendChild(option);
            })

        )
    )
    .catch(error => console.log('error', error));
}

function numberStreet(region,province,numberStreet){
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result => (
            result[region].province_list[province].municipality_list[numberStreet].barangay_list.forEach(data=>{
                const option = document.createElement('option');
                option.value = data;
                option.dataset.id = data
                option.textContent = data
                numberstreet_.appendChild(option);
            })

        )
        )
        .catch(error => console.log('error', error));

}

function birthplace_regions(){
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
    .then(response => response.json())
    .then(result =>
        Object.keys(result).forEach(key=>{
            option = document.createElement('option');
            option.value = result[key].region_name;
            option.dataset.id = key
            option.textContent = result[key].region_name
            birthplace_region.appendChild(option);
        })
    )
    .catch(error => console.log('error', error));
}

function birthplace_province_select(regionCode){
    birthplace_province.disabled = false;
    let option_city = "<option value='' selected disabled>Select City/Municipality</option>";
    birthplace_pmuni.innerHTML = option_city;
    birthplace_pmuni.disabled=true;

    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result =>
            Object.keys(result[regionCode].province_list).forEach(key=>{
                const option = document.createElement('option');
                option.value = key
                option.dataset.id = key
                option.textContent = key
                birthplace_province.appendChild(option);
            })
        )
        .catch(error => console.log('error', error));

}

function birthplace_city(region,province){
    let option_city = "<option value='' selected disabled>Select City/Municipality</option>";
    birthplace_pmuni.innerHTML = option_city;
    birthplace_pmuni.disabled = false;
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result => (
            Object.keys(result[region].province_list[province].municipality_list).forEach(key=>{
                const option = document.createElement('option');
                option.value = key;
                option.dataset.id = key
                option.textContent = key
                birthplace_pmuni.appendChild(option);
            })

        )
    )
    .catch(error => console.log('error', error));
}

function pregions(){
    pregion
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
    .then(response => response.json())
    .then(result =>
        Object.keys(result).forEach(key=>{
            option = document.createElement('option');
            option.value = result[key].region_name;
            option.dataset.id = key
            option.textContent = result[key].region_name
            pregion.appendChild(option);
        })
    )
    .catch(error => console.log('error', error));
}

function pprovince(regionCode){
    pprovince_.disabled = false;
    let option_city = "<option value='' selected disabled>Select City/Municipality</option>";
    pcity_.innerHTML = option_city;
    pcity_.disabled = true;
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result =>
            Object.keys(result[regionCode].province_list).forEach(key=>{
                const option = document.createElement('option');
                option.value = key
                option.dataset.id = key
                option.textContent = key
                pprovince_.appendChild(option);
            })
        )
        .catch(error => console.log('error', error));
}

function pcity(region,province){
    pcity_.disabled = false;
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result => (
            Object.keys(result[region].province_list[province].municipality_list).forEach(key=>{
                const option = document.createElement('option');
                option.value = key;
                option.dataset.id = key
                option.textContent = key
                pcity_.appendChild(option);
            })
        )
    )
    .catch(error => console.log('error', error));

}

function pnumberStreet_com(region,province,numberStreet){
    fetch("js/philippine_provinces_cities_municipalities_and_barangays_2019v2.json")
        .then(response => response.json())
        .then(result => (
            result[region].province_list[province].municipality_list[numberStreet].barangay_list.forEach(data=>{
                const option = document.createElement('option');
                option.value = data;
                option.dataset.id = data
                option.textContent = data
                pnumberstreet_com_.appendChild(option);
            })

        )
        )
        .catch(error => console.log('error', error));
}

function iscroll(){
    const privacyPolicy = document.getElementById("privacyPolicy");
    privacyPolicy.addEventListener('click',()=>{
        document.getElementById('id01').style.display='block';
    })
}

function removeDisabled(){
    const selected = document.querySelectorAll('select');
    selected.forEach(select=>{
        select.removeAttribute("disabled");
    })
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input=>{
        input.removeAttribute("disabled");
    })
    const radios = document.querySelectorAll('.radio-input');
    radios.forEach(radio=>{
        radio.removeAttribute("disabled");
    })
    const checkboxs = document.querySelectorAll("input[type='checkbox']");
    checkboxs.forEach(checkbox=>{
        checkbox.removeAttribute("disabled");
    })
}


function isShowNav(){
    var element = document.getElementById("navigition");
    element.classList.toggle("navi");
}
