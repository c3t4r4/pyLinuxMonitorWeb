<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Log;
use App\Models\Node;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nodes = Node::permitedAll()
            ->with('group')
            ->when($request->search, function ($query, $search){
                $query->where('name', 'ilike', "%{$search}%")
                    ->orWhere('hostname', 'ilike', "%{$search}%")
                    ->orWhere('observation', 'ilike', "%{$search}%")
                    ->orWhere('created_at', 'ilike', "%{$search}%");
            })
            ->orderBy("name", "asc")
            ->paginate(50)
            ->withQueryString();

        return Inertia::render('Nodes/index', [
            "nodes" => $nodes,
            "filters" => $request->only(['search'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::permitedAll()->get();

        return Inertia::render('Nodes/create', [
            "groups" => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $node = new Node();
        $node->fill($request->all());

        if (!$node->save()) {
            return redirect()
                ->route('nodes.index')
                ->withInput()
                ->with("message", [
                    "type" => "danger",
                    "title" => "Erro",
                    "msg" => "Registro não criado!"
                ]);
        }

        return redirect()->route('nodes.index')->with("message", [
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
        $node = Node::permitedAll()->whereId($id)->first();

        if(!empty($node)){
            $groups = Group::permitedAll()->get();

            return Inertia::render('Nodes/show', [
                'groups' => $groups,
                'node' => $node,
            ]);
        }

        return redirect()->route('nodes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $node = Node::permitedAll()->whereId($id)->first();

        if(!empty($node)){
            $groups = Group::permitedAll()->get();

            return Inertia::render('Nodes/edit', [
                'groups' => $groups,
                'node' => $node,
            ]);
        }

        return redirect()->route('nodes.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $node = Node::permitedAll()->whereId($id)->first();

        if(!empty($node)){
            $node->fill($request->all());

            if (!$node->save()) {
                return redirect()
                    ->route('nodes.index')
                    ->withInput()
                    ->with("message", [
                        "type" => "danger",
                        "title" => "Erro",
                        "msg" => "Registro não atualizado!"
                    ]);
            }

            return redirect()->route('nodes.index')->with("message", [
                "type" => "success",
                "title" => "Sucesso",
                "msg" => "Registro atualizado com Sucesso!"
            ]);
        }

        return redirect()->route('nodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $node = Node::permitedAll()->whereId($id)->first();

        if(!$node){
            return redirect()
                ->route('nodes.index')
                ->with("message", [
                    "type" => "danger",
                    "title" => "Erro",
                    "msg" => "Registro não localizado!"
                ]);
        }

        $node->delete();

        return redirect()->route('nodes.index')->with("message", [
            "type" => "success",
            "title" => "Sucesso",
            "msg" => "Registro excluído com Sucesso!"
        ]);
    }
}
