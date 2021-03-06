@extends('app')

@section('content')

    <h1>{{ config('blog.title') }}</h1>
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                <em>({{ $post->published_at->format('M jS Y g:ia') }})</em>
                <p>
                    {{ str_limit($post->content) }}
                </p>
            </li>
        @endforeach
        @unless(count($posts))
            <p class="text-center">You haven't posted any blog entries yet!</p>
        @endunless
    </ul>
    <hr>
    {!! $posts->render() !!}

@endsection