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

                <form method="POST" action="{{route('StaffUpdatePost',['staff'=>$staff->id])}}">
                    <p>Введите данные сотрудника [{{$staff->fio}}]</p>
                    <label>ФИО сотрудника<input type="text" name="fio" value="{{$staff->fio}}"></label>
                    <label>Паспорт сотрудника<input type="text" name="passport" value="{{$staff->passport}}"></label>

                    <select class="staff_select" name="fk_position">
                        <option disabled>Выберите должность</option>
                        @foreach($positions as $position)
                            @if($position->id == $staff->fk_position)
                                <option selected value="{{$position->id}}">{{$position->name}}</option>
                            @else
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endif
                        @endforeach
                    </select>

                    <select class="staff_select" name="fk_department">
                        <option disabled selected>Выберите отдел</option>
                        @foreach($departments as $department)
                            @if($department->id == $staff->fk_department)
                                <option selected value="{{$department->id}}">{{$department->name}}</option>
                            @else
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endif
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
