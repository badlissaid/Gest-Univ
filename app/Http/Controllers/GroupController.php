<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\groupstud;
use App\Models\student;
use Illuminate\Http\Request;

class GroupController extends Controller
    {
        public function index() {
        return Group::with('groupstud')->get();
    }

    public function show($id)
    {
        return group::with('groupstud')->findOrFail($id);
    }
    public function store(Request $request)
    {
        $member = groupstud::create([
            'group_id' => $request->id,
            'student_id' => $request->student_id,
            ]);
        return response()->json($member, 201);
    }

}
