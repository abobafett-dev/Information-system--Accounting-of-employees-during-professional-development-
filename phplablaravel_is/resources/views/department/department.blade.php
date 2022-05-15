@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Отделы</h1>

        <div class="add">
            <a href="{{route('DepartmentAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($departments as $department)
            <div class="row">
                <div class="row-content">
                    <p>Наименование: <span>{{$department->name}}</span></p>

                    <div>
                        <form class="form_du" action="{{route('DepartmentUpdate',['department'=>$department->id])}}" method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du" action="{{route('DepartmentDelete',['department'=>$department->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>

                    @isset($_GET['error_delete'])
                        @if($department->id == $_GET['error_delete'])
                            <p id="error_delete">Ошибка! сначала удалите сотрудников связанных с этим элементом</p>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
