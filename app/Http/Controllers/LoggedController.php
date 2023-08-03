<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class LoggedController extends Controller
{

    public function show($id) {

        $project = Project :: findOrFail($id);

        return view('show', compact('project'));
    }

    public function create() {

        $types = Type :: all();
        $technologies = Technology :: all();

        return view('create', compact('types', 'technologies'));
    }

    public function store(Request $request) {

        $data = $request -> all();
        
        $img_path = Storage :: put('uploads', $data['picture']);
        $data['picture'] = $img_path;

        $project = Project :: create($data);
        $project -> technologies() -> attach($data['technologies']);

        return redirect() -> route('project.show', $project -> id);
    }
}