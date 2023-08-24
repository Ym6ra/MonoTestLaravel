@extends('layouts.base')

@section('title')
Наши клиенты
@endsection

@section('content')

<table class="table table-bordered">
    <caption>
        <span>Все клиенты</span><br>
        <a class='btn btn-primary' href="{{route('createClient')}}">Добавить новго клиента</a>
        <a class='btn btn-primary' href="{{route('statistic')}}">Статистика стоянки</a>


    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="text-center">ФИО</th>
        <th scope="col" class="text-center">Автомобиль</th>
        {{--<th scope="col" class="text-center">Фиксация времени</th>--}}
        <th scope="col" class="text-center">Номер телефона</th>
        <th scope="col" class="text-center">Редактировать</th>
        <th scope="col" class="text-center">Удалить</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $client)
    <tr>
        <td class="text-center">
            <h4>{{$client->name}}</h4>
        <a class='btn btn-primary' href="{{route('oneClientData', $client->id)}}">Детальнее</a>
            <div></div>
        </td>
        <td class="text-center">
            @for ($i = 0; $i <= $val['clientsPerPage']-1; $i++)
                        {{--{{$val['autos'][$i]}}--}}
                @for ($a = 0; $a <= $val['autosPerClient'][$i]-1; $a++)
                        {{--{{$val['autos'][$i][$a]->client_id}}--}}
                    @if ($client->id == $val['autos'][$i][$a]->client_id)
                        {{--{{$val['autos'][$i][$a]->client_id}}--}}
                        <form action="{{route('updateStatus',$val['autos'][$i][$a]->id)}} " method="post">
                        @csrf
                        @if ($val['autos'][$i][$a]->status == 'Присутствует')
                            <input type="hidden" name="status" value="Отсутствует">
                            <button type="submit" class="alert alert-success">
                                <span>Гос. Номер: <strong>{{$val['autos'][$i][$a]->number}}</strong></span><br>
                                <span>Статус: {{$val['autos'][$i][$a]->status}}</span>
                            </button>
                        </form>
                        @else
                            <input type="hidden" name="status" value="Присутствует">
                            <button type="submit" class="alert alert-danger">
                                <span>Гос. Номер: <strong>{{$val['autos'][$i][$a]->number}}</strong></span><br>
                                <span>Статус: {{$val['autos'][$i][$a]->status}}</span>
                            </button>
                        </form>
                        @endif
                    @endif
                @endfor
            @endfor
        </td>
        <td class="text-center">{{$client->phone}}</td>
        <td class="text-center">
            <form action='{{route('updateСlientData',$client->id)}}'>
            <button class='btn btn-primary'>Редактировать клиента</button>
            </form>
        <td class="text-center">
            <form action='{{route('deleteClient',$client->id)}}'>
            <button class='btn btn-danger'>Удалить клиента</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{--{{$pages['pages']}}--}}
        @for ($i = 1; $i <= $val['pages']; $i++)
            @if ($val['pages']!=1)
                @if ($val['page']==$i)
                    <li class="page-item"><a class="page-link active" href="{{route('AllData',$i)}}">{{$i}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{route('AllData',$i)}}">{{$i}}</a></li>
                @endif
            @endif
        @endfor
    </ul>
</nav>



@endsection
