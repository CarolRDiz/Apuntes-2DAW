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
                        <article>
                            <img src="{{$image->user->image}}" alt="">
                            <h1>{{$image->user->name}}</h1>
                            <span>{{'@'.$image->user->nick}}</span>
                            <img src="{{$image->image_path }}" alt="">
                            <span>{{'@'.$image->user->nick}}</span>
                            <span>{{$image->created_at}}</span>
                            <p>{{$image->description}}</p>
                            {{--<a href="{{route()}}">
                                <i></i>
                            </a>--}}
                            <span>{{$image->likes->count()}}</span>
                            
                            @if (Auth::user()->id == $image->user_id)
                                <button>Borrar</button>
                            @endif
                            <!-- COMENTARIOS -->
                            <h2>Comentarios {{'('.$image->comments->count().')'}}</h2>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            <form method="POST" action="{{ route('comments.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data"
                            >
                                @csrf
                                @method('post')
                                <input id="image_id" name="image_id" type="hidden" value="{{$image->id}}">
                                <div>
                                    <textarea name="content" class="mt-1 block w-full" cols="50" rows="5" placeholder="Comentario"></textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                                </div>
                        
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Enviar') }}</x-primary-button>
                                </div>
                            </form>


                            @foreach ($comments as $comment)
                                <span>{{'@'.$comment->user->nick}}</span>
                                <p>{{$comment->content}}</p>
                                @if (Auth::user()->id == $comment->user_id || Auth::user()->id == $image->user->id)
                                    {{-- Formulario necesario para petición con método DELETE --}}
                                    <form action="{{route('comments.destroy', ['comment'=>$comment->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="this.closest('form').submit(); return false;">
                                            <span>Borrar</span>
                                        </a>
                                    </form>
                                @endif
                            @endforeach
                        </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
