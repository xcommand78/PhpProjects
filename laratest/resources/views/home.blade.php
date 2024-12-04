<x-layout>
    @foreach ($jobs as $job)
       <li><a href="/job/{{$job['jobId']}}">{{$job['position']}}</a></li>
    @endforeach

</x-layout>