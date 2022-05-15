<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/main', [IndexController::class, 'index'])
    ->name('MainPage');


//region Должности
{ //Должности
    Route::get('/position', [IndexController::class, 'position'])
        ->name('PositionPage');

    Route::delete('/position/delete/{position}', [IndexController::class, 'position_delete'])
        ->name('PositionDelete');

    Route::get('/position/add', [IndexController::class, 'position_add'])
        ->name('PositionAdd');

    Route::post('/position/add', [IndexController::class, 'position_add_post'])
        ->name('PositionAddPost');

    Route::get('/position/update/{position}',[IndexController::class, 'position_update'])
        ->name('PositionUpdate');

    Route::post('/position/update/{position}',[IndexController::class, 'position_update_post'])
        ->name('PositionUpdatePost');
}
//endregion

//region Отделы
{ //Отделы
    Route::get('/department', [IndexController::class, 'department'])
        ->name('DepartmentPage');

    Route::delete('/department/delete/{department}', [IndexController::class, 'department_delete'])
        ->name('DepartmentDelete');

    Route::get('/department/add', [IndexController::class, 'department_add'])
        ->name('DepartmentAdd');

    Route::post('/department/add', [IndexController::class, 'department_add_post'])
        ->name('DepartmentAddPost');

    Route::get('/department/update/{department}',[IndexController::class, 'department_update'])
        ->name('DepartmentUpdate');

    Route::post('/department/update/{department}',[IndexController::class, 'department_update_post'])
        ->name('DepartmentUpdatePost');
}
//endregion

//region Квалификации
{ //Квалификации
    Route::get('/qualification', [IndexController::class, 'qualification'])
        ->name('QualificationPage');

    Route::delete('/qualification/delete/{qualification}', [IndexController::class, 'qualification_delete'])
        ->name('QualificationDelete');

    Route::get('/qualification/add', [IndexController::class, 'qualification_add'])
        ->name('QualificationAdd');

    Route::post('/qualification/add', [IndexController::class, 'qualification_add_post'])
        ->name('QualificationAddPost');

    Route::get('/qualification/update/{qualification}',[IndexController::class, 'qualification_update'])
        ->name('QualificationUpdate');

    Route::post('/qualification/update/{qualification}',[IndexController::class, 'qualification_update_post'])
        ->name('QualificationUpdatePost');
}
//endregion

//region Виды обучения
{ //Виды обучения
    Route::get('/type', [IndexController::class, 'type'])
        ->name('TypePage');

    Route::delete('/type/delete/{type}', [IndexController::class, 'type_delete'])
        ->name('TypeDelete');

    Route::get('/type/add', [IndexController::class, 'type_add'])
        ->name('TypeAdd');

    Route::post('/type/add', [IndexController::class, 'type_add_post'])
        ->name('TypeAddPost');

    Route::get('/type/update/{type}',[IndexController::class, 'type_update'])
        ->name('TypeUpdate');

    Route::post('/type/update/{type}',[IndexController::class, 'type_update_post'])
        ->name('TypeUpdatePost');
}
//endregion

//region Обучающие организации
{ //Обучающие организации
    Route::get('/training_organization', [IndexController::class, 'training_organization'])
        ->name('Training_OrganizationPage');

    Route::delete('/training_organization/delete/{training_organization}', [IndexController::class, 'training_organization_delete'])
        ->name('Training_OrganizationDelete');

    Route::get('/training_organization/add', [IndexController::class, 'training_organization_add'])
        ->name('Training_OrganizationAdd');

    Route::post('/training_organization/add', [IndexController::class, 'training_organization_add_post'])
        ->name('Training_OrganizationAddPost');

    Route::get('/training_organization/update/{training_organization}',[IndexController::class, 'training_organization_update'])
        ->name('Training_OrganizationUpdate');

    Route::post('/training_organization/update/{training_organization}',[IndexController::class, 'training_organization_update_post'])
        ->name('Training_OrganizationUpdatePost');
}
//endregion

//region Сотрудники
{ //Сотрудники
    Route::get('/staff', [IndexController::class, 'staff'])
        ->name('StaffPage');

    Route::delete('/staff/delete/{staff}', [IndexController::class, 'staff_delete'])
        ->name('StaffDelete');

    Route::get('/staff/add', [IndexController::class, 'staff_add'])
        ->name('StaffAdd');

    Route::post('/staff/add', [IndexController::class, 'staff_add_post'])
        ->name('StaffAddPost');

    Route::get('/staff/update/{staff}',[IndexController::class, 'staff_update'])
        ->name('StaffUpdate');

    Route::post('/staff/update/{staff}',[IndexController::class, 'staff_update_post'])
        ->name('StaffUpdatePost');
}
//endregion

//region Обучения
{ //Обучения
    Route::get('/training', [IndexController::class, 'training'])
        ->name('TrainingPage');

    Route::delete('/training/delete/{training}', [IndexController::class, 'training_delete'])
        ->name('TrainingDelete');

    Route::get('/training/add', [IndexController::class, 'training_add'])
        ->name('TrainingAdd');

    Route::post('/training/add', [IndexController::class, 'training_add_post'])
        ->name('TrainingAddPost');

    Route::get('/training/update/{training}',[IndexController::class, 'training_update'])
        ->name('TrainingUpdate');

    Route::post('/training/update/{training}',[IndexController::class, 'training_update_post'])
        ->name('TrainingUpdatePost');
}
//endregion

//region Сотрудники-Обучение
{ //Сотрудники-Обучение
    Route::get('/stafftraining', [IndexController::class, 'stafftraining'])
        ->name('StaffTrainingPage');

    Route::get('/stafftraining/download',[IndexController::class, 'stafftraining_download'])
        ->name('StaffTrainingDownload');

    Route::delete('/stafftraining/delete/{stafftraining}', [IndexController::class, 'stafftraining_delete'])
        ->name('StaffTrainingDelete');

    Route::get('/stafftraining/add', [IndexController::class, 'stafftraining_add'])
        ->name('StaffTrainingAdd');

    Route::post('/stafftraining/add', [IndexController::class, 'stafftraining_add_post'])
        ->name('StaffTrainingAddPost');

    Route::get('/stafftraining/update/{stafftraining}',[IndexController::class, 'stafftraining_update'])
        ->name('StaffTrainingUpdate');

    Route::post('/stafftraining/update/{stafftraining}',[IndexController::class, 'stafftraining_update_post'])
        ->name('StaffTrainingUpdatePost');
}
//endregion

//region Отчеты
{ //Отчеты
    Route::get('/otchet', [IndexController::class, 'otchet'])
        ->name('OtchetPage');

    Route::get('/otchettable', [IndexController::class, 'otchet_table'])
        ->name('OtchetTablePage');

}
//endregion
