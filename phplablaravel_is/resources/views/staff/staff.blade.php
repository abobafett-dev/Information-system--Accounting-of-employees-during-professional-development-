@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Сотрудники</h1>

        <div class="add">
            <a href="{{route('StaffAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($staffs as $staff)
            <div class="row">
                <div class="row-content">


                    @foreach($departments as $department)
                        @if($department->id = $staff->fk_department)
                    <p>Отдел: <span>{{$department->name}}</span></p>
                    @break
                    @else
                        @continue
                    @endif
                    @endforeach


                    @foreach($positions as $position)
                        @if($position->id = $staff->fk_position)
                    <p>Должность: <span>{{$position->name}}</span></p>
                            @break
                        @else
                            @continue
                        @endif
                    @endforeach


                    <p>Паспорт: <span>{{$staff->passport}}</span></p>
                    <p>ФИО: <span>{{$staff->fio}}</span></p>

                    <div>
                        <form class="form_du" action="{{route('StaffUpdate',['staff'=>$staff->id])}}" method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du" action="{{route('StaffDelete',['staff'=>$staff->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>

                    @isset($_GET['error_delete'])
                        @if($staff->id == $_GET['error_delete'])
                            <p id="error_delete">Ошибка! сначала удалите обучения связанных с этим элементом</p>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
