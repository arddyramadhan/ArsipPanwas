<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('user.index', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->template_id);
        // $data = request()->validate();
        $request->validate([
             'name' => 'required',
             'description' => 'required',
             'template_id' => 'required',
        ]);
        User::create([
            'name' => ucwords($request->name),
            'description' => $request->description,
            'template_id' => $request->template_id,
        ]);
        return back();
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back();
    }

    public function delete(User $user)
    {
        $user->delete();
        return back();
    }

    public function show(User $user)
    {
        return view('template.show', compact('template'));
    }
}
