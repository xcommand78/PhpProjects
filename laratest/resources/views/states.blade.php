<x-layout>
 
    <strong>Country:</strong>{{$countries->country_name}}
    <table border="1px solid black"  style="border-collapse: collapse; width: 100%;">
        @php
        $columns = array('Name','Area','gdp','abbreviation','capital','population','official_language');
        @endphp
        <tr>
            @foreach ($columns as $column)
                <td>{{$column}}</td>
            @endforeach
        </tr>

        @foreach ($states as $state)
                <tr>
                    <td>{{$state->name}}</a></td>
                    <td>{{$state->area}}</td>
                    <td>{{$state->gdp}}</td>
                    <td>{{$state->abbreviation}}</td>
                    <td>{{$state->capital}}</td>
                    <td>{{$state->population}}</td>
                    <td>{{$state->official_language}}</td>
                </tr>
        @endforeach
    </table>
</x-layout>