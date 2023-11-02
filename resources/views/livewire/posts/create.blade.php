<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form>
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titulo:</label>
                            <input type="text" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="title" wire:model="title">
                            @error('title')<span class="mx-2 text-sm text-red-700">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="body" class="block mb-2 text-sm font-bold text-gray-700">Cuerpo:</label>
                            <input type="textarea" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="body" wire:model="body">
                            @error('body')<span class="mx-2 text-sm text-red-700">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="category_id"  class="block mb-2 text-sm font-bold text-gray-700">Categoria:</label>
                            <select class="form-control" name="category_id" style="width: 100%" id="category_id"  wire:model="category_id">
                                <option value=""></option>
                                @foreach ($categories_data as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="mx-2 text-sm text-red-700">{{ $message }}</span>@enderror
                        </div>

                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="save()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-purple-600 border border-transparent rounded-md shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">Guardar Registro</button>
                            </span>

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-gray-200 border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">Cancelar</button>
                            </span>
                        </div>

                    </div>
                </form>
            </div>


    </div>
</div>
