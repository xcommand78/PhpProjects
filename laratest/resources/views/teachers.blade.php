<x-layout>
    @foreach($Teachers as $Teacher)
    <a href="teacher-info/{{$Teacher->id}}"><h3><strong>Name</strong>{{$Teacher['name']}}</h3></a> <a href="delete/{{$Teacher->id}}">delete</a>
    @endforeach
</x-layout>