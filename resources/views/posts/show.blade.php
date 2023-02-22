@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('container')
    <div class="container mx-auto md:flex h-3/5" >
        <div class="md:w-1/2 ">
            <img src="{{asset('uploads').'/'.$post->image}}" alt="{{ $post->title }}" class="bg-contain bg-center">
            <div class="p-3">
                <p class="text-gray-500">0 Likes</p>
            </div>

            <div>
                <p class="font-bold text-gray-400">{{ $user->username }}</p>
                <p class="text-sm text-gray-600 ">{{ $user->created_at->diffForHumans() }}</p>
                <p class="mt-5 text-gray-500">
                    {{ $post->description }}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="w-full">
                            <input 
                            type="submit" 
                            value="Delete Post" 
                            class="bg-red-600 hover:bg-red-700 rounded cursor-pointer h-10 w-auto px-3 py-2 text-white mt-4">
                            
                        </div>
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            @auth    
            <div class="shadow bg-gray-800 p-5 mb-5 rounded-xl">
                <p class="text-xl font-bold text-center mb-4 text-gray-400">Add a comment</p>
                <form action="{{ route('comment.store', [$user, $post]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label id="comment" class="mb-2 block uppercase text-gray-500 font-bold" >
                            Description
                        </label>
                        <textarea 
                            type="text" 
                            name="comment" 
                            id="comment" 
                            placeholder="Write a comment"
                            class="border p-3 w-full rounded-md bg-slate-700 text-white
                                @error('comment')
                                border-red-500
                                @enderror
                            "
                        ></textarea>
                            @error('comment')
                                <p class="bg-red-400 rounded-lg text-sm text-white font-bold p-1 text-center">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="w-full flex justify-end">
                        <input 
                            type="submit" 
                            value="Post comment" 
                            class="bg-green-600 rounded hover:bg-green-700 cursor-pointer w-full h-10 text-white">
                            
                    </div>
                    @if (session('message'))
                        <div class="bg-green-600 rounded-lg text-sm mt-5 py-2 text-white text-center font-bold">
                            {{ session('message') }}
                        </div>
                    @endif
                </form>
            </div>
            @endauth
            <div class="shadow bg-gray-800 mb-5 max-h-96 rounded-xl overflow-y-scroll">
                @if ($comments->count())
                    @foreach ( $comments as $comment )
                        <div class="p-5 border-gray-700 rounded-sm border-b font-bold">
                            <a 
                                href="{{ route("posts.index", $comment->user) }}"
                                class="text-white text-lg">
                                {{ $comment->user->username }}
                            </a>
                            <p class="text-gray-300">{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No comments</p>
                @endif
            </div>
        </div>
    </div>
@endsection