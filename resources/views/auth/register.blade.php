<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>HiPub - Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full h-screen bg-cover flex items-center justify-center bg-back pt-2">
        <div class="w-[570px] pb-14 rounded-[20px] bg-white shadow-lg">
            <div class="container pt-6 pl-7">
                <a href="{{ url('/') }}" class="fa fa-arrow-left fa-lg text-primary" title="Kembali"></a>
            </div>
            <div class="container px-[70px] pt-2">
                <div class="container">
                    <h1 class="mt-2 font-bold text-3xl text-center capitalize tracking-wide text-primary">membuat akun baru</h1>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <input class="w-full mt-[30px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="name" type="text" placeholder="Nama Lengkap" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <input class="w-full mt-[20px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="email" type="text" placeholder="Email" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <input class="w-full mt-[20px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="password" type="password" placeholder="Kata Sandi" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <input class="w-full mt-[20px] border border-primary focus:outline-primary bg-white placeholder-secondary pl-5 py-2 rounded-md" name="password_confirmation" type="password" placeholder="Konfirmasi Kata Sandi" required autocomplete="new-password">
                    <button class="w-full mt-[20px] uppercase py-2 rounded-md text-white font-bold bg-primary hover:bg-primaryhover" type="submit">Daftar</button>
                </form>
                <hr class="border-t-1 border-secondary mt-4 opacity-50">
                <div class="mt-4 flex justify-between">
                    <span class="pt-1 text-black capitalize font-semibold">Sudah Mendaftar?</span>
                    <a href="{{ url('login') }}" class="w-[150px] uppercase py-1 rounded-md text-center text-primary font-bold border-2 border-primary hover:bg-primary hover:text-white" type="submit">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>