@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Прохождение обучения</h1>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        <div class="row">
            <div class="row-content">

                <form method="POST" enctype="multipart/form-data" action="{{route('StaffTrainingAddPost')}}">
                    <p>Введите новое прохождение обучения</p>


                    <select class="staff_select" name="fk_staff">
                        <option selected disabled>Выберите сотрудника</option>

                        @foreach($staffs as $staff)
                            <option value="{{$staff->id}}">{{$staff->fio}} | {{$staff->passport}}</option>
                        @endforeach
                    </select>

                    <select class="staff_select" name="fk_training">
                        <option selected disabled>Выберите обучение</option>

                        @foreach($trainings as $training)
                            <option value="{{$training->id}}">
                                @foreach($qualifications as $qualification)
                                    @if($qualification->id === $training->fk_qualification)
                                        {{$qualification->name}} |
                                    @endif
                                @endforeach

                                {{$training->date_start}}-{{$training->date_expiration}}</option>
                        @endforeach
                    </select>

                    <label>Выберите сертификат формата [ *.pdf]<input name="certificate" type="file"></label>


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

                @isset($_GET['error_p'])
                    <div class="error" style="color:red">
                        <ul>
                            <li>{{$_GET['error_p']}}</li>
                        </ul>
                    </div>
                @endisset

            </div>
        </div>

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
