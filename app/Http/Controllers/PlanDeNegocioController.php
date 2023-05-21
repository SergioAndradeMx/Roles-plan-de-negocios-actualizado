<?php

namespace App\Http\Controllers;

use App\Models\Plan_de_negocio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PlanDeNegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->rol == "admin"){

            $field = $request->input('tipo');
            if(request('search')){
                $planes = DB::table('plan_de_negocios')
                    ->join('users', 'plan_de_negocios.user_id', '=', 'users.id')
                    ->select('plan_de_negocios.*', 'name', 'users.id')
                    ->where($request->tipo, 'like', '%' . request('search') . '%')
                    ->paginate(5);
                return view('admin.planes_de_negocio.index', compact('planes'));
            } else if( request('fdate') && request('sdate') ) {
                $planes = DB::table('plan_de_negocios')
                    ->join('users', 'plan_de_negocios.user_id', '=', 'users.id')
                    ->select('plan_de_negocios.*', 'name')
                    ->whereDate('plan_de_negocios.created_at', '>=', $request->fdate)
                    ->whereDate('plan_de_negocios.created_at', '<=', $request->sdate)
                    ->paginate(5);
                    return view('admin.planes_de_negocio.index', compact('planes'));
            } else {
                $planes = DB::table('plan_de_negocios')
                    ->join('users', 'plan_de_negocios.user_id', '=', 'users.id')
                    ->select('plan_de_negocios.*', 'name')
                    ->paginate(5);
                return view('admin.planes_de_negocio.index', compact('planes'));
            }
            
        }else{
            return view('dashboard', [
                'planes_de_negocios' => auth()->user()->planes_de_negocios,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plan_de_negocio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $user = Auth::user();

        $user->planes_de_negocios()->create($validated);
        $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan_de_negocio $plan_de_negocio)
    {
        return view('plan_de_negocio.show', compact('plan_de_negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan_de_negocio $plan_de_negocio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan_de_negocio $plan_de_negocio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Plan_de_negocio::destroy($id);

        return back();
    }
}
