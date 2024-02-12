@extends('layout')
@section('container')


    <div class="w-full h-screen bg-cover flex items-center justify-center bg-back pt-2">
        <div class="w-[570px] pb-14 rounded-[20px] bg-white shadow-lg">
            <div class="container pt-6 pl-7">
                
            </div>
            <div class="container px-[70px] pt-2">
                <div class="container">
                    <h1 class="mt-2 font-bold text-3xl text-center capitalize tracking-wide text-primary">Akun</h1>
                    <p class="mt-2 font-bold text-1xl text-center capitalize tracking-wide text-primary">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </p>
                </div>
                <form action="{{ route('save_profile',$profile->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <input class="w-full mt-[30px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="name" type="text" placeholder="Nama Lengkap" required autocomplete="name" autofocus value="{{$profile->name}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <input class="w-full mt-[20px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="email" type="text" placeholder="Email" autocomplete="email" value="{{$profile->email}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <input class="w-full mt-[20px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="password" type="password" placeholder="Kata Sandi Baru" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    
                <hr class="border-t-1 border-secondary mt-4 opacity-50">
                <div class="mt-4 flex justify-between">
                    <button class="w-[150px] uppercase py-1 rounded-md text-center text-primary font-bold border-2 border-primary hover:bg-primary hover:text-white" type="submit">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    @endsection
