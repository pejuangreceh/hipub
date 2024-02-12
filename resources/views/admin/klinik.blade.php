@extends('layout')
@section('container')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <style>
        .fc .fc-button {
            background-color: #00ccff;
            border: none;
            border-radius: 6px;
        }
        .fc .fc-button:hover {
            background-color: #00A6CF;
            border: none;
            border-radius: 6px;
        }
        .fc .fc-button-primary { 
            border-color: #E1F2F6;
        }
        .fc .fc-button-primary:disabled {
            background-color: #00A6CF;
        }
        .fc .fc-daygrid-day.fc-day-today {
            background-color: #E1F2F6;
        }
    </style>
    <div class="w-full h-screen p-14">
        <div class="w-full pb-10">
            <div class="w-full rounded-[10px] bg-white p-5">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="my-2 text-3xl font-extrabold tracking-tight text-dark md:text-3xl">Kalendar Aktivitas</h2>
                </div>
                <div class="mx-auto lg:w-full my-6">
                    <div class="container pt-2 pb-6 lg:w-[70%] md:w-full sm:w-full justify-center">
                        <div id='calendar'></div>
                    </div>
                    <div class="flex flex-warp justify-center w-full px-6 mt-4 mb-6">
                        <div class="col pl-1 font-semibold text-dark text-lg">Tambah Agenda:</div>
                        <div class="col pl-4">
                            <a href="{{url('')}}/{{Auth::user()->type}}/add_agenda" class="text-white bg-primary hover:bg-primaryhover focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Tambah</a>
                        </div>
                    </div>
                    <div class="w-full px-6">
                        <div class="py-2 border border-l-0 border-r-0 text-center">
                            <div class="pl-1 font-semibold text-dark text-lg">Detail Aktivitas</div>
                        </div>
                        @foreach ($data_calendar as $c)
                        <section
                            class="relative flex w-full items-start justify-center overflow-y-hidden">
                            <!-- Sidenav -->
                            <div class="w-full" id="accordion">
                                <div class="border border-l-0 border-r-0 border-t-0 border-[#e5e7eb]">
                                    <div class="mb-0" id="flush-heading{{ $c["id"] }}">
                                        <a href="{{ $c["url"] }}" class="group relative flex w-full items-center rounded-none border-0 py-2 px-5 text-left text-dark text-[14px] transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]"
                                        type="button"
                                        data-te-collapse-init
                                        data-te-collapse-collapsed
                                        data-te-target="#flush-collapse{{ $c["id"] }}"
                                        aria-expanded="true"
                                        aria-controls="flush-collapse{{ $c["id"] }}">
                                            <div class='bg-primaryhover hover:bg-primary rounded-full w-1 h-5 mr-2'></div>
                                        <div class="font-bold">{{ $c["title"] }}</div>
                                            <span class="ml-auto h-4 w-4 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-4 w-4">
                                                    <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        id="flush-collapse{{ $c["id"] }}"
                                        class="!visible hidden border-0 flex w-full justify-between"
                                        data-te-collapse-item
                                        aria-labelledby="flush-heading{{ $c["id"] }}"
                                        data-te-parent="#accordion">
                                        <div class="col w-auto">
                                            <div class="px-4 pt-3 text-secondary text-sm">
                                                <i class='bx bx-calendar'></i>
                                                <span class="pl-1">{{ date('Y-m-d', strtotime($c['start'])) }} - {{ date('Y-m-d', strtotime($c['end'])) }}</span>
                                            </div>
                                            <div class="px-4 pb-2 text-sm pt-2">
                                                {{ $c["desc"] }}
                                            </div>
                                        </div>
                                        <div class="col w-auto pt-3 pr-5 text-right">
                                            <div class="space-y-2">
                                                <a href="{{url('')}}/{{Auth::user()->type.'/'.$c->id.'/edit_agenda'}}">
                                                <button
                                                    type="button"
                                                    class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primaryhover"
                                                    data-te-toggle="modal"
                                                    {{-- data-te-target="#modalCenter{{ $c["id"] }}" --}}
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light">
                                                    Edit
                                                </button>
                                                </a>
                                                <div
                                                    data-te-modal-init
                                                    class="fixed top-[-8px] left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none bg-black bg-opacity-50"
                                                    id="modalCenter{{ $c["id"] }}"
                                                    tabindex="-1"
                                                    aria-labelledby="exampleModalCenterTitle"
                                                    aria-modal="true"
                                                    role="dialog">
                                                    <div
                                                        data-te-modal-dialog-ref
                                                        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                                        <div
                                                        class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                                        <div
                                                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border border-l-0 border-r-0 border-t-0 border-slate-100 border-opacity-100 p-4">
                                                            <h5
                                                            class="text-xl font-medium leading-normal text-neutral-800"
                                                            id="exampleModalScrollableLabel">
                                                            {{ $c["title"] }}
                                                            </h5>
                                                            <button
                                                            type="button"
                                                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                            data-te-modal-dismiss
                                                            aria-label="Close">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="h-6 w-6">
                                                                <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            </button>
                                                        </div>
                                                        <div class="relative p-4 text-left">
                                                            <p>{{ $c["desc"] }}</p>
                                                        </div>
                                                        <div
                                                            class="flex flex-shrink-0 flex-wrap items-center justify-between rounded-b-md border border-l-0 border-r-0 border-b-0 border-slate-100 border-opacity-100 p-4">
                                                            <button
                                                            type="button"
                                                            class="mr-2 inline-block rounded bg-indigo-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-primary hover:text-white"
                                                            data-te-modal-dismiss
                                                            data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                            Tutup
                                                            </button>
                                                            <button
                                                            type="button"
                                                            class="ml-1 inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primaryhover"
                                                            data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                            Daftar
                                                            </button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>                    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // calendar
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',    
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,basicWeek,basicDay'
          },
          defaultView: 'month',
          editable: false,
          events: [
            @foreach($data_calendar as $c)
              {
                  title: "{{$c['title']}}",
                  start: "{{date('Y-m-d', strtotime($c['start']))}}",
                  end: "{{date('Y-m-d', strtotime($c['end']))}}",
                  url: "{{'#link'.$c['id']}}"
              },
              @endforeach
          ]
          });
          calendar.render();
        });
        const tabs = document.querySelectorAll('.border-t > a');    
    </script>
@endsection