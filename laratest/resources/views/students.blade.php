<x-layout>
    @foreach ($students as $student)
       <li><a href="/students/{{$student->id}}">{{$student['name']}}</a></li>
    @endforeach
</x-layout>