
@foreach( $cars as $car )
    <tr>
        <th scope="row">{{ $car->id }}</th>
        <td>{{ $car->make }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->year }}</td>
        <td>{{ $car->condition }}</td>
        <td>{{ $car->price }}</td>
        <td>{{ $car->status }}</td>
        <td>{{ $car->seller }}</td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $cars->links('pagination::bootstrap-4') !!}
    </td>
</tr>