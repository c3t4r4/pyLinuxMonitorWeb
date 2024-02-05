<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $groups = Group::permitedAll()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'ilike', "%{$search}%")
                    ->orWhere('observation', 'ilike', "%{$search}%")
                    ->orWhere('created_at', 'ilike', "%{$search}%");
            })
            ->orderBy("name", "asc")
            ->paginate(50)
            ->withQueryString();

        return Inertia::render('Groups/index', [
            "groups" => $groups,
            "filters" => $request->only(['search'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Groups/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupStoreRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $group = new Group();
        $group->fill($request->all());

        $group->user_id = $user->id;

        if (!$group->save()) {
            return redirect()
                ->route('groups.index')
                ->withInput()
                ->with("message", [
                    "type" => "danger",
                    "title" => "Erro",
                    "msg" => "Registro não criado!"
                ]);
        }

        return redirect()->route('groups.index')->with("message", [
            "type" => "success",
            "title" => "Sucesso",
            "msg" => "Registro criado com Sucesso!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = Group::permitedAll()->whereId($id)->first();

        if(!empty($group)){
            return Inertia::render('Groups/show', [
                'group' => $group,
            ]);
        }

        return redirect()->route('groups.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Group::permitedAll()->whereId($id)->first();

        if(!empty($group)){
            return Inertia::render('Groups/edit', [
                'group' => $group,
            ]);
        }

        return redirect()->route('groups.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupUpdateRequest $request, string $id)
    {
        $group = Group::permitedAll()->whereId($id)->first();

        if(!empty($group)){
            $group->fill($request->all());

            if (!$group->save()) {
                return redirect()
                    ->route('groups.index')
                    ->withInput()
                    ->with("message", [
                        "type" => "danger",
                        "title" => "Erro",
                        "msg" => "Registro não atualizado!"
                    ]);
            }

            return redirect()->route('groups.index')->with("message", [
                "type" => "success",
                "title" => "Sucesso",
                "msg" => "Registro atualizado com Sucesso!"
            ]);
        }

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::permitedAll()->whereId($id)->first();

        if(!$group){
            return redirect()
                ->route('groups.index')
                ->with("message", [
                    "type" => "danger",
                    "title" => "Erro",
                    "msg" => "Registro não localizado!"
                ]);
        }

        $group->delete();

        return redirect()->route('groups.index')->with("message", [
            "type" => "success",
            "title" => "Sucesso",
            "msg" => "Registro excluído com Sucesso!"
        ]);
    }
}
