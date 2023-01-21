<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    @foreach ($images as $image)
                        <article>
                            {{--Foto de perfil del usuario--}}
                            <img src="{{$image->user->image}}" alt="">
                            {{--Nombre del usuario--}}
                            <h1>{{$image->user->name}}</h1>
                            {{--Nick del usuario--}}
                            <span>{{'@'.$image->user->nick}}</span>
                            {{--Imagen subida--}}
                            <img src="{{$image->image_path }}" alt="">
                            <span>{{'@'.$image->user->nick}}</span>
                            <span>{{$image->created_at}}</span>
                            <p>{{$image->description}}</p>
                            {{--<a href="{{route()}}">
                                <i></i>
                            </a>--}}
                            <span>{{$image->likes->count()}}</span>
                            
                            @if (Auth::user()->id == $image->user_id)
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-image-deletion')"
                                >{{ __('Borrar imagen') }}
                                </x-danger-button>
                            
                                <x-modal name="confirm-image-deletion">
                                    <form method="post" action="{{ route('images.destroy', ['image'=> $image->id]) }}" class="p-6">
                                        @csrf
                                        @method('delete')
                            
                                        <h2 class="text-lg font-medium text-gray-900">¿Estás seguro?</h2>
                            
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __('Si eliminas esta imagen nunca podrás recuperarla, ¿estás seguro de querer borrarla?') }}
                                        </p>

                            
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                            </x-secondary-button>
                            
                                            <x-danger-button class="ml-3">
                                                {{ __('Borrar imagen') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @endif
                            <a href="{{route('images.show', ['image'=>$image])}}">Likes {{'('.$image->likes->count().')'}}</a>
                            <a href="{{route('images.show', ['image'=>$image])}}">Comentarios {{'('.$image->comments->count().')'}}</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
