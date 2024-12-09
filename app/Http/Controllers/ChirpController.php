<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ChirpController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit(Chirp $chirp)*/
    public function edit(Chirp $chirp): View
    {
        //
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
   /* public function update(Request $request, Chirp $chirp)*/
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        //
        Gate::authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

}
