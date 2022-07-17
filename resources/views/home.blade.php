@extends('layout.layout1')
@section('content')
<h1>home:{{session()->get('id')}}</h1>


<table border='1' width='100%'>
  <th>Movie Name</th>
  <th>Movie Genre</th>
  <th>Description</th>
  <th>Movie</th>
  <th>Operation</th>




  @foreach($Movies as $movie)
  <tr>

    <td>{{$movie->name}}</td>
    <td>{{$movie->genre}}</td>
    <td>{{$movie->description}}</td>

    <td>
      <center><video controls src="{{asset('movies')}}/{{$movie->movie}}" width="350" height="350"></video></center>
    </td>

    <td>
      <a href="{{route('Movie.details',['id'=>$movie->id])}}"><button>EDIT</button></a>
      <a href="{{route('Movie.delete',['id'=>$movie->id])}}"><button>DELETE</button></a>
    </td>
  </tr>
  @endforeach
</table>
<div class="row">
  @foreach($Movies as $movie)

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">

        <div class="embed-responsive embed-responsive-16by9">
          <!-- <video class="embed-responsive-item" controls src="{{asset('movies')}}/{{$movie->movie}}" allowfullscreen></video> -->
          ttt<img src="{{asset('banners')}}/{{$movie->banner}}" width="350" height="350" alt="{{$movie->name}}">
        </div>

        @if(session()->has('id'))
        <a href="{{route('Watchmovie',['id'=>$movie->id])}}" class="btn-primary">Watch Now</a>
        @else
        <!-- Button trigger modal -->
        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Watch Now
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">..</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Please login
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>
        @endif
        <p>Rating: {{$movie->rating}}</p>
        <p>Rating: {{$movie->id}}</p>

      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection