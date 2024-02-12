@extends('layout')
@section('container')
    <div class="h-screen w-full pt-[100px] px-[92px]">
        <div class="flex flex-col space-y-8">
            <div class="w-full py-2 pl-14 pr-4 flex justify-between rounded-[20px] bg-white">
                <div class="flex space-x-4">
                    <div class=" w-10 h-10 my-auto rounded-full bg-pink-400"></div>
                    <div class=" flex flex-col">
                        <h1 class="font-bold capitalize">ahmaf rifai </h1>
                        <h2 class=" text-sm">ahmadrifai@gmail.com</h2>
                    </div>
                </div>
                <div>
                    <i class='bx bx-message-square-dots bx-md mt-1' ></i>
                </div>
            </div>
            <div class="bg-white px-[77px] py-[30px] text-center rounded-[20px]">
                <h2 class=" text-3xl capitalize">judul artikel</h2>
                <h1 class=" mt-8 font-bold text-3xl capitalize">optimalisasi pola jam tubuh manusia dengan sleep hygiene</h1>
                <div class="mt-14 flex justify-center">
                    <div class="font-bold text-white bg-blue-500 px-20 py-2 rounded-[10px]">diproses</div>  
                </div>
            </div>
            <div class="bg-white px-14 py-11 h-96 rounded-[20px]  overflow-auto scrollbar-hide">
                <h1 class="text-3xl capitalize">komentar :</h1>
                <p class=" text-[22px]">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit 
                    amet hendrerit augue. Integer sed feugiat urna. Aliquam erat volutpat. Praesent laoreet 
                    ultricies est, sit amet elementum elit ultricies nec. Morbi venenatis condimentum quam ac 
                    tristique. Mauris dapibus massa consequat libero interdum rutrum. Fusce vel diam lobortis 
                    sapien convallis mollis sit amet quis mi. Vivamus aliquam pellentesque ligula sed consequat. 
                    Suspendisse mi elit, porttitor eu sem at, interdum dictum elit. Proin gravida justo diam. 
                    Ut vestibulum viverra nibh, eget elementum mauris auctor eget. Ut laoreet pellentesque rutrum. 
                    In sit amet risus massa. Nam rhoncus tellus ut sagittis consectetur. Curabitur a nunc eu massa lobortis malesuada eget ut urna.
                    Nullam id nisi odio. Duis consectetur neque ut neque interdum semper. Proin nec neque eu nisi lacinia tristique quis a purus. 
                    Morbi nec mi in ex iaculis scelerisque. Nullam varius fermentum lorem, ut tempor arcu placerat sed. Pellentesque congue mauris 
                    sed odio tincidunt volutpat. Etiam rutrum aliquet pretium. Vivamus lacinia felis vitae tincidunt tristique. Maecenas ut vulputate enim, eu malesuada sem.
                    Sed lobortis nunc in blandit sollicitudin. Nam viverra risus eget tortor fermentum ornare. Nunc eu est in lorem tincidunt tincidunt 
                    eget in magna. Morbi in vehicula nisl. Maecenas fermentum velit nec tellus vulputate, ac laoreet sapien viverra. In gravida, lorem ac 
                    commodo consectetur, augue dui scelerisque est, sed facilisis mi arcu eu odio. Duis aliquet non ligula quis malesuada. Praesent elementum faucibus libero, 
                    eu tempor nisi tristique eget. Aenean laoreet, urna auctor hendrerit molestie, dui nisi fringilla felis, a pharetra odio eros vel dolor. 
                    Nullam tristique, lorem sed ultricies luctus, diam lectus eleifend nisl, nec tempor velit purus ut massa. Quisque ipsum metus, maximus 
                    sed tellus nec, hendrerit congue elit. Nunc sagittis at libero sed consectetur. Duis sit amet elit faucibus, feugiat ex ac, posuere sapien. 
                    Mauris fermentum sapien purus, nec faucibus mauris condimentum vitae. Donec finibus neque et consequat blandit. Donec eget erat in leo aliquet 
                    porta a sed velit.
                </p>
            </div>
        </div>
    </div>
@endsection