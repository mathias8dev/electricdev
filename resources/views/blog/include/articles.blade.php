@if ($articles->count() == 0)
    @include('blog.include.no-content')
@else
    <div class="articles">



        @foreach ($articles as $article)
            <div class="article-wrap"
                onclick="navigate('{{ route('blog.article.show', ['category' => strtolower($article->category->name),'article' => $article->slug]) }}')">
                {{-- The article illustration image container --}}
                <div class="article-illustration"
                    onclick="navigate('{{ route('blog.article.show', ['category' => strtolower($article->category->name),'article' => $article->slug]) }}')">
                    <img src="{{ asset('storage/' . $article->illustration_image) }}"
                        alt="Image illustrant l'article">
                </div>

                {{-- The article title --}}
                <h1
                    onclick="navigate('{{ route('blog.article.show', ['category' => strtolower($article->category->name),'article' => $article->slug]) }}')">
                    {{ $article->title }}
                </h1>

                {{-- The article readmore link whenever the click on an element in the block will navigate the user to another page --}}
                <div class="read-more">
                    <a
                        href="{{ route('blog.article.show', ['category' => strtolower($article->category->name),'article' => $article->slug]) }}">Lire
                        plus</a>
                </div>
            </div>
        @endforeach

    </div>
@endif


<script>
    function navigate(route) {
        window.location.href = route
    }
</script>
