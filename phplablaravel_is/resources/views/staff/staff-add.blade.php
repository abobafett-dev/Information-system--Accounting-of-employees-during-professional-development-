@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Сотрудники</h1>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        <div class="row">
            <div class="row-content">

                <form method="POST" action="{{route('StaffAddPost')}}">
                    <p>Введите нового сотрудника</p>
                    <label>ФИО сотрудника<input type="text" name="fio"></label>
                    <label>Паспорт сотрудника<input type="text" name="passport"></label>

                    <select class="staff_select" name="fk_position">
                        <option disabled selected>Выберите должность</option>
                        @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                    </select>

                    <select class="staff_select" name="fk_department">
                        <option disabled selected>Выберите отдел</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>

                    <label><input type="submit" value="Ввод"></label>
                    {{ csrf_field() }}
                </form>

                @if(count($errors)>0)
                    <div class="error" style="color:red">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
