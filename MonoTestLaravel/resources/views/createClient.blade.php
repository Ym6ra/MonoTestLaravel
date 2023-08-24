@extends('layouts.base')

@section('title')
Создать нового клиента
@endsection

@section('content')



<h1>Создать нового клиента</h1>
<hr>
<h2>Персональные данные</h2>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
@endif
<form action="{{route('successCreateClient')}}" method="post">
    @csrf
    <div class="form-row col-md-10">
        <div class="form-group col-md-4">
            <label for="name">ФИО клиента</label>
            <input type='text' name='name'  placeholder="ФИО, не менее 3 символов" id='name' class='form-control'>
        </div>
        <div class="form-group col-md-2">
            <label for="phone">Номер телефона</label>
            <input type="tel" id="phone" name="phone" class='form-control' placeholder="Только цифры согласно примера 88005553535" >
        </div>
        </div>
        <div class="form-row col-md-10">
        <div class="form-group col-md-4">
            <label for="address">Адрес</label>
            <input type='text' name='address' placeholder="Адрес" id='address' class='form-control'>
        </div>
        <div class="form-group col-md2">
            <label for="gender">Пол</label>
            <select name="gender" class='form-control'>
                <option>муж</option>
                <option>жен</option>
                <option>иное</option>
            </select>
        </div>
        </div>
        {{--<div class="form-group col-md2">
            <label for="cars">Машины</label>
            <input type='number' name='cars' placeholder="Сколько машин" id='cars' class='form-control'>
        </div>--}}

    </div>
    <button type="submit" class="btn btn-primary">Отправить данные клиента</button>

</form>
<hr>
<form action="{{route('AllData', 1)}}" method="get">
    <button type="submit" class="btn btn-primary">На главную</button>
</form>




@endsection
