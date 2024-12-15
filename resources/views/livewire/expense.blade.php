<div>
    <div class="bg-gray-950 text-gray-300 min-h-screen pt-5 pl-3 pr-3">
        <!-- Card Container -->
        <h1 class="text-3xl font-bold text-white text-center mb-6">Bagan Trip Expenses</h1>

        <div class="bg-gray-900 p-8 rounded-lg shadow-lg border border-gray-800 m-auto" style="max-width: 600px">
            <h1 class="text-2xl font-bold text-white text-center mb-6">Add New Expense</h1>
            <!-- Form -->
            <form wire:submit="save">
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
                        type="submit"
                        class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600"
                    >
                        Save
                    </button>
                    <button
                        type="reset"
                        class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700"
                    >
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="mt-5 mx-auto w-full" style="max-width: 600px">
            <!-- Search Box -->
            <div class="mb-4">
                <input
                    type="text"
                    placeholder="Search..."
                    class="w-full p-2 bg-gray-950 text-gray-300 border border-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-gray-600"
                    id="searchBox"
                    onkeyup="filterTable()"
                />
            </div>

            <!-- Total Amount -->
            <div class="mb-4">
                <p>Total Amount - <span class="font-bold">{{$total}} Kyats</span></p>
            </div>

            <!-- Table -->
            <table class="table-auto w-full border-collapse border border-gray-800 text-gray-300">
                <!-- Table Header -->
                <thead class="bg-gray-900 text-gray-400">
                <tr>
                    <th class="px-4 py-2 border border-gray-800 text-left">Title</th>
                    <th class="px-4 py-2 border border-gray-800 text-left">Amount</th>
                    <th class="px-4 py-2 border border-gray-800 text-left">Actions</th>
                </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach($expenses as $expense)
                    <tr class="bg-gray-950 hover:bg-gray-900 transition">
                        <td class="px-4 py-2 border border-gray-800">{{$expense->title}}</td>
                        <td class="px-4 py-2 border border-gray-800">{{$expense->amount}}</td>
                        <td class="px-4 py-2 border border-gray-800">
                            <a href="{{route('expenseDetail',$expense->id)}}" wire:navigate
                               class="bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600"
                            >
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
