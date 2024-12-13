<!-- Edit form -->

<form class="w-4/5 bg-white rounded-lg shadow-md p-8" id="shiftEditForm" action="{{ route('shifts.update', ['id' => $shift->id]) }}">
    @method('PUT')>
    @csrf
    <!-- Título del formulario -->
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit shift information</h2>

    <!-- Campo Nombre -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
            Name
        </label>
        <input type="text" id="name" name="name"
            class="w-200 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            placeholder="Enter the shift name" 
            value="{{$shift->name}}"
            required>
    </div>

    <!-- Campo inicio  -->
    <div class="mb-4">
        <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">
            Start time
        </label>
        <input type="time" id="start_time" name="start_time"
            class="w-30 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
             value="{{$shift->start_time}}"
            required>
    </div>

    <!-- Campo fin -->
    <div class="mb-4">
        <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">
            End time
        </label>
        <input type="time" id="end_time" name="end_time"
            class="w-30 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
             value="{{$shift->end_time}}"
            required>
    </div>



    <!-- Botón Submit -->
    <div class="flex items-center justify-end">
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300"
            
            >
            Save
        </button>
    </div>
</form>