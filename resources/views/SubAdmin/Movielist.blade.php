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
        <td> <center><video controls src="{{asset('movies')}}/{{$movie->movie}}"></video></center></td>

        
        <td><a href="{{route('Movie.details',['id'=>$movie->id])}}">EDIIT</a> <button>Edit</button></td>

    </tr>

    @endforeach


</table>
