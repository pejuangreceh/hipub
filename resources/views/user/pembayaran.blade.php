@extends('layout')
@section('container')
       
    <div class="w-full h-screen pt-20 px-28">
        @if($article->status == 'Menunggu Verifikasi')
        <div class="container text-center">
            <h1 class="text-2xl font-bold">Pembayaran Proses</h1>
            <div class="mt-10 px-14 py-[100px] bg-white rounded-xl text-xl text-center">
                <p class="pb-8">
                    Silahkan menghubungi admin kami melalui link dibawah ini
                </p>
                    <a href="https://wa.me/+6281235265021" target="_blank"><button class="bg-greens text-white text-center capitalize w-auto px-4 py-1 rounded-full font-bold"><i class='bx bxl-whatsapp'></i> Whatsapp</button></a>   
            </div>
        </div>
        @else
        <div class="container text-center">
            <h1 class="text-2xl font-bold">Konfirmasi Pembayaran</h1>
        </div>
        <div class="mt-10 px-4 py-2 bg-white rounded-xl text-xl">
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="cursor-pointer bx bx-arrow-back"></a>
            <p class="text-center px-14 pt-16 pb-20">
                Lakukan pembayaran sebesar Rp. 5.000.567 ke rekening berikut a.n HiPub untuk proses publikasi
                xxxx-xxxxxxxxxxxxx (BRI)
            </p>
        </div>
        <form action="{{url('')}}/{{Auth::user()->type}}/{{$article->id}}/submit_payment" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex mt-5">
                <div class=" w-5/6 rounded-l-2xl bg-white p-5" id="fileName">
                    Upload Bukti Pembayaran (.jpg)
                </div>
                <label class="w-1/4 p-5 capitalize rounded-r-lg text-center cursor-pointer bg-secondary hover:bg-primary" for="file">
                    browse
                </label>
                <input class="hidden" id="file" name="file_bukti" type="file" onchange="ganti()" accept="image/*">
            </div>
            <div>
                <button class="capitalize mt-10 py-4 px-6 w-60 float-right bg-primary rounded-lg text-white font-bold text-xl hover:bg-primaryhover" type="submit">kirim</button>
            </div>
        </form>
        @endif
    </div>
    <script>
        function ganti(){
            var file_output =  document.getElementById('fileName');
            var file_name = document.getElementById('file');
            file_output.innerHTML = file_name.value;
        }
    </script>
@endsection