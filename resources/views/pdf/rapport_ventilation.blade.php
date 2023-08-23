<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Ventile</th>
                <th>Non Ventile</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventilation as $ventilation)           
            <tr>
                <td>{{$ventilation->date_ventilation}}</td>
                <td>{{$ventilation->ventile}}</td>
                <td>{{$ventilation->non_ventile}}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
</body>
</html>