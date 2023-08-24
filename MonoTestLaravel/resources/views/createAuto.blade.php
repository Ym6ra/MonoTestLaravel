@extends('layouts.base')

@section('title')
Клиент № {{$data['clientId']}}
@endsection

@section('content')
{{--{{$data['pid']->}}--}}
{{--{{dd($pid[0]->id)}}--}}
<div class="d-flex justify-content-center mt-3 align-items-center">
@if ($data['clientId'] != $data['pid'][0]->id)
    @for ($i = 0; $i < $data['last']; $i++)
        @if ($data['clientId'] == $data['pid'][$i]->id)
            <a class='mr-3' href="{{route('oneClientData', $data['pid'][$i-1]->id)}}">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </a>
        @endif
    @endfor
@endif

<h1>Клиент № {{$data['clientId']}}</h1>

@if ($data['clientId'] != $data['pid'][$data['last']-1]->id)
    @for ($i = 0; $i < $data['last']; $i++)
        @if ($data['clientId'] == $data['pid'][$i]->id)
            <a class='ml-3' href="{{route('oneClientData', $data['pid'][$i+1]->id)}}">
                <span class="material-symbols-outlined">
                    arrow_forward
                </span>
            </a>
        @endif
    @endfor
@endif
</div>
<hr>
{{--<h2>Персональные данные</h2>--}}
{{--@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
@endif--}}
<table class="table table-bordered">
    <caption>
        Персональные данные клиента
    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="text-center">Идентификатор</th>
        <th scope="col" class="text-center">ФИО</th>
        <th scope="col" class="text-center">Пол</th>
        <th scope="col" class="text-center">Номер телефона</th>
        <th scope="col" class="text-center">Адрес</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col" class="text-center">
                {{$data['clientId']}}
            </td>
            <td scope="col" class="text-center">
                {{$client[0]->name}}
            </td>
            <td scope="col" class="text-center">
                {{$client[0]->gender}}
            </td>
            <td scope="col" class="text-center">
                {{$client[0]->phone}}
            </td>
            <td scope="col" class="text-center">
                {{$client[0]->address}}
            </td>
        </tr>
    </tbody>
</table>
    <hr>
<table class="table table-bordered">
    <caption>
        Имеющиеся автомобили
    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="text-center">Марка</th>
        <th scope="col" class="text-center">Модель</th>
        <th scope="col" class="text-center">Цвет</th>
        <th scope="col" class="text-center">Гос номер</th>
        <th scope="col" class="text-center">Статус</th>
        <th scope="col" class="text-center">Редактировать</th>
        <th scope="col" class="text-center">Удалить</th>
    </tr>
    </thead>
    <tbody>
        @if ($client[0]->id != null)
        @for ($i = 0; $i < $data['val']; $i++)
        <tr>
            <td scope="col" class="text-center">
                {{$client[$i]->mark}}
            </td>
            <td scope="col" class="text-center">
                {{$client[$i]->model}}
            </td>
            <td scope="col" class="text-center">
                <div style="height: 15px; width:15px; background-color:{{$client[$i]->color}};" class="text-center"></div>{{$client[$i]->color}}
            </td>
            <td scope="col" class="text-center">
                {{$client[$i]->number}}
            </td>
            <td scope="col" class="text-center">
                {{$client[$i]->status}}
            </td>
            <td class="text-center">
                <form action='{{route('updateAuto', $client[$i]->id)}}'>
                    <button class='btn btn-primary'>Редактировать Автомобиль</button>
                </form>
            </td>
            <td class="text-center">
                <form action='{{route('deleteAuto',$client[$i]->id)}}'>
                    <button class='btn btn-danger'>Удалить Автомобиль</button>
                </form>
            </td>
        </tr>
        @endfor
        @endif
    </tbody>
</table>
    <hr>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
@endif
<form action="{{route('successCreateAuto', $data['clientId'] )}}" method="post">
    @csrf
    <h4>Новый Автомобиль</h4>
        <input type="hidden" name="client_id" value="{{$data['clientId']}}">
        <input type="hidden" name="cars" value="1"> <!--оставшийся костыль -->
        @include('layouts/carsCreate')
        <button type="submit" class="btn btn-primary">Сохранить автомобиль</button>
</form>
<hr>
<form action="{{route('AllData', 1)}}" method="get">
    <button type="submit" class="btn btn-primary">На главную</button>
</form>




@endsection
