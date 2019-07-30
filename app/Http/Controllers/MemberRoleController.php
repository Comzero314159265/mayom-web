<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MemberRole;
use Illuminate\Http\Request;

class MemberRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $memberrole = MemberRole::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $memberrole = MemberRole::latest()->paginate($perPage);
        }

        return view('member-role.index', compact('memberrole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('member-role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        MemberRole::create($requestData);

        return redirect('member-role')->with('flash_message', 'MemberRole added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $memberrole = MemberRole::findOrFail($id);

        return view('member-role.show', compact('memberrole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $memberrole = MemberRole::findOrFail($id);

        return view('member-role.edit', compact('memberrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        $memberrole = MemberRole::findOrFail($id);
        $memberrole->update($requestData);

        return redirect('member-role')->with('flash_message', 'MemberRole updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MemberRole::destroy($id);

        return redirect('member-role')->with('flash_message', 'MemberRole deleted!');
    }
}
