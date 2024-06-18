<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Demande;
use App\Mail\DemandeMail;
use Illuminate\Http\Request;
use App\Models\DemandeDetail;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::with('user')->paginate(10);
        return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('demandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->demandes);
        $order = Demande::count() === 0 ? 1 : Demande::get()->last()->id + 1;
        $ref = "REQ-{$order}-". Carbon::now()->year;
        $demande = Demande::create([
            'num_demande' => $ref,
            'service_id' => 1,
            'user_id' => Auth::user()->id
        ]);

        if($demande){
            try {
                Mail::to($demande->user->email, $demande->user->name)->send(new DemandeMail($demande));
                foreach ($request->demandes as $item) {
                    // dd($item["qte_demandee"]);
                    DemandeDetail::create([
                        'designation' => $item["designation"],
                        'qte_demandee' => $item["qte_demandee"],
                        'qte_livree' => 0,
                        'demande_id' => $demande->id
                    ]
                    );
                }
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        return redirect()->route('demandes.index')->with('success', 'Demande Enregistré');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
