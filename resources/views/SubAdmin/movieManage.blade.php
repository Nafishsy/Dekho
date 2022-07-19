@extends('layouts.afterLoginLayoutSubAdmin')
@section('content')
<style>
.container {
   max-width: 35% !important;
   float:left;
}
</style>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  

 <div class="container"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      {{$i=0;}}
      @foreach($Movies as $movie)
        @if ($loop->first)
        <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
        @else
        <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
        {{$i=$i+1;}}
        @endif
      @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">    
      @foreach($Movies as $movie)
        @if ($loop->first)
        <div class="item active">
        <a href="{{route('Movie.watch',['id'=>$movie->id])}}" target="_self">
        <img src="{{asset('banners')}}/{{$movie->banner}}" alt="Los Angeles" style="width:100%;">
        </a>
        </div>
        
        @else
        <div class="item">
        <a href="{{route('Movie.watch',['id'=>$movie->id])}}" target="_self">
        <img src="{{asset('banners')}}/{{$movie->banner}}" alt="Chicago" style="width:100%;">
        </div>
        @endif
      @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@endsection
