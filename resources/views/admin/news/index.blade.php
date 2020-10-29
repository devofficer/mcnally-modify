	@foreach($news as $new)
	<table>
		<tr>
			<td>
				<img src="/assets/news/images/{{$new->image}}">
		  		<h1>{{$new->title}}</h1>
		  		<p>{{$new->description}}</p>
		  		<a href="/admin/news/{{$new->id}}">Ver</a>
  			</td>
  		</tr>
  	</table>
    @endforeach

<a href="{{ route('news.create') }}">Crear News</a>

