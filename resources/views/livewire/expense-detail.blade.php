<div>
    <div class="bg-gray-950 text-gray-300 min-h-screen pt-5 pl-3 pr-3">
        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-white text-center mb-6">Expense Details</h1>

        <!-- Card Container -->
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg border border-gray-800 m-auto" style="max-width: 600px">
            <!-- Expense Title -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-white text-center mb-2">Bagan Trip Expense</h2>
                <p class="text-gray-400 text-center">Added on: <span class="text-gray-300 font-semibold">12th December 2024</span>
                </p>
            </div>

            <!-- Expense Details -->
            <div class="mt-4 space-y-4">
                <!-- Title -->
                <div>
                    <p class="text-gray-400">Title:</p>
                    <h3 class="text-xl text-gray-300 font-semibold">{{$expense->title}}</h3>
                </div>

                <!-- Remark -->
                <div>
                    <p class="text-gray-400">Remark:</p>
                    <p class="text-gray-300">{{$expense->remark}}</p>
                </div>

                <!-- Amount -->
                <div>
                    <p class="text-gray-400">Amount:</p>
                    <p class="text-xl text-gray-300 font-bold">{{$expense->amount}} Kyats</p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between mt-6">
                <a
                    href="{{route('expense')}}"
                    wire:navigate
                    class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600"
                >
                    Back
                </a>
                <div>
                    <button
                        wire:click="toggleEditForm"
                        class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600"
                    >
                        {{$showEditForm?'Cancel Edit':'Edit'}}
                    </button>
                    <button
                        onclick="return false"
                        wire:click="toggleConfirmDelete"
                        class="bg-red-700 text-white px-4 py-2 rounded hover:bg-gray-600"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal -->
        @if($showConfirmDeleteModal)
            <div
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
            >
                <div class="bg-gray-900 p-6 rounded-lg shadow-lg text-center">
                    <h2 class="text-white text-lg font-semibold mb-4">Are you sure you want to delete?</h2>
                    <div class="flex justify-center space-x-4">
                        <button
                            wire:click="deleteConfirmed"
                            class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-600"
                        >
                            Yes, Delete
                        </button>
                        <button
                            wire:click="toggleConfirmDelete"
                            class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if($showEditForm)
            <div class="bg-gray-900 p-8 rounded-lg shadow-lg border border-gray-800 m-auto mt-5"
                 style="max-width: 600px">
                <!-- Form -->
                <form wire:submit="update">
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-400 mb-2">Title</label>
                        <input
                            type="text"
                            wire:model="title"
                            class="w-full p-2 bg-gray-950 text-gray-300 border border-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-gray-600"
                            placeholder="Enter title"
                        />
                        <small class="text-red-400 font-bold">@error('title') * {{ $message }} @enderror</small>
                    </div>

                    <!-- Remark Input -->
                    <div class="mb-4">
                        <label for="remark" class="block text-gray-400 mb-2">Remark</label>
                        <textarea
                            wire:model="remark"
                            rows="3"
                            class="w-full p-2 bg-gray-950 text-gray-300 border border-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-gray-600"
                            placeholder="Enter remark"
                        ></textarea>
                        <small class="text-red-400 font-bold">@error('remark') * {{ $message }} @enderror</small>
                    </div>

                    <!-- Amount Input -->
                    <div class="mb-4">
                        <label for="amount" class="block text-gray-400 mb-2">Amount</label>
                        <input
                            type="number"
                            wire:model="amount"
                            class="w-full p-2 bg-gray-950 text-gray-300 border border-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-gray-600"
                            placeholder="Enter amount"
                        />
                        <small class="text-red-400 font-bold">@error('amount') * {{ $message }} @enderror</small>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between mt-6">
                        <button
                            wire:click="update"
                            type="submit"
                            class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>


<script>

</script>
