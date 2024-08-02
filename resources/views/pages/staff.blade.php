@include('partials.header', ['title'=> 'Officer'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>


@include('partials.footer')
