<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;




class UserController extends Controller
{
    // public function attachedDepartment($id) {
    //     $departaments=
    // }
    //
    public function allstuff()
    {
        // dd("am intrat aici");
        $users = User::all();
        //dd($users);
        return response()->json(["users" => $users]);
    }
    public function getData(Request $request)
    {
        $users = User::query();

        // Filtrarea după department_id
        if ($request->has('department_id') && $request->department_id != -1) {
            $users->where('department_id', $request->department_id);
        }

        return DataTables::of($users)
            ->addColumn('actions', function ($user) {
                $statusIcon = '';
                // Verificăm statusul utilizatorului și adăugăm iconițele corespunzătoare
                if ($user->status == 1) {
                    $statusIcon .= '<i class="fa-solid fa-user-check editButton" type="button" data-user_id="' . $user->id . '"></i>';
                } else {
                    $statusIcon .= '<i class="fa fa-user-slash editButton" type="button" data-user_id="' . $user->id . '"></i>';
                }

                return '
                <i class="fa fa-building assignDepartment" type="button" data-user_id="' . $user->id . '"></i>
                ' . $statusIcon . '
                <i class="fa fa-trash deleteUser" type="button" data-user_id="' . $user->id . '"></i>
                <i class="fa-solid fa-universal-access accessButton" type="button" data-user_id="' . $user->id . '"></i>
            ';
            })
            ->addColumn('nameDepartment', function ($user) {
                return $user->department ? $user->department->name : 'N/A';
            })
            ->rawColumns(['actions']) // Pentru a permite HTML în coloana de acțiuni
            ->make(true);
    }
    public function update($id)
    {
        $user = User::findOrFail($id);
        // dd($user->status);
        //validate
        if ($user->status == 1) {
            $user->update([
                'status' => 0,
            ]);
        } else {
            $user->update([
                'status' => 1,
            ]);
        }
        return redirect('/tables');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //dd("am intrat");
        $user->delete();
        return redirect('/tables');
    }
    public function departmentChange($id, $departament_id)
    {
        $user = User::findOrFail($id);

        $departament = Department::findOrFail($departament_id);
        $user->update(['department_id' => $departament_id]);
        return redirect('/tables');
    }
}
