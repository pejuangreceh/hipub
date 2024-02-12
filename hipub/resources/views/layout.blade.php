<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HiPub</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
    .active > a{
        --tw-text-opacity: 1;
        color: rgb(255 159 41 / var(--tw-text-opacity));
    }
</style>
<body>
    <div class="fixed bg-[#CE6B18] text-white left-0 ">
        <div class=" w-60 bg-black h-screen px-12 py-10 rounded-r-[20px]">
            <div class=" w-full py-1 bg-[#E97777] text-center">
                <h1 class="font-bold text-black text-4xl uppercase">logo</h1>
            </div>
            <div class=" mt-[90px] h-full grid grid-flow-row grid-rows-4 list">
                <div class="flex flex-col row-span-3 space-y-9 sublist">
                        <div>
                            <a href="{{url('/dashboard')}}" class="no-underline hover:text-[#FF9F29]">
                                <div class="flex items-center">
                                    <i class='bx bxs-dashboard bx-sm'></i>
                                    <span class=" pl-2 pb-[2px] capitalize text-lg">dashboard</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="{{url('/artikel')}}" class="no-underline hover:text-[#FF9F29]">
                                <div class="flex items-center">
                                    <i class='bx bxs-book-content bx-sm' ></i>
                                    <span class=" pl-2 pb-[2px] capitalize text-lg">artikel</span>
                                </div>
                            </a>
                        </div>  
                        <div>
                            <a href="{{url('/log')}}" class="no-underline hover:text-[#FF9F29]">
                                <div class="flex items-center">
                                    <i class='bx bx-history bx-sm'></i>
                                    <span class=" pl-2 pb-[2px] capitalize text-lg">log publikasi</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="no-underline hover:text-[#FF9F29]">
                                <div class="flex items-center">
                                    <i class='bx bxs-calendar-plus bx-sm'></i>
                                    <span class=" pl-2 pb-[2px] capitalize text-lg">klinik jurnal</span>
                                </div>
                            </a>
                        </div>
                </div>
                <div class="flex flex-col space-y-9">
                    <div>
                        <a href="#" class="no-underline text-[#FF9F29]">
                            <div class="flex items-center">
                                <i class='bx bxs-user bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-lg">akun</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="no-underline text-[#FF9F29]">
                            <div class="flex items-center">
                                <i class='bx bxs-exit bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-lg">logout</span>
                            </div>
                        </a>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <div class="ml-60 bg-[#CE6B18]">
        @yield('container')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        jQuery(document).ready(function () {
            jQuery(".sublist div").click(function (){
                jQuery(".sublist div").removeClass('active');
                jQuery(this).addClass('active');
            })
            var loc = window.location.href;
            jQuery(".sublist div a").each(function (){
                if (loc.indexOf(jQuery(this).attr("href")) != -1){
                    jQuery(this).closest('div').addClass("active");
                }
            });
        });
    </script>
</body>
</html>