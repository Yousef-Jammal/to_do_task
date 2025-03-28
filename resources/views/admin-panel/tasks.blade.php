    @extends('layout.master')
        
        
        
        @section('content') 

            <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">Tasks</h5>
                        </div>
                    </div>

                    {{-- <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-12">
                        
                        <div class="xl:col-span-3">
                            <div class="card">
                                <div class="flex items-center gap-3 card-body">
                                    <div class="flex items-center justify-center text-green-500 bg-green-100 rounded-md size-12 text-15 dark:bg-green-500/20 shrink-0"><i data-lucide="calendar-check"></i></div>
                                    <div class="grow">
                                        <h5 class="mb-1 text-16"><span class="counter-value" data-target="5">0</span></h5>
                                        <p class="text-slate-500 dark:text-zink-200">Done Tasks</p>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="xl:col-span-3">
                            <div class="card">
                                <div class="flex items-center gap-3 card-body">
                                    <div class="flex items-center justify-center text-yellow-500 bg-yellow-100 rounded-md size-12 text-15 dark:bg-yellow-500/20 shrink-0"><i data-lucide="loader"></i></div>
                                    <div class="grow">
                                        <h5 class="mb-1 text-16"><span class="counter-value" data-target="6">0</span></h5>
                                        <p class="text-slate-500 dark:text-zink-200">Pending Tasks</p>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end grid--> --}}

                    @livewire('tasks-table')
                    
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        @endsection

