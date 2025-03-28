<div class="card" id="ordersTable">
    <div class="card-body">
        <div class="flex justify-end mb-5">
            <div class="xl:col-span-2 xl:col-start-11">
                <div class="ltr:lg:text-right rtl:lg:float-left">
                    <a href="#!" data-modal-target="addLeaveModal" wire:click="create" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Add Task</span></a>
                </div>
            </div>
        </div><!--col grid-->
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="text-left bg-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200">
                    <tr>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Id</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Title</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Description</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Status</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">{{ $task->id }}</td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">{{ $task->title }}</td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">{{ $task->description }}</td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            @if ($task->completed_at )
                            <span class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-green-100 text-green-500 dark:bg-green-400/20 dark:border-transparent">Completed</span>
                            @else   
                            <span class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-yellow-100 border-yellow-100 text-yellow-500 dark:bg-yellow-400/20 dark:border-transparent">Pending</span>
                            @endif
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            <div class="flex gap-2">
                                <a href="#!" wire:click="edit({{ $task->id }})" class="flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 text-slate-500 bg-slate-100 hover:text-white hover:bg-slate-500 dark:bg-zink-600 dark:text-zink-200 dark:hover:text-white dark:hover:bg-zink-500"><img class="p-2" src="{{ asset('images/edit-icon.webp') }}" alt=""></a>
                                @if (!$task->completed_at )
                                <a href="#!" wire:click="completeTask({{ $task->id }})" class="flex items-center justify-center text-green-500 transition-all duration-200 ease-linear bg-green-100 rounded-md size-8 hover:text-white hover:bg-green-500 dark:bg-green-500/20 dark:hover:bg-green-500"><img class="p-2" src="{{ asset('images/check-icon.webp') }}" alt=""></a>
                                @endif
                                <a href="#!" data-modal-target="deleteModal" wire:click="deleteConfirm({{ $task->id }})" class="flex items-center justify-center text-red-500 transition-all duration-200 ease-linear bg-red-100 rounded-md size-8 hover:text-white hover:bg-red-500 dark:bg-red-500/20 dark:hover:bg-red-500"><img class="p-2" src="{{ asset('images/trash-red-icon.webp') }}" alt=""></a>
                            </div>
                        </td>
                    </tr>
    
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $tasks->links('vendor.livewire.tailwind') }}



        <!-- Modal Container -->
        <div id="modalContainer">
            <!-- Background Overlay -->
            <div x-show="$wire.isOpen || $wire.isDeleteOpen"
                style="background-color: rgba(0, 0, 0, 0.4); z-index:1005"
                class="fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity duration-300"
                x-transition:enter="ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="$wire.closeModal()">
            </div>

            <!-- Add/Edit Task Modal -->
            <div x-data="{ open: @entangle('isOpen') }" 
                x-show="open" 
                class="fixed flex flex-col transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4"
                style="top: 50%">
                <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600"> 
                    <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                        <h5 class="text-16">{{ $taskId ? 'Edit Task' : 'Add Task' }}</h5>
                    </div>
                    
                    <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                        <form wire:submit.prevent="store">
                            <div class="mb-4">
                                <label class="inline-block mb-2 text-base font-medium">Title</label>
                                <input type="text" 
                                    wire:model="title" 
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('title') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="inline-block mb-2 text-base font-medium">Description</label>
                                <textarea wire:model="description" 
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"></textarea>
                                @error('description') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            @role('admin')
                            <div class="mb-4">
                                <label class="inline-block mb-2 text-base font-medium">User</label>
                                <select 
                                    wire:model="user_id" 
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <option value="" selected disabled>Select a User</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            @endrole


                            <div class="flex justify-end gap-2 mt-4">
                                <button type="button" 
                                        wire:click="closeModal" 
                                        class="text-red-500 transition-all duration-200 ease-linear bg-white border-white btn hover:text-red-600 focus:text-red-600 active:text-red-600 dark:bg-zink-500 dark:border-zink-500">Cancel</button>
                                <button type="submit" 
                                        class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Delete Confirmation Modal -->
            <div x-data="{ open: @entangle('isDeleteOpen') }" 
                x-show="open" 
                class="fixed flex flex-col transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4"
                style="top: 50%">
                <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                    <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                        <img src="data:image/png;base64,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" 
                            alt="" 
                            class="block h-12 mx-auto">
                        <div class="mt-5 text-center">
                            <h5 class="mb-1">Confirm Delete</h5>
                            <p class="text-slate-500 dark:text-zink-200">Are you sure you want to delete this task?</p>
                            
                            <div class="flex justify-center gap-2 mt-6">
                                <button wire:click="closeModal" 
                                        class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                                <button wire:click="delete" 
                                        class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


    </div>
</div>


<script src="http://localhost:3000/socket.io/socket.io.js"></script>    
    
<script>

    // helper function
    function createElementFromHTML(htmlString) {
        let div = document.createElement('div');
        div.innerHTML = htmlString.trim();
        return div.firstChild;
    }
        
    // Connect to the Socket.IO server
    var socket = io('http://localhost:3000');

    socket.on('send-notification', (data) => {
        if(data.userId == {{ auth()->user()->id }})
        {
            let notifications_count = document.getElementById('notifications-count');
            let notifications_list = document.getElementById('notification-list');
            let blue_dot = document.getElementById('blue-dot');

            blue_dot.classList.remove('hidden');
            
            notifications_count.innerHTML = +notifications_count.innerHTML + 1; 

            notifications_list.appendChild(createElementFromHTML(`
                <a href="#!" class="gap-3 p-4 product-item hover:bg-slate-50 dark:hover:bg-zink-500 follower grow">
                    <h6 class="mb-1 font-medium"><b>New Task:</b> ${data.taskTitle}</h6>
                    <p class="mb-0 text-sm text-slate-500 dark:text-zink-300">
                        <span class="align-middle">${new Date().toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</span>
                    </p>
                </a>
            `));   
        }


    });

    // Massages
    document.addEventListener('delete-task', () => {
        Swal.fire({
            title: "Task Deleted!",
            icon: "success",
        });
    });
    document.addEventListener('create-task', (data) => {
        Swal.fire({
            title: "Task Created!",
            icon: "success",
        });

        var isAdmin = @json(auth()->user()->hasRole(['admin']));
        
        if(isAdmin)
        {
            socket.emit('newTask', {userId: data.detail[0].userId, taskTitle: data.detail[0].taskTitle}); 
        }
    
    });
    document.addEventListener('update-task', () => {
        Swal.fire({
            title: "Task Updated!",
            icon: "success",
        });
    });
    document.addEventListener('complete-task', () => {
        Swal.fire({
            title: "Task Completed!",
            icon: "success",
        });
    });


    // This happens because an issue occurs when the page loads, causing the modals to appear for a few milliseconds
    let modalContainer = document.getElementById('modalContainer');
    modalContainer.style.display = 'none';

    document.addEventListener('init-modals', () => {
        modalContainer.style.display = 'block !important';
    });

</script>
