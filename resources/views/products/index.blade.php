@extends('layouts.master')
@section('content')
@section('carrousele')
<div id="myCarousel" class="carousel slide" data-ride="carousel" >

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1585912812840-b457972f28d0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="Los Angeles" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="chicago.jpg" alt="Chicago" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="ny.jpg" alt="New York" width="1100" height="500">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
@endsection
@foreach ($products as $product)

    <div class="col-md-6">
        <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-info">
                @foreach ($product->categories as $categorie)
                    {{$categorie->name}}
                @endforeach
            </strong>
        <h5 class="mb-0">{{$product->title}}</h5>
            <div class="mb-auto text-muted">{{$product->created_at->format('d/m/Y')}}</div>
            <p class="mb-3 text-muted">{{$product->subtitle}}</p>
            <strong class="mb-4 display-4 text-secondary">{{$product->getPrice()}}</strong>
        <a href="{{route('products.show', $product->slug)}}" class="stretched-link btn btn-info"><i class="fa fa-location-arrow" aria-hidden="true"></i> Voir l'article</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{asset('storage/' . $product->image)}}" alt="">
        </div>
        </div>
    </div>
    @endforeach
    {{$products->appends(request()->input())->links()}}
@endsection
