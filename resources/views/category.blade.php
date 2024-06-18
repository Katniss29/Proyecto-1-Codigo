<x-layout>
    <h1>Posts in {{ $category->name }}</h1>

    @if($posts->isEmpty())
        <p>No posts found in this category.</p>
    @else
        @foreach($posts as $post)
            <article>
                <h2>
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h2>
                <p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                </p>
                <div>
                    {!! $post->excerpt !!}
                </div>
            </article>
        @endforeach
    @endif
</x-layout>
