@extends('layouts.allpage')

@section('content')

    <!-- ######################## Header ######################## -->

    <div id="header">

        <h1>Виды обучения</h1>

    </div>

    <!-- ######################## End Header ######################## -->

    <!-- ######################## Content ######################## -->

    <div id="content">

        <div class="row">
            <div class="row-content">

                <form method="POST" action="{{route('TypeAddPost')}}">
                        <p>Введите новый вид обучения</p>
                    <label>Наименование вида обучения<input type="text" name="name"></label>
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
