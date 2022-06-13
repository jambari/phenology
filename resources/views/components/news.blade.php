@extends('components.main')

@section('content')
    <br>
    <div class="row d-none d-sm-block">
        <div class="container">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/news" class="text-primary">Berita</a></li>
                </ol>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="container">
            <div class="col-md-12 col-lg-12 " id="news">
                @if ($articles)
                    @foreach ($articles as $article)
                        <ul class="list-unstyled">
                            <a href="/berita/{{ $article->id }}" title="{{ $article->title }}" class="text-primary">
                                <li class="media">
                                    <img class="mr-3" src="{{ asset("storage/$article->image") }}" alt="image of {{ $article->title }}" width="200" height="150" >
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">{{ $article->title }}</h5>
                                        <small>{{ date('d M Y', strtotime($article->tanggal)) }}</small>
                                        <hr>
                                        <small>Oleh {{ $article->author }}</small>
                                    </div>
                                </li>
                            </a>
                            <hr>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <p>{!! $articles->links() !!}</p>
            </div>
        </div>
    </div>
@endsection
