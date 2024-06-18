<x-layout>


    <article>
        <h1> {!! $post->title !!}</h1>

        <p>
<<<<<<< HEAD
            <a href="/categories/{{ $post->category->id ">{{ $post->category->name }}</a>
        </p>

=======
            <a href="#">{{ $post->category->name}}</a>
        </p>


        
>>>>>>> a434854402a4837457c54b3eade1dfd1bffd9b2e
        <div>
            {!! $post->body !!}
        </div>
    </article>


    <a href="/">Go Back</a>
</x-layout>


