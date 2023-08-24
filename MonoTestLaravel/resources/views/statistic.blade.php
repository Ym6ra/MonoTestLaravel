@extends('layouts.base')

@section('title')
Статистика стоянки
@endsection

@section('content')
<div>
    <h4>В данный момент на стоянке
        <strong>{{$data['asCount']}}</strong>
        машин из <strong>{{$data['aCount']}}</strong>
        зарегистрированных
    </h4>
</div>
<hr>
<table class="table table-bordered">
    <caption>
        <span>Статистика стоянки</span><br>
    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="text-center">Марки автомобилей <br>
            зарегистрированных на стоянке</th>
        <th scope="col" class="text-center">Сейчас на стоянке,<br> кол-во шт</th>
        <th scope="col" class="text-center">Всего зарегистрированно,<br> кол-во шт</th>
        <th scope="col" class="text-center">Присутствие</th>
    </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < $data['amCount']; $i++)
        <tr>
            <td class="text-center">
                {{$data['aMark'][$i]->mark}} <br>
                Популярность: {{round(($data['amVal'][$i]/$data['asCount'])*100, 2)}}%
            </td>
            <td class="text-center">
                {{$data['amsVal'][$i]}}
            </td>
            <td class="text-center">
                {{$data['amVal'][$i]}}
            </td>
            <td class="text-center">
                {{round(($data['amsVal'][$i]/$data['amVal'][$i])*100, 2)}}%
            </td>
        </tr>
        @endfor
    </tbody>
</table>
<form action="{{route('AllData', 1)}}" method="get">
    <button type="submit" class="btn btn-primary">На главную</button>
</form>



@endsection
