@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Виды обучения</h1>

        <div class="add">
            <a href="{{route('TypeAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($types as $type)
            <div class="row">
                <div class="row-content">
                    <p>Наименование: <span>{{$type->name}}</span></p>

                    <div>
                        <form class="form_du" action="{{route('TypeUpdate',['type'=>$type->id])}}" method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du" action="{{route('TypeDelete',['type'=>$type->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>

                    @isset($_GET['error_delete'])
                        @if($type->id == $_GET['error_delete'])
                            <p id="error_delete">Ошибка! сначала удалите обучения связанных с этим элементом</p>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
