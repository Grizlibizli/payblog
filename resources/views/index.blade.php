<table>
    <tr><th>Номер автомобиля | </th><th>Модель</th></tr>
    @foreach($drivers as $driver)
        <tr><td>{{ $driver->driver_name }}</td><td>{!!  $driver->cars()->all !!}</td></tr> <!--ряд с ячейками тела таблицы-->
    @endforeach

</table>
