<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir nueva imagen') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
                        <form method="POST" action="{{ route('images.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data"
                        >
                            @csrf
                            @method('post')
              
                            <div>
                                <x-input-label for="image" :value="__('Imagen')" />
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" required autofocus autocomplete="image"/>
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Descripción')" />
                                <textarea name="description" class="mt-1 block w-full" cols="50" rows="5" placeholder="Description"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Subir imagen') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>