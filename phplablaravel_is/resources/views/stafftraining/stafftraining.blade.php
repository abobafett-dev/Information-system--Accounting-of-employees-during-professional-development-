@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Прохождение обучения</h1>

        <div class="add">
            <a href="{{route('StaffTrainingAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($stafftrainings as $stafftraining)
            <div class="row">
                <div class="row-content">

                    @foreach($staffs as $staff)
                        @if($staff->id === $stafftraining->fk_staff)
                            <p>ФИО: <span>{{$staff->fio}}</span></p>
                            @break
                        @endif
                    @endforeach

                    @foreach($trainings as $training)
                        @if($training->id === $stafftraining->fk_training)

                            @foreach($qualifications as $qualification)
                                @if($training->fk_qualification === $qualification->id)
                                    <p>Квалификация: <span>{{$qualification->name}}</span></p>
                                    @break
                                @endif
                            @endforeach

                            <p>Дата начала обучения: <span><label><input class="input_date_read" type="date" readonly
                                                                         value="{{$training->date_start}}"></label></span>
                            </p>
                            <p>Дата окончания обучения: <span><label><input class="input_date_read" type="date" readonly
                                                                            value="{{$training->date_expiration}}"></label></span>
                            </p>

                            @break
                        @endif
                    @endforeach

                    @if($stafftraining->certificate !== null)
                        <form method="GET" action="{{route('StaffTrainingDownload')}}">
                            <input type="hidden" name="filename" value="{{$stafftraining->certificate}}">
                            <input type="submit" value="Скачать сертификат">
                            {{csrf_field()}}
                        </form>
                    @endif

                    <div>
                        <form class="form_du"
                              action="{{route('StaffTrainingUpdate',['stafftraining'=>$stafftraining->fk_training .'_'.$stafftraining->fk_staff])}}"
                              method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du"
                              action="{{route('StaffTrainingDelete',['stafftraining'=>$stafftraining->fk_training .'_'.$stafftraining->fk_staff])}}"
                              method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
