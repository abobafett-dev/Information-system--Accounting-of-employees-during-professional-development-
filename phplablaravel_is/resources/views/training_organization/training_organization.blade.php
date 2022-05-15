@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Обучающие организации</h1>

        <div class="add">
            <a href="{{route('Training_OrganizationAdd')}}">Добавить</a>
        </div>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        @foreach($training_organizations as $training_organization)
            <div class="row">
                <div class="row-content">
                    <p>ИНН: <span>{{$training_organization->inn}}</span></p>
                    <p>Наименование: <span>{{$training_organization->name}}</span></p>

                    <div>
                        <form class="form_du" action="{{route('Training_OrganizationUpdate',['training_organization'=>$training_organization->id])}}" method="GET">
                            <input class="input_update" type="submit" value="Изменить">
                            {{csrf_field()}}
                        </form>

                        <form class="form_du" action="{{route('Training_OrganizationDelete',['training_organization'=>$training_organization->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="input_delete" type="submit" value="Удалить">
                            {{csrf_field()}}
                        </form>
                    </div>

                    @isset($_GET['error_delete'])
                        @if($training_organization->id == $_GET['error_delete'])
                            <p id="error_delete">Ошибка! сначала удалите обучения связанных с этим элементом</p>
                        @endif
                    @endisset
                </div>
            </div>
        @endforeach

    </div>

    <!-- ######################## End Content ######################## -->

@endsection
