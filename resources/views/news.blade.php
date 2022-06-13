@extends('components.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                <div class="carousel-inner">
                    @if ($articles)
                        @foreach ($articles as $article)
                            <div class="carousel-item @if ($loop->iteration == 1) active @endif ">
                                <img src="{{ asset("storage/$article->image") }}" class="d-block w-100 h-50" alt="...">
                                <div class="carousel-caption d-none d-md-block" >
                                    <h5> {{ $article->title }} </h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection