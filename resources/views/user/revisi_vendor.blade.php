@extends('layout')
@section('container')
    <div class="w-full h-screen bg-cover flex items-center justify-center bg-back pt-2">
        <div class="w-[570px] p-8 rounded-[20px] bg-white shadow-lg">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif
            <form action="{{url('')}}/{{Auth::user()->type}}/{{$article->id}}/{{$link_form}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <h2 class=" text-2xl capitalize font-bold text-center">Judul Artikel</h2>
                {{-- <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}"> --}}
                <input type="hidden" name="status" id="status" value="{{$status_value}}">
                <div class="flex flex-col space-y-5">
                    <input readonly class="w-full mt-[30px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md disabled:opacity-60" disabled type="text" name="judul_artikel" placeholder="Judul Artikel" value="{{$article->judul_artikel}}">
                    <input readonly class="w-full mt-[30px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md disabled:opacity-60" disabled type="text" name="kategori_artikel" placeholder="Judul Artikel" value="{{$article->kategori_artikel}}">
                    <select class="w-full mt-[30px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-4 py-2 rounded-md capitalize" name="vendor" id="" required>
                        <option disabled selected>pilih vendor</option>
                        @foreach ($vendors as $v)
                        <option {{($article->vendor == $v->bidang)?'selected':''}} class="capitalize" value="{{$v->bidang}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    <select class="w-full mt-[30px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-4 py-2 rounded-md capitalize" name="jurnal" id="" required>
                        <option disabled class="capitalize ">pilih jurnal </option>
                        <option {{($article->jurnal == 'scopus')?'selected':''}} class="capitalize" value="scopus">scopus</option>
                        <option {{($article->jurnal == 'sinta2')?'selected':''}} class="capitalize" value="sinta2">sinta2</option>
                        <option {{($article->jurnal == 'sinta3')?'selected':''}} class="capitalize" value="sinta3">sinta3</option>
                        <option {{($article->jurnal == 'sinta4')?'selected':''}} class="capitalize" value="sinta4">sinta4</option>
                        <option {{($article->jurnal == 'sinta5')?'selected':''}} class="capitalize" value="sinta5">sinta5</option>
                        <option {{($article->jurnal == 'sinta6')?'selected':''}} class="capitalize" value="sinta6">sinta6</option>
                    </select>
                    {{-- <div class="flex">
                            Input File sementara 
                        <input type="file" name="nama_file" id="nama_file" required>
                    </div> --}}
                    <div class="flex">
                        
                        <div class="w-3/4 border border-r-0 border-primary focus:outline-primary self-center rounded-l-md bg-white px-5 py-2 truncate" id="coverName">
                            {{($article->cover_file == NULL)?'Upload Cover Letter':$article->cover_file}}
                        </div>
                        <label class="flex w-1/4 p-2 text-center capitalize rounded-r-md bg-secondary hover:bg-primary hover:text-white cursor-pointer" for="cover_file">
                            <span class="self-center bx bx-cloud-upload pr-1 pl-4"></span>
                            browse
                        </label>
                        <input class="hidden" id="cover_file" name="cover_file" type="file"  onchange="ganti()">
                    </div>
                    <div class="flex">
                        <div class="w-3/4 border border-r-0 border-primary focus:outline-primary self-center rounded-l-md bg-white px-5 py-2 truncate" id="cvName">
                            {{($article->cv_file == NULL)?'Upload CV':$article->cv_file}}
                        </div>
                        <label class="flex w-1/4 p-2 text-center capitalize rounded-r-md bg-secondary hover:bg-primary hover:text-white cursor-pointer" for="cv_file">
                            <span class="self-center bx bx-cloud-upload pr-1 pl-4"></span>
                            browse
                        </label>
                        <input class="hidden" id="cv_file" name="cv_file" type="file"  onchange="ganti2()">
                    </div>
                    <hr class="h-1 mt-2 mb-2">
                    <button class="capitalize py-2 px-4 bg-primary rounded-xl text-white font-bold text-xl hover:bg-primaryhover" type="submit">Update Data ke Vendor</button>
                </div>    
            </form>
        </div>
    </div>
    <script>
        function ganti(){
            var file_output =  document.getElementById('coverName');
            var file_name = document.getElementById('cover_file');
            file_output.innerHTML = file_name.value;
        }
        function ganti2(){
            var file_output2 =  document.getElementById('cvName');
            var file_name2 = document.getElementById('cv_file');
            file_output2.innerHTML = file_name2.value;
        }
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 5000);
    </script>
    
@endsection