<x-layout>
    @foreach($users as $user)
    <strong>Name:</strong><a href="user_info/{{$user->id}}">{{$user->name}}</a><br>
    @endforeach
</x-layout>