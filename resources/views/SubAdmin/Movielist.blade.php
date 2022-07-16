<table border='1' width='100%'>
    <th>Movie Name</th>
    <th>Movie Genre</th>
    <th>Description</th>
    <th>Banner</th>
    <th>Movie</th>
    <th>Operation</th>



    
    @foreach($Movies as $movie)
    <tr>

        <td>{{$movie->name}}</td>
        <td>{{$movie->genre}}</td>
        <td>{{$movie->description}}</td>
        <td><img src="{{asset('banners')}}/{{$movie->banner}}" alt=""></td>

        <td> <center><video controls src="{{asset('movies')}}/{{$movie->movie}}"></video></center></td>
        
        <td>
            <a href="{{route('Movie.details',['id'=>$movie->id])}}"><button>EDIT</button></a>
            <a href="{{route('Movie.delete',['id'=>$movie->id])}}"><button>DELETE</button></a>     
        </td>

        

    </tr>

    @endforeach


</table>
