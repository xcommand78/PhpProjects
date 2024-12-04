<x-layout>
    @foreach ($fathers as $father)
        <a href="child_info/{{$father->id}}"><strong>Name:</strong>{{$father['name']}}</a><br>
    @endforeach
</x-layout>