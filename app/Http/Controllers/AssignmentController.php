<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentGrade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function Assignment(Request $request)
    {
        $user=User::query()->find(Auth::user()->id);
        if($user->type == 'teacher')
        {
            return response()->json(['message'=>'you can not access']);
        }
        else {
            $grade_id = StudentGrade::query()->select('grades.id')
                ->join('grades', 'grades.id', '=', 'student_grades.grade_id')
                ->where('student_id', '=', Auth::user()->id)
                ->first();

            $assignments = Assignment::query()->select('subjects.Name', 'assignments.name', 'users.first_name',
                'users.last_name', 'assignments.date', 'assignments.description')
                ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                ->join('users', 'users.id', '=', 'assignments.teacher_id')
                ->where('grade_id', '=', $grade_id->id)
                ->get();
            if (!$assignments->isEmpty()) {
                foreach ($assignments as $assignment) {

                    $response =
                        [
                            'Subject_Name' => $assignment['Name'],
                            'Teacher_Name' => $assignment['first_name'] . ' ' . $assignment['last_name'],
                            'Assignment_Name' => $assignment['name'],
                            'Date' => $assignment['date'],
                            'Description' => $assignment['description'],
                        ];
                    $array[] = $response;
                }
                return $array;
            }
            else{
                return response()->json(['message'=>'there is no assignment']);
            }
        }
    }
}
