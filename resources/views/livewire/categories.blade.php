<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            @if(session()->has('message'))
            <div class="px-4 py-4 my-3 text-teal-900 bg-teal-100 rounded-b shadow-md" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
            @endif
            <button class="px-4 py-2 my-3 font-bold text-white bg-green-500 hover:bg-green-600" wire:click="create()">Nuevo Registro</button>
            @if($modal)
             @include('livewire.categories.create')
            @endif
            @if($modaldelete)
            @include('livewire.categories.delete', ['id' => $category_id])
           @endif
            <table class="table w-full divide-gray-200 dvide-y table-responsive">
                <thead class="font-bold text-gray-500 bg-indigo-200">
                  <tr>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase" scope="col">#</th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase" scope="col">Id</th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase" scope="col">Titulo</th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase" scope="col">Slug</th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase" scope="col">Fecha Creación</th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase" scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                    @foreach($categories as $value)
                  <tr>
                    <td class="px-2 py-4 whitespace-nowrap"></td>
                    <td class="px-2 py-4 whitespace-nowrap">{{$value->id}}</td>
                    <td class="px-2 py-4 whitespace-nowrap">{{$value->name}}</td>
                    <td class="px-2 py-4 whitespace-nowrap">{{$value->slug}}</td>
                    <td class="px-2 py-4 whitespace-nowrap">{{$value->created_at}}</td>
                    <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                        <div class="flex justify-start space-x-1">
                            <button wire:click="update({{$value->id}})" class="p-1 border-2 border-indigo-200 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                  </svg>
                            </button>

                            <button wire:click="delete({{$value->id}})" class="p-1 border-2 border-indigo-200 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            </button>

                        </div>
                    </td>
                  </tr>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>

    </div>

</div>
