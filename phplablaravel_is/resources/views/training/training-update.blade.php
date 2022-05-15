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

                <form method="POST" action="{{route('TrainingUpdatePost',['training'=>$training->id])}}">
                    <p>Введите данные нового обучения</p>
                    <label>Дата начала обучения<input type="date" name="date_start" value="{{$training->date_start}}"></label>
                    <label>Дата окончания обучения<input type="date" name="date_expiration" value="{{$training->date_expiration}}"></label>
                    <label>Цена за час<input type="text" name="price_per_hour" value="{{$training->price_per_hour}}"></label>
                    <label>Длительность в часах<input type="text" name="duration_in_hours" value="{{$training->duration_in_hours}}"></label>

                    <select class="training_select" name="fk_type">
                        <option disabled selected>Выберите вид обучения</option>
                        @foreach($types as $type)
                            @if($type->id === $training->fk_type)
                                <option selected value="{{$type->id}}">{{$type->name}}</option>
                            @else
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endif
                        @endforeach
                    </select>

                    <select class="training_select" name="fk_qualification">
                        <option disabled selected>Выберите квалификацию</option>
                        @foreach($qualifications as $qualification)
                            @if($qualification->id === $training->fk_qualification)
                                <option selected value="{{$qualification->id}}">{{$qualification->name}}</option>
                            @else
                            <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                            @endif
                        @endforeach
                    </select>

                    <select class="training_select" name="fk_training_organization">
                        <option disabled selected>Выберите обучающую организацию</option>
                        @foreach($trainingorganizations as $trainingorganization)
                            @if($trainingorganization->id === $training->fk_training_organization)
                                <option selected value="{{$trainingorganization->id}}">{{$trainingorganization->name}}</option>
                            @else
                            <option value="{{$trainingorganization->id}}">{{$trainingorganization->name}}</option>
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

                @isset($_GET['error_d'])
                    <div class="error" style="color:red">
                        <ul>
                            <li>{{$_GET['error_d']}}</li>
                        </ul>
                    </div>
                @endisset

            </div>
        </div>

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
