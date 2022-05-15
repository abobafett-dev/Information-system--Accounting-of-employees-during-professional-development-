@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Обучающие организации</h1>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        <div class="row">
            <div class="row-content">

                <form method="POST" action="{{route('Training_OrganizationUpdatePost',['training_organization'=>$training_organization->id])}}">
                    <p>Изменение обучающей организации [{{$training_organization->name}}]</p>
                    <label>ИНН обучающей организации<input type="text" name="inn" value="{{$training_organization->inn}}"></label>
                    <label>Наименование обучающей организации<input type="text" name="name" value="{{$training_organization->name}}"></label>
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
