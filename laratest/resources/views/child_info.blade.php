<x-layout>
    
  @foreach ($children as $child)
  
    <strong>Name:</strong><a href="{{route('parent-info',$child->id)}}">{{$child->name}}</a><br>
    <strong>Class:</strong>{{$child->class}}<br>
    <strong>Roll no:</strong>{{$child->roll_no}}<br>
  @endforeach
</x-layout>
