@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Обучения</h1>

        <div class="add">
            <a href="{{route('TrainingAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($trainings as $training)
            <div class="row">
                <div class="row-content">

                    <p>Вид обучения: <span>{{current(current($types->where('id',$training->fk_type)))->name}}</span></p>
                    <p>Квалификация: <span>{{current(current($qualifications->where('id',$training->fk_qualification)))->name}}</span></p>
                    <p>Обучающие организации: <span>{{current(current($trainingorganizations->where('id',$training->fk_training_organization)))->name}}</span></p>
                    <p>Дата начала обучения: <span><label><input class="input_date_read" type="date" readonly value="{{$training->date_start}}"></label></span></p>
                    <p>Дата окончания обучения: <span><label><input class="input_date_read" type="date" readonly value="{{$training->date_expiration}}"></label></span></p>
                    <p>Цена за час: <span>{{$training->price_per_hour}}</span></p>
                    <p>Длительность в часах: <span>{{$training->duration_in_hours}}</span></p>

                    <div>
                        <form class="form_du" action="{{route('TrainingUpdate',['training'=>$training->id])}}" method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du" action="{{route('TrainingDelete',['training'=>$training->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>

                    @isset($_GET['error_delete'])
                        @if($training->id == $_GET['error_delete'])
                            <p id="error_delete">Ошибка! сначала удалите прохождения обучения связанные с этим элементом</p>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
