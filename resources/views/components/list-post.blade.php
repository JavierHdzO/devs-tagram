<div>
    @if( $posts->count() )
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach ($posts as $post )
                <div>
                    <a href="{{ route('posts.show', [ 'post' => $post, 'user' => $post->user ]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="{{ $post->title }} image">
                    </a>
                </div>
            @endforeach
        </div>

        <div>
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-gray-400 tex-2xl text-center">No posts</p>
    @endif
</div>