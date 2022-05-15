@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Должности</h1>

        <div class="add">
            <a href="{{route('PositionAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($positions as $position)
            <div class="row">
                <div class="row-content">
                    <p>Наименование: <span>{{$position->name}}</span></p>

                    <div>
                        <form class="form_du" action="{{route('PositionUpdate',['position'=>$position->id])}}" method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du" action="{{route('PositionDelete',['position'=>$position->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>

                    @isset($_GET['error_delete'])
                        @if($position->id == $_GET['error_delete'])
                            <p id="error_delete">Ошибка! сначала удалите сотрудников связанных с этим элементом</p>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
