<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo1.png">
    <title>HiPub | Dashboard</title>
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
    .active > a{
        --tw-text-opacity: 1;
        color: rgb(255 159 41 / var(--tw-text-opacity));
    }
    
</style>

<body class="bg-back">
    
    {{--Sidebar--}}
        <div class="fixed left-0">
            <div class="w-70 bg-white h-screen px-8 py-10 rounded-r-[20px] shadow-lg">
                <img src="{{ asset('img/logo2.png') }}" alt="" class="container h-[100px] w-auto">
                <div class=" mt-[30px] h-full grid grid-flow-row list">
                    
                    {{--Sidebar Atas--}}
                    <div class="flex flex-col row-span-2 space-y-5 sublist">
                        <a href="{{url('')}}/{{Auth::user()->type}}/dashboard" class="no-underline border-[1px] border-primary px-4 py-2 rounded-full <?= ((request()->segment(2) == 'dashboard')|| (request()->segment(1) == 'home'))?'text-white bg-primary hover:bg-primaryhover ':'text-primary hover:text-white hover:bg-primary ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-dashboard bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">dashboard</span>
                            </div>
                        </a>
                        <a href="{{url('')}}/{{Auth::user()->type}}/artikel" class="no-underline border-[1px] border-primary px-4 py-2 rounded-full  <?= ((request()->segment(2) == 'artikel') || (request()->segment(1) == 'add_article') || in_array(request()->segment(3), ['artikel','payment','revisi','revisi_vendor']))?'text-white bg-primary hover:bg-primaryhover':'text-primary hover:text-white hover:bg-primary ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-book-content bx-sm' ></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">riwayat artikel</span>
                            </div>
                        </a>
                        @if (Auth::user()->type == 'admin')
                        <a href="{{url('')}}/{{Auth::user()->type}}/klinik" class="no-underline border-[1px] border-primary px-4 py-2 rounded-full <?= (in_array(request()->segment(2),['klinik','add_agenda']))?'text-white bg-primary hover:bg-primaryhover':'text-primary hover:text-white hover:bg-primary ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-calendar-plus bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">jadwal aktivitas</span>
                            </div>
                        </a>                  
                        @endif

                        @if (Auth::user()->type == 'user')                   
                        <a href="{{url('')}}/{{Auth::user()->type}}/log" class="no-underline border-[1px] border-primary px-4 py-2 rounded-full   <?= (request()->segment(2) == 'log')?'text-white bg-primary hover:bg-primaryhover':'text-primary hover:text-white hover:bg-primary ';?>">
                            <div class="flex items-center">
                                <i class='bx bx-history bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">catatan</span>
                            </div>
                        </a>
                        <a href="{{url('')}}/{{Auth::user()->type}}/klinik" class="no-underline border-[1px] border-primary px-4 py-2 rounded-full  <?= ((in_array(request()->segment(2),['klinik'])) || (request()->segment(3) == 'show_agenda'))?'text-white bg-primary hover:bg-primaryhover':'text-primary hover:text-white hover:bg-primary ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-calendar-plus bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">jadwal aktivitas</span>
                            </div>
                        </a>
                        @endif
                    </div>
                    {{-- {{request()->segment(2)}} --}}
    
                    {{--Sidebar Bawah--}}
                    <div class="flex flex-col bottom-0 mb-20">
                        <a href="{{ route('profile',Auth::user()->id) }}" class="no-underline border-[1px] border-primary px-4 py-2 rounded-full <?= (request()->segment(1) == 'akun')?'text-white bg-primary hover:bg-primaryhover':'text-primary hover:text-white hover:bg-primary ';?>">
                            <i class='bx bxs-user bx-sm'></i>
                            <span class=" pl-2 pb-[2px] capitalize text-md">{{Auth::user()->type}}</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex w-full bg-white mt-5 px-4 py-2 rounded-full text-primary items-center border-[1px] border-primary hover:text-white hover:bg-primary">
                                <i class='bx bx-log-out bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-60 bg-[#E1F2F6]">
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
        {{-- search input --}}
        <script>
            const searchInput = document.getElementById('search');
            const tableRows = document.querySelectorAll('tbody tr');
            searchInput.addEventListener('input', () => {
            const query = searchInput.value.toLowerCase();
    
            tableRows.forEach(row => {
                // const name = row.children[0].textContent.toLowerCase();
                const judul = row.children[1].textContent.toLowerCase();
                const status = row.children[2].textContent.toLowerCase();
    
                if (judul.includes(query) || status.includes(query)) {
                row.style.display = '';
                } else {
                row.style.display = 'none';
                }
            });
            });
        </script>
        {{-- filter input --}}
         <script>
                        // Get the table and dropdown elements
            const table = document.querySelector('#my-table');
            const statusFilter = document.querySelector('#status-filter');

            // Attach a change event listener to the dropdown
            statusFilter.addEventListener('change', function() {
            // Get the selected status value
            const selectedStatus = statusFilter.value.toLowerCase();;

            // Get all rows in the table body
            const rows = table.querySelectorAll('tbody tr');

            // Loop through each row and check if the status matches the selected value
            rows.forEach(row => {
                // Get the status cell value for the current row
                const statusCell = row.querySelector('td:nth-child(3)');
                const status = statusCell.textContent.toLowerCase();

                // Show or hide the row based on the status value
                if (selectedStatus === '' || status.includes(selectedStatus) ) {
                row.style.display = '';
                } else {
                row.style.display = 'none';
                }
            });
            });

        </script>
    </body>
</html>