<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\Qualification;
use App\Models\Staff;
use App\Models\StaffTraining;
use App\Models\Training;
use App\Models\TrainingOrganization;
use App\Models\Type;
use Illuminate\Http\Request;

//use File;

class IndexController extends Controller
{

    public function index()
    {


        return view('index');
    }

    //region Должности
    public function position()
    {

        $positions = Position::all();

        return view('position.position')->with(['positions' => $positions]);
    }

    public function position_delete(Position $position)
    {


        $prov = Staff::where('fk_position', $position->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('PositionPage', ['error_delete' => $position->id]);
        } else {
            $position->delete();
            return redirect()->route('PositionPage');
        }
        //dump($prov);

    }

    public function position_add()
    {

        return view('position.position-add');
    }

    public function position_add_post(Request $request)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();
        Position::create($data);

        return redirect()->route('PositionPage');
    }

    public function position_update($id)
    {

        $position = Position::all()->find($id);

        return view('position.position-update')->with(['position' => $position]);
    }

    public function position_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();

        Position::where('id', $id)->update(['name' => $data['name']]);

        return redirect()->route('PositionPage');
    }
    //endregion

    //region Отделы
    public function department()
    {

        $departments = Department::all();

        return view('department.department')->with(['departments' => $departments]);
    }

    public function department_delete(Department $department)
    {


        $prov = Staff::where('fk_department', $department->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('DepartmentPage', ['error_delete' => $department->id]);
        } else {
            $department->delete();
            return redirect()->route('DepartmentPage');
        }
        //dump($prov);

    }

    public function department_add()
    {

        return view('department.department-add');
    }

    public function department_add_post(Request $request)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();
        Department::create($data);

        return redirect()->route('DepartmentPage');
    }

    public function department_update($id)
    {

        $department = Department::all()->find($id);

        return view('department.department-update')->with(['department' => $department]);
    }

    public function department_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();

        Department::where('id', $id)->update(['name' => $data['name']]);

        return redirect()->route('DepartmentPage');
    }
    //endregion

    //region Квалификации
    public function qualification()
    {

        $qualifications = Qualification::all();

        return view('qualification.qualification')->with(['qualifications' => $qualifications]);
    }

    public function qualification_delete(Qualification $qualification)
    {


        $prov = Training::where('fk_qualification', $qualification->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('QualificationPage', ['error_delete' => $qualification->id]);
        } else {
            $qualification->delete();
            return redirect()->route('QualificationPage');
        }
        //dump($prov);

    }

    public function qualification_add()
    {

        return view('qualification.qualification-add');
    }

    public function qualification_add_post(Request $request)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();
        Qualification::create($data);

        return redirect()->route('QualificationPage');
    }

    public function qualification_update($id)
    {

        $qualification = Qualification::all()->find($id);

        return view('qualification.qualification-update')->with(['qualification' => $qualification]);
    }

    public function qualification_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();

        Qualification::where('id', $id)->update(['name' => $data['name']]);

        return redirect()->route('QualificationPage');
    }
    //endregion

    //region Виды обучения
    public function type()
    {

        $types = Type::all();

        return view('type.type')->with(['types' => $types]);
    }

    public function type_delete(Type $type)
    {


        $prov = Training::where('fk_type', $type->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('TypePage', ['error_delete' => $type->id]);
        } else {
            $type->delete();
            return redirect()->route('TypePage');
        }
        //dump($prov);

    }

    public function type_add()
    {

        return view('type.type-add');
    }

    public function type_add_post(Request $request)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();
        Type::create($data);

        return redirect()->route('TypePage');
    }

    public function type_update($id)
    {

        $type = Type::all()->find($id);

        return view('type.type-update')->with(['type' => $type]);
    }

    public function type_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();

        Type::where('id', $id)->update(['name' => $data['name']]);

        return redirect()->route('TypePage');
    }
    //endregion

    //region Обучающие организации
    public function training_organization()
    {

        $training_organizations = TrainingOrganization::all();

        return view('training_organization.training_organization')->with(['training_organizations' => $training_organizations]);
    }

    public function training_organization_delete(TrainingOrganization $training_organization)
    {


        $prov = Training::where('fk_training_organization', $training_organization->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('Training_OrganizationPage', ['error_delete' => $training_organization->id]);
        } else {
            $training_organization->delete();
            return redirect()->route('Training_OrganizationPage');
        }
        //dump($prov);

    }

    public function training_organization_add()
    {

        return view('training_organization.training_organization-add');
    }

    public function training_organization_add_post(Request $request)
    {

        $this->validate($request,
            ['inn' => 'required|min:10|max:11',
                'name' => 'required']);

        $data = $request->all();
        TrainingOrganization::create($data);

        return redirect()->route('Training_OrganizationPage');
    }

    public function training_organization_update($id)
    {

        $training_organization = TrainingOrganization::all()->find($id);

        return view('training_organization.training_organization-update')->with(['training_organization' => $training_organization]);
    }

    public function training_organization_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['inn' => 'required|min:10|max:11',
                'name' => 'required']);

        $data = $request->all();

        TrainingOrganization::where('id', $id)->update(['inn' => $data['inn'], 'name' => $data['name']]);

        return redirect()->route('Training_OrganizationPage');
    }
    //endregion

    //region Сотрудники
    public function staff()
    {

        $positions = Position::all();

        $departments = Department::all();

        $staffs = Staff::all();

        return view('staff.staff')->with(['staffs' => $staffs, 'positions' => $positions, 'departments' => $departments]);
    }

    public function staff_delete(Staff $staff)
    {


        $prov = StaffTraining::where('fk_staff', $staff->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('StaffPage', ['error_delete' => $staff->id]);
        } else {
            $staff->delete();
            return redirect()->route('StaffPage');
        }
        //dump($prov);

    }

    public function staff_add()
    {
        $positions = Position::all();
        $departments = Department::all();

        return view('staff.staff-add')->with(['positions' => $positions, 'departments' => $departments]);
    }

    public function staff_add_post(Request $request)
    {

        $this->validate($request,
            ['fk_position' => 'required',
                'fk_department' => 'required',
                'passport' => 'required|unique:staff,passport|size:10',
                'fio' => 'required']);

        $this->validate($request,
            ['fk_position' => 'required',
                'fk_department' => 'required',
                'passport' => 'required|integer',
                'fio' => 'required']);

        $data = $request->all();

        Staff::create($data);

        return redirect()->route('StaffPage');
    }

    public function staff_update($id)
    {
        $positions = Position::all();
        $departments = Department::all();

        $staff = Staff::all()->find($id);

        return view('staff.staff-update')->with(['staff' => $staff, 'positions' => $positions, 'departments' => $departments]);
    }

    public function staff_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['fk_position' => 'required',
                'fk_department' => 'required',
                'passport' => 'required|unique:staff,passport|size:10',
                'fio' => 'required']);

        $this->validate($request,
            ['fk_position' => 'required',
                'fk_department' => 'required',
                'passport' => 'required|integer',
                'fio' => 'required']);

        $data = $request->all();

        Staff::where('id', $id)->update(['fk_position' => $data['fk_position'],
            'fk_department' => $data['fk_department'],
            'passport' => $data['passport'],
            'fio' => $data['fio']]);

        return redirect()->route('StaffPage');
    }
    //endregion

    //region Обучения
    public function training()
    {

        $trainings = Training::all();
        $qualifications = Qualification::all();
        $types = Type::all();
        $trainingorganizations = TrainingOrganization::all();


        return view('training.training')->with(['trainings' => $trainings,
            'trainingorganizations' => $trainingorganizations,
            'qualifications' => $qualifications,
            'types' => $types]);
    }

    public function training_delete(Training $training)
    {


        $prov = StaffTraining::where('fk_training', $training->id)->get()->toArray();

        if (count($prov) > 0) {
            return redirect()->route('TrainingPage', ['error_delete' => $training->id]);
        } else {
            $training->delete();
            return redirect()->route('TrainingPage');
        }
        //dump($prov);

    }

    public function training_add()
    {
        $qualifications = Qualification::all();
        $types = Type::all();
        $trainingorganizations = TrainingOrganization::all();

        return view('training.training-add')->with(['qualifications' => $qualifications,
            'types' => $types,
            'trainingorganizations' => $trainingorganizations]);
    }

    public function training_add_post(Request $request)
    {

        $this->validate($request,
            ['fk_type' => 'required',
                'fk_qualification' => 'required',
                'fk_training_organization' => 'required',
                'date_start' => 'required',
                'date_expiration' => 'required',
                'price_per_hour' => 'nullable|integer|min:1',
                'duration_in_hours' => 'nullable|integer|min:1']);

        $data = $request->all();

        if ($data['date_start'] >= $data['date_expiration']) {
            $error_d = 'Дата начала должна быть меньше даты окончания';
            return redirect()->route('TrainingAdd', ['error_d' => $error_d]);
        } else {

            Training::create(['fk_type' => $data['fk_type'],
                'fk_qualification' => $data['fk_qualification'],
                'fk_training_organization' => $data['fk_training_organization'],
                'date_start' => $data['date_start'],
                'date_expiration' => $data['date_expiration'],
                'price_per_hour' => $data['price_per_hour'],
                'duration_in_hours' => $data['duration_in_hours']]);


            return redirect()->route('TrainingPage');
        }
    }

    public function training_update($id)
    {
        $qualifications = Qualification::all();
        $types = Type::all();
        $trainingorganizations = TrainingOrganization::all();

        $training = Training::all()->find($id);


        return view('training.training-update')->with(['training' => $training,
            'qualifications' => $qualifications,
            'types' => $types,
            'trainingorganizations' => $trainingorganizations]);
    }

    public function training_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['fk_type' => 'required',
                'fk_qualification' => 'required',
                'fk_training_organization' => 'required',
                'date_start' => 'required',
                'date_expiration' => 'required',
                'price_per_hour' => 'nullable|integer|min:1',
                'duration_in_hours' => 'nullable|integer|min:1']);

        $data = $request->all();

        if ($data['date_start'] >= $data['date_expiration']) {
            $error_d = 'Дата начала должна быть меньше даты окончания';
            return redirect()->route('TrainingUpdate', ['error_d' => $error_d]);
        } else {

            Training::where('id', $id)->update(['fk_type' => $data['fk_type'],
                'fk_qualification' => $data['fk_qualification'],
                'fk_training_organization' => $data['fk_training_organization'],
                'date_start' => $data['date_start'],
                'date_expiration' => $data['date_expiration'],
                'price_per_hour' => $data['price_per_hour'],
                'duration_in_hours' => $data['duration_in_hours']]);

            return redirect()->route('TrainingPage');
        }
    }
    //endregion

    //region Сотрудники-Обучение
    public function stafftraining()
    {

        $stafftrainings = StaffTraining::all();
        $staffs = Staff::all('id', 'fio');
        $trainings = Training::all('id', 'fk_qualification', 'date_start', 'date_expiration');
        $qualifications = Qualification::all();

        return view('stafftraining.stafftraining')->with(['stafftrainings' => $stafftrainings,
            'staffs' => $staffs,
            'trainings' => $trainings,
            'qualifications' => $qualifications]);
    }

    public function stafftraining_download(Request $request)
    {

        return response()->download('certificate/' . $request->filename);
    }

    public function stafftraining_delete($stafftraining)
    {

        $stafftraining = explode('_', $stafftraining);

        StaffTraining::where([['fk_training', $stafftraining[0]], ['fk_staff', $stafftraining[1]]])->delete();
        return redirect()->route('StaffTrainingPage');

    }

    public function stafftraining_add()
    {

        $staffs = Staff::all();
        $trainings = Training::all();
        $qualifications = Qualification::all();

        foreach ($trainings as $training) {
            $training->date_start = date('d.m.Y', strtotime($training->date_start));
            $training->date_expiration = date('d.m.Y', strtotime($training->date_expiration));
        }

        return view('stafftraining.stafftraining-add')
            ->with(['staffs' => $staffs, 'trainings' => $trainings, 'qualifications' => $qualifications]);
    }

    public function stafftraining_add_post(Request $request)
    {

        $this->validate($request,
            ['fk_training' => 'required',
                'fk_staff' => 'required',
                'certificate' => 'nullable|file|mimes:pdf']);

        $prov = StaffTraining::where([['fk_training', $request->fk_training], ['fk_staff', $request->fk_staff]])->get();

        if (count($prov) === 0) {
            $data = $request->all();

            if($request->certificate === null) {
                StaffTraining::create(['fk_training' => $data['fk_training'],
                    'fk_staff' => $data['fk_staff']]);
            } else{
                StaffTraining::create(['fk_training' => $data['fk_training'],
                    'fk_staff' => $data['fk_staff'],
                    'certificate' => $request->fk_training . '_' . $request->fk_staff . '.pdf']);

                move_uploaded_file($request->file('certificate')->getPathname(),
                    'certificate/' . $request->fk_training . '_' . $request->fk_staff . '.pdf');
            }

            return redirect()->route('StaffTrainingPage');
        } else {
            return redirect()->route('StaffTrainingAdd', ['error_p' => 'Ошибка! Запись уже существует']);
        }
    }

    public function stafftraining_update($id)
    {

        $staffs = Staff::all();
        $trainings = Training::all();
        $qualifications = Qualification::all();

        $id = explode('_', $id);

        $stafftraining = current(current(StaffTraining::where([['fk_training', $id[0]], ['fk_staff', $id[1]]])->get()));

        return view('stafftraining.stafftraining-update')
            ->with(['stafftraining' => $stafftraining,
                'staffs' => $staffs,
                'trainings' => $trainings,
                'qualifications' => $qualifications]);
    }

    public function stafftraining_update_post(Request $request, $id)
    {

        $this->validate($request,
            ['name' => 'required']);

        $data = $request->all();

        Qualification::where('id', $id)->update(['name' => $data['name']]);

        return redirect()->route('QualificationPage');
    }
    //endregion

    //region Отчеты
    public function otchet()
    {
        return view('otchet.otchet');
    }

    public function otchet_table(Request $request)
    {


        switch ($request->sub) {
            case '№1 кадры':
                if (isset($request->date_start) && isset($request->date_expiration)) {
                    if ($request->date_expiration <= $request->date_start) {
                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub, 'error_date' => 'Дата начала должна быть меньше даты окончания']);
                    } else {
                        $staffs = count(Staff::all()->toArray());
                        $trainings = Training::where([['date_expiration', '<=', $request->date_expiration], ['date_expiration', '>=', $request->date_start]])->get()->toArray();
                        $stafftrainings = [];
                        $stafftrainings_c = [];

                        foreach ($trainings as $training) {
                            $stafftraining = StaffTraining::where('fk_training', $training['id'])->get()->toArray();
                            foreach ($stafftraining as $element) {
                                array_push($stafftrainings_c, $element['fk_staff']);
                                array_push($stafftrainings, $element);
                            }
                        }
                        $stafftrainings_c = count(array_unique($stafftrainings_c));

                        $date_start = date('d.m.Y', strtotime($request->date_start));
                        $date_expiration = date('d.m.Y', strtotime($request->date_expiration));

                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub,
                                'date_start' => $date_start,
                                'date_expiration' => $date_expiration,
                                'staffs' => $staffs,
                                'stafftrainings_c' => $stafftrainings_c]);
                    }
                } else {
                    return view('otchet.otchet')->with(['sub' => $request->sub]);
                }
            case 'Затраты на сотрудников':
                if (isset($request->date_start) && isset($request->date_expiration)) {
                    if ($request->date_expiration <= $request->date_start) {
                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub, 'error_date' => 'Дата начала должна быть меньше даты окончания']);
                    } else {
                        $trainings = Training::where([['date_expiration', '<=', $request->date_expiration], ['date_expiration', '>=', $request->date_start]])->get()->toArray();
                        $staffs = Staff::all()->toArray();

                        foreach ($staffs as $key => $staff) {
                            $staff += array('sum' => 0);
                            $staffs[$key] = $staff;
                        }

                        $sum = 0;

                        foreach ($trainings as $training) {
                            $stafftrainings = StaffTraining::where('fk_training', $training['id'])->get()->toArray();

                            foreach ($stafftrainings as $stafftraining) {
                                foreach ($staffs as $key => $staff) {
                                    if ($stafftraining['fk_staff'] === $staff['id']) {
                                        $staffs[$key]['sum'] += $training['price_per_hour'] * $training['duration_in_hours'];
                                        $sum += $training['price_per_hour'] * $training['duration_in_hours'];
                                        break;
                                    }
                                }
                            }
                        }

                        $staffs += array(count($staffs) => array('fio' => 'Общее', 'sum' => $sum));


                        $date_start = date('d.m.Y', strtotime($request->date_start));
                        $date_expiration = date('d.m.Y', strtotime($request->date_expiration));

                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub,
                                'date_start' => $date_start,
                                'date_expiration' => $date_expiration,
                                'staffs' => $staffs,]);
                    }
                } else {
                    return view('otchet.otchet')->with(['sub' => $request->sub]);
                }
            case 'Сотрудники, не проходившие обучения':
                if (isset($request->date_start) && isset($request->date_expiration)) {
                    if ($request->date_expiration <= $request->date_start) {
                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub, 'error_date' => 'Дата начала должна быть меньше даты окончания']);
                    } else {
                        $trainings = Training::where([['date_expiration', '<=', $request->date_expiration], ['date_expiration', '>=', $request->date_start]])->get()->toArray();
                        $staffs = Staff::all()->toArray();

                        foreach ($trainings as $training) {
                            $stafftrainings = StaffTraining::where('fk_training', $training['id'])->get()->toArray();

                            foreach ($stafftrainings as $stafftraining) {
                                foreach ($staffs as $key => $staff) {
                                    if ($stafftraining['fk_staff'] === $staff['id']) {
                                        $staffs[$key] += array('prov' => 0);
                                        break;
                                    }
                                }
                            }
                        }

                        foreach ($staffs as $key => $staff) {
                            if (isset($staff['prov'])) {
                                unset($staffs[$key]);
                            }
                        }


                        $date_start = date('d.m.Y', strtotime($request->date_start));
                        $date_expiration = date('d.m.Y', strtotime($request->date_expiration));

                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub,
                                'date_start' => $date_start,
                                'date_expiration' => $date_expiration,
                                'staffs' => $staffs]);
                    }
                } else {
                    return view('otchet.otchet')->with(['sub' => $request->sub]);
                }
            case 'Возможные обучения':
                if (isset($request->date_start) && isset($request->date_expiration)) {
                    if ($request->date_expiration <= $request->date_start) {
                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub, 'error_date' => 'Дата начала должна быть меньше даты окончания']);
                    } else {
                        $trainings = Training::where([['date_start', '<=', $request->date_expiration], ['date_start', '>=', $request->date_start]])->get()->toArray();
                        $qualifications = Qualification::all()->toArray();

                        foreach ($trainings as $key => $training) {
                            $trainings[$key] += array('sum' => $training['price_per_hour'] * $training['duration_in_hours']);
                            $trainings[$key]['date_start'] = date('d.m.Y', strtotime($training['date_start']));
                            $trainings[$key]['date_expiration'] = date('d.m.Y', strtotime($training['date_expiration']));
                        }

                        $date_start = date('d.m.Y', strtotime($request->date_start));
                        $date_expiration = date('d.m.Y', strtotime($request->date_expiration));

                        return view('otchet.otchet')
                            ->with(['sub' => $request->sub,
                                'date_start' => $date_start,
                                'date_expiration' => $date_expiration,
                                'trainings' => $trainings,
                                'qualifications' => $qualifications]);
                    }
                } else {
                    return view('otchet.otchet')->with(['sub' => $request->sub]);
                }
            case 'О сотруднике':

                $staffs = Staff::all();
                $qualifications = Qualification::all();

                if (isset($request->staff)) {

                    $staff = Staff::all()->find($request->staff)->toArray();
                    $staff['fk_position'] = Position::all()->find($staff['fk_position'])->name;
                    $staff['fk_department'] = Department::all()->find($staff['fk_department'])->name;

                    $stafftrainings = StaffTraining::where('fk_staff',$request->staff)->get()->toArray();

                    $trainings = [];

                    foreach($stafftrainings as $stafftraining){
                        $trainings += array(count($trainings)=>Training::all()->find($stafftraining['fk_training'])->toArray());
                    }

                    return view('otchet.otchet')
                        ->with(['sub' => $request->sub,
                            'staffs' => $staffs,
                            'cur_staff' => $staff,
                            'trainings'=>$trainings,
                            'qualifications'=>$qualifications]);

                } else {
                    return view('otchet.otchet')->with(['sub' => $request->sub, 'staffs' => $staffs]);
                }
            default:
                break;
        }
    }
    //endregion
}
