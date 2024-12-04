<x-layout>
    <h3>{{ $student['name'] }}</h3>
    <h3>Marks</h3>
    Subject1: {{$student->marks->first()->math}}
</x-layout>