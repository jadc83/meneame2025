<x-app-layout>

    <div class="flex justify-center items-center">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="titulo">Titulo</x-input-label>
                <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="titulo" type="text" id="titulo" :value="old('titulo')" required />
                <x-input-error class="mt-2" :messages="$errors->get('titulo')"/>
            </div>

            <div class="mb-5">
                <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="url">URL</x-input-label>
                <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="url" type="text" id="url" :value="old('url')" required />
                <x-input-error class="mt-2" :messages="$errors->get('url')" />
            </div>

            <div class="mb-5">
                <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="resumen">Resumen</x-input-label>
                <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="resumen" type="text" id="resumen" :value="old('resumen')" required />
                <x-input-error class="mt-2" :messages="$errors->get('resumen')" />
            </div>

            <div class="mb-5">
                <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="categoria_id">Categoría</x-input-label>
                <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->denominacion }}
                        </option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('categoria_id')" />
            </div>

            <div class="mt-6 flex flex-col items-center p-4 rounded-md">
                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagen">Subir imagen</label>
                <input class="text-white file-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="file" name="imagen" id="imagen" accept="image/*">
                <x-input-error class="mt-2" :messages="$errors->get('imagen')" />
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Crear
            </button>

        </form>
    </div>

</x-app-layout>
