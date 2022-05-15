<!DOCTYPE html>

<head>

    <meta charset="utf-8"/>

    <title>Учет сотрудников при повышении квалификации</title>

    <!-- Included CSS Files (Compressed) -->
    <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">

</head>

<body>

<!-- ######################## Menu ######################## -->

<div id="menu">

    <ul>

        <li><a href="{{route('MainPage')}}">Главная</a></li>
        <li><a href="{{route('PositionPage')}}">Должности</a></li>
        <li><a href="{{route('DepartmentPage')}}">Отделы</a></li>
        <li><a href="{{route('QualificationPage')}}">Квалификации</a></li>
        <li><a href="{{route('TypePage')}}">Виды обучения</a></li>
        <li><a href="{{route('Training_OrganizationPage')}}">Обучающие организации</a></li>
        <li><a href="{{route('StaffPage')}}">Сотрудники</a></li>
        <li><a href="{{route('TrainingPage')}}">Обучения</a></li>
        <li><a href="{{route('StaffTrainingPage')}}">Прохождение обучения</a></li>
        <li><a href="{{route('OtchetPage')}}">Отчеты</a></li>

    </ul>

</div>

<!-- END main menu -->

@yield('content')

<!-- ######################## Footer ######################## -->

<div id="footer">
    <p></p>
</div>

<!-- ######################## End Footer ######################## -->

<!-- ######################## Scripts ######################## -->

{{--<script src="{{asset('javascripts/app.js')}}" type="text/javascript"></script>--}}

</body>
</html>

