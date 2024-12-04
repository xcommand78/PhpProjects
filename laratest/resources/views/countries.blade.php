<x-layout>
    <table border="1px solid black"  style="border-collapse: collapse; width: 100%;">
        @php
            $columns = array('Country_name','Total_states','Area','Global_firepower_index_ranking','Gdp','Gdp_ranking')
        @endphp
        <tr>
        @foreach ($columns as $column)
            <td>{{$column}}</td>
        @endforeach
        </tr>
        @foreach ($countries as $country)
            <tr>
                <td><a href="{{route('states',$country->id)}}">{{$country->country_name}}</a></td>
                <td>{{$country->total_states}}</td>
                <td>{{$country->area}}</td>
                <td>{{$country->global_power_index_ranking}}</td>
                <td>{{$country->gdp}}</td>
                <td>{{$country->gdp_ranking}}</td>
            </tr>
        @endforeach
    </table>
</x-layout>