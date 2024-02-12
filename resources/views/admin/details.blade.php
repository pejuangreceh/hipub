<<<<<<< HEAD
@extends('layout')
@section('container')
<div class="h-auto w-full pt-10 px-10">
    <div class="flex flex-col space-y-8 mb-10">
        <div class="w-full py-2 px-10 flex justify-between rounded-xl bg-white">
            <div class="flex space-x-4">
                <div class=" w-10 h-10 p-2 my-auto rounded-full bg-pink-400 text-white">
                    <i class="bx bx-user bx-sm"></i>
                </div>
                <div class=" flex flex-col">                    
                    <h1 class="font-bold capitalize">{{$article[0]->name}}</h1>
                    <h2 class=" text-sm">{{$article[0]->email}}</h2>

                </div>
            </div>
            <div>
                <i class='bx bx-comment-dots bx-md mt-1'></i>
            </div>
        </div>
        <form action="{{url('')}}/admin/{{$article[0]->id}}/update_payment" method="POST" class="flex flex-col space-y-8">
            @method('put')
            @csrf
            <div class="bg-white px-[77px] py-[30px] text-center rounded-xl">
                <h2 class=" text-xl capitalize">Judul Artikel</h2>
                <h1 class=" mt-8 font-bold text-xl capitalize">{{$article[0]->judul_artikel}}</h1>
                <div class="mt-10 flex flex-warp justify-center space-x-6">
                    <div>
                        <a href="{{asset('article_files/'.$article[0]->nama_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-reds hover:bg-red-700 py-2 rounded-lg capitalize">Download Artikel</button></a>
                    </div>
                    @if(count($payment_check) > 0)
                    <div>
                        <a href="{{ asset('payment_files/'.$payment_check[0]->file_bukti) }}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-blues hover:bg-blue-700 py-2 rounded-lg capitalize">Bukti Bayar</button></a>
                    </div>
                    @endif
                    <div class="flex">
                        {{-- <label for="status" class="font-bold text-white bg-blue-500 px-20 py-2 rounded-[10px] capitalize">pilih status</label> --}}
                        <select name="verified" class="py-2 w-[200px] text-center rounded-lg capitalize bg-oranges hover:bg-orange-700 text-white font-semibold appearance-none cursor-pointer">
                            <option disabled class=" capitalize" value="0" selected>pilih status</option>
                            <option class="capitalize" value="2">tolak </option>
                            <option class="capitalize" value="1">verifikasi</option>
                        </select>
                    </div>     
                </div>
            </div>
            <div class="bg-white px-14 py-10 h-96 rounded-xl">
                <h1 class="text-xl capitalize">komentar :</h1>
                <p class="mt-2 h-[260px] overflow-auto scrollbar-hide">
                {{($article[0]->komentar_vendor == "Belum ada komentar") ? $article[0]->komentar_editor : $article[0]->komentar_vendor}}
                    
                </p>
            </div>
            <div>
                <button class="float-right font-bold text-white w-[200px] text-center bg-primary hover:bg-primaryhover py-2 rounded-lg capitalize">Submit</button>
            </div>
        </form>
    </div>
</div>
=======
@extends('layout')
@section('container')
<div class="h-auto w-full px-16 py-14">
    <div class="flex flex-col gap-8">
        <div class="w-full py-2 pl-8 pr-4 flex justify-between rounded-xl bg-white">
            <div class="flex space-x-4">
                <div class=" w-10 h-10 p-2 my-auto rounded-full bg-pink-400 text-white">
                    <i class="bx bx-user bx-sm"></i>
                </div>
                <div class=" flex flex-col">                    
                    <h1 class="font-bold capitalize">{{$article[0]->name}}</h1>
                    <h2 class=" text-sm">{{$article[0]->email}}</h2>
                </div>
            </div>
        </div>
        <form action="{{url('')}}/admin/{{$article[0]->id}}/update_payment" method="POST" class="flex flex-col">
            @method('put')
            @csrf
            <div class="bg-white px-[77px] py-[20px] text-center rounded-xl">
                <h2 class=" text-xl capitalize">Judul Artikel</h2>
                <h1 class=" mt-2 font-bold text-2xl capitalize">{{$article[0]->judul_artikel}}</h1>
                <div class="mt-8 flex flex-warp justify-center gap-6">
                    <div>
                        <a href="{{asset('article_files/'.$article[0]->nama_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-reds hover:bg-red-700 py-2 rounded-lg capitalize">Download Artikel</button></a>
                    </div>
                    @if(count($payment_check) > 0)
                    <div>
                        <a href="{{ asset('payment_files/'.$payment_check[0]->file_bukti) }}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-blues hover:bg-blue-700 py-2 rounded-lg capitalize">Bukti Bayar</button></a>
                    </div>
                    @endif
                    <div class="flex">
                        {{-- <label for="status" class="font-bold text-white bg-blue-500 px-20 py-2 rounded-[10px] capitalize">pilih status</label> --}}
                        <select name="verified" class="py-2 w-[200px] text-center rounded-lg capitalize bg-oranges hover:bg-orange-700 text-white font-semibold appearance-none cursor-pointer">
                            <option disabled class=" capitalize" value="0" selected>pilih status</option>
                            <option class="capitalize" value="2">tolak </option>
                            <option class="capitalize" value="1">verifikasi</option>
                        </select>
                    </div>     
                </div>
            </div>
            <div class="mt-8 bg-white p-8 h-[250px] rounded-xl overflow-auto scrollbar-hide">
                <h1 class="text-xl capitalize">komentar :</h1>
                <hr class="grow h-1 mt-2 mb-2">
                <div class="flex grid-cols-2 pl-2 mt-2">
                    <i class='bg-primary rounded-full w-1 h-6'></i>
                    <p class="text-md pl-2">
                        {{($article[0]->komentar_vendor == "Belum ada komentar") ? $article[0]->komentar_editor : $article[0]->komentar_vendor}}
                    </p>
                </div>
            </div>
            <div>
                <button class="mt-8 float-right font-bold text-white w-[200px] text-center bg-primary hover:bg-primaryhover py-2 rounded-lg capitalize">Submit</button>
            </div>
        </form>
    </div>
</div>
>>>>>>> abd71c3275fbb825088bbd8b2ced873b7830e9f7
@endsection