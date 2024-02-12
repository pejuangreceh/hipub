<?php 
function bang($var){
if ($var == 'Menunggu Verifikasi') {
    $v = 'bg-blues'; 
}elseif ($var == 'Dalam Proses') {
    $v = 'bg-blues'; 
}elseif($var == 'Revisi (E)'){
    $v = 'bg-oranges';
}elseif ($var == 'Revisi (V)') {
    $v = 'bg-oranges'; 
}elseif ($var == 'sudah revisi') {
    $v = 'bg-oranges'; 
}elseif ($var == 'Verifikasi (E)') {
    $v = 'bg-greens'; 
}elseif ($var == 'Accepted') {
    $v = 'bg-greens'; 
}elseif ($var == 'Publish') {
    $v = 'bg-reds'; 
}elseif ($var == 'Pembayaran Ditolak') {
    $v = 'bg-reds'; 
}elseif ($var == 'Rejected') {
    $v = 'bg-reds'; 
}elseif ($var == 'Proses') {
    $v = 'bg-blues'; 
}elseif ($var == 'Pembayaran') {
    $v = 'bg-blues'; 
}elseif ($var == 'Under Review') {
    $v = 'bg-blues'; 
}else{
    $v = ''; 
}
return $v;
}
?>
@extends('layout')
@section('container')
    <div class="h-screen w-full px-16 py-16">
        <div class="flex flex-warp gap-4">
            <div class="w-[10%] h-auto justify-center flex bg-white rounded-xl cursor-pointer">
                <span class="self-center pl-2 pr-1 bx bx-filter" id="status-select"></span>
                <select class="w-full pr-4 py-2 rounded-xl capitalize appearance-none focus:outline-none cursor-pointer" name="status" id="status-filter">
                    <option class="capitalize text-secondary" value="">filter</option>
                    <option class="capitalize text-black" value="Verifikasi">verifikasi</option>
                    <option class="capitalize text-black" value="Revisi">revisi</option>
                    <option class="capitalize text-black" value="Proses">proses</option>
                    <option class="capitalize text-black" value="Publish">publish</option>
                </select>
            </div>
            <div class="w-[75%] flex px-4 py-2 bg-white rounded-xl capitalize cursor-pointer">
                <span class="self-center bx bx-search"></span>
                <input class="w-full pl-1 appearance-none focus:outline-none" id="search" name="judul" type="text" placeholder="pencarian" >
            </div>
            <a href="{{url('')}}/add_article" class="w-[15%] h-auto px-4 py-2 focus:outline-primary bg-white rounded-xl capitalize appearance-none hover:bg-primary hover:text-white"><span class="bx bx-plus"></span> upload</a>
        </div>
        <div class="bg-white rounded-xl mt-6 px-5 pb-5">
            <table class="w-full" id="my-table">
                <thead>
                    <tr class="py-9 border-b-2 border-gray-400">
                        <th class="uppercase w-1/12 font-bold px-3 pt-4 pb-3"> no</td>
                        <th class="uppercase w-8/12 font-bold pt-4 pb-3"> judul artikel</td>
                        <th class="uppercase w-3/12 font-bold pt-4 pb-3"> status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $a)
                    <?php 
                    $link_status = (($a->status == 'Pembayaran') || ($a->status == 'Menunggu Verifikasi'))?'payment':(($a->status == 'Pembayaran Ditolak') ? 'payment' : 'artikel') ;
                    // $link_status = 'artikel'; 
                    ?>
                    <tr>
                        <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">{{$loop->iteration}}</td>
                        <td class="w-8/12  capitalize border-b border-[#727272] border-opacity-50">{{$a->judul_artikel}}</td>
                        <td class="w-3/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                            <a href="{{url('')}}/{{Auth::user()->type}}/{{$a->id}}/{{$link_status}}"><button class="capitalize px-4 rounded-2xl font-bold py-1 <?= bang($a->status)?>">{{($a->status == 'Verifikasi (E)')?'Proofreading':$a->status;}}</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>

@endsection