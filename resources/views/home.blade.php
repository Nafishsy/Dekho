@extends('layout.layout1')
@section('content')

<div class="row">
  @foreach($Movies as $movie)

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
       
        <div class="embed-responsive embed-responsive-16by9">
          <img src="{{asset('banners')}}/{{$movie->banner}}" width="350" height="350" alt="{{$movie->name}}">
        </div>

        <div>
       <!-- Movie name  -->
        <h4>{{$movie->name}}</h4>
        <!-- Watch button-->
          @if(session()->has('id'))
          <button type="button" class="" data-bs-toggle="modal" data-bs-target="">
            <a href="{{route('User.watch',['id'=>$movie->id])}}" class="btn-primary">Watch Now</a>
          </button>
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
          <!-- Add List -->
          <button type="button" class="">
            <a class="" href="{{route('addlist',['id'=>$movie->id])}}">Add list</a>
          </button>

        </div>

      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection