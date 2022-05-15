@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Отчеты</h1>


    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        <div class="row">
            <div class="row-content">

                <form method="GET" action="{{route('OtchetTablePage')}}">
                    <p><span><input type="submit" name="sub" value="№1 кадры"></span>
                        <span><input type="submit" name="sub" value="Затраты на сотрудников"></span>
                        <span><input type="submit" name="sub" value="Сотрудники, не проходившие обучения"></span>
                        <span><input type="submit" name="sub" value="Возможные обучения"></span>
                        <span><input type="submit" name="sub" value="О сотруднике"></span></p>
                    {{csrf_field()}}
                </form>

                @isset($sub)
                    @switch($sub)
                        @case('№1 кадры')

                        <form method="GET" action="{{route('OtchetTablePage')}}">
                            <p><span>{{$sub}}</span></p>
                            <p><span>Укажите период</span></p>
                            <p><span><label>Дата начала: <input type="date" name="date_start"></label></span>
                                <span><label>Дата окончания: <input type="date" name="date_expiration"></label></span>
                            </p>
                            <p><span><input type="submit" value="Ввод"></span></p>
                            <input name="sub" type="hidden" value="{{$sub}}">
                            {{csrf_field()}}
                        </form>

                        @if(isset($date_start) && isset($date_expiration))
                        <p class="ptableotchet">Период: [{{$date_start}}-{{$date_expiration}}]</p>
                            <table>
                                <caption>№1 кадры</caption>
                                <tr>
                                    <th>Наименование показателя</th>
                                    <th>Количество работников</th>
                                </tr>
                                <tr>
                                    <th>Численность работников</th>
                                    <td>{{$staffs}}</td>
                                </tr>
                                <tr>
                                    <th>Прошли обучение</th>
                                    <td>{{$stafftrainings_c}}</td>
                                </tr>
                            </table>
                        @endif

                        @isset($error_date)
                            <p id="error_delete">{{$error_date}}</p>
                        @endisset

                        @break

                        @case('Затраты на сотрудников')

                        <form method="GET" action="{{route('OtchetTablePage')}}">
                            <p><span>{{$sub}}</span></p>
                            <p><span>Укажите период</span></p>
                            <p><span><label>Дата начала: <input type="date" name="date_start"></label></span>
                                <span><label>Дата окончания: <input type="date" name="date_expiration"></label></span>
                            </p>
                            <p><span><input type="submit" value="Ввод"></span></p>
                            <input name="sub" type="hidden" value="{{$sub}}">
                            {{csrf_field()}}
                        </form>

                        @if(isset($date_start) && isset($date_expiration))
                        <p class="ptableotchet">Период: [{{$date_start}}-{{$date_expiration}}]</p>
                            <table>
                                <caption>Затраты на сотрудников</caption>
                                <tr>
                                    <th>ФИО сотрудника</th>
                                    <th>Затраты</th>
                                </tr>
                                @foreach($staffs as $staff)
                                    <tr>
                                        <td>{{$staff['fio']}}</td>
                                        <td>{{$staff['sum']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

                        @isset($error_date)
                            <p id="error_delete">{{$error_date}}</p>
                        @endisset

                        @break

                        @case('Сотрудники, не проходившие обучения')

                        <form method="GET" action="{{route('OtchetTablePage')}}">
                            <p><span>{{$sub}}</span></p>
                            <p><span>Укажите период</span></p>
                            <p><span><label>Дата начала: <input type="date" name="date_start"></label></span>
                                <span><label>Дата окончания: <input type="date" name="date_expiration"></label></span>
                            </p>
                            <p><span><input type="submit" value="Ввод"></span></p>
                            <input name="sub" type="hidden" value="{{$sub}}">
                            {{csrf_field()}}
                        </form>

                        @if(isset($date_start) && isset($date_expiration))
                        <p class="ptableotchet">Период: [{{$date_start}}-{{$date_expiration}}]</p>
                            <table>
                                <caption>Сотрудники, не проходившие обучения</caption>
                                <tr>
                                    <th>ФИО сотрудника</th>
                                </tr>
                                @foreach($staffs as $staff)
                                    <tr>
                                        <td>{{$staff['fio']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

                        @isset($error_date)
                            <p id="error_delete">{{$error_date}}</p>
                        @endisset

                        @break

                        @case('Возможные обучения')

                        <form method="GET" action="{{route('OtchetTablePage')}}">
                            <p><span>{{$sub}}</span></p>
                            <p><span>Укажите период</span></p>
                            <p><span><label>Дата начала: <input type="date" name="date_start"></label></span>
                                <span><label>Дата окончания: <input type="date" name="date_expiration"></label></span>
                            </p>
                            <p><span><input type="submit" value="Ввод"></span></p>
                            <input name="sub" type="hidden" value="{{$sub}}">
                            {{csrf_field()}}
                        </form>

                        @if(isset($date_start) && isset($date_expiration))
                        <p class="ptableotchet">Период: [{{$date_start}}-{{$date_expiration}}]</p>
                            <table>
                                <caption>Возможные обучения</caption>
                                <tr>
                                    <th>Квалификация</th>
                                    <th>Дата начала</th>
                                    <th>Дата окончания</th>
                                    <th>Стоимость</th>
                                </tr>
                                @foreach($trainings as $training)
                                    <tr>
                                        @foreach($qualifications as $qualification)
                                            @if($qualification['id'] === $training['fk_qualification'])
                                                <td>{{$qualification['name']}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        <td>{{$training['date_start']}}</td>
                                        <td>{{$training['date_expiration']}}</td>
                                        <td>{{$training['sum']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

                        @isset($error_date)
                            <p id="error_delete">{{$error_date}}</p>
                        @endisset

                        @break

                        @case('О сотруднике')

                        <form method="GET" action="{{route('OtchetTablePage')}}">
                            <p><span>{{$sub}}</span></p>

                            <select name="staff">
                                <option selected disabled>Выберите сотрудника</option>

                                @foreach($staffs as $staff)
                                    <option value="{{$staff->id}}">{{$staff->fio}} | {{$staff->passport}}</option>
                                @endforeach

                            </select>

                            <p><span><input type="submit" value="Ввод"></span></p>
                            <input name="sub" type="hidden" value="{{$sub}}">
                            {{csrf_field()}}
                        </form>

                        @if(isset($cur_staff))
                        <p class="ptableotchet">О сотруднике</p>

                            <p>ФИО: <span>{{$cur_staff['fio']}}</span></p>
                            <p>Отдел: <span>{{$cur_staff['fk_department']}}</span></p>
                            <p>Должность: <span>{{$cur_staff['fk_position']}}</span></p>

                            @if(count($trainings))
                            <table>
                                <caption>Квалификации сотрудника</caption>
                                <tr>
                                    <th>Наименование</th>
                                </tr>
                                @foreach($trainings as $training)
                                    <tr>
                                        @foreach($qualifications as $qualification)
                                            @if($qualification['id'] === $training['fk_qualification'])
                                                <td>{{$qualification['name']}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                            @endif
                        @endif

                        @isset($error_date)
                            <p id="error_delete">{{$error_date}}</p>
                        @endisset

                        @break
                    @endswitch
                @endisset

            </div>
        </div>

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
