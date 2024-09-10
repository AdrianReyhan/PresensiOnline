<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $userId = Auth::user()->no_id;

        $catalog = Catalog::where('created_by',$userId)
        ->with('catalogUser:id,no_id,name')
        ->paginate(10);

        // return view('catalog.index', compact('catalog'))

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data katalog',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            $userId = Auth::user()->no_id;
            $validated = $request->validate([
                'description' => 'required|string'
            ]);

            Catalog::create([
                'description' => $validated['description'],
                'created_by' => $userId
            ]);
            // return redirect()->route('catalog.index')->with('success', 'Katalog berhasil ditambahkan');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menambah katalog'.$e->getMessage())->withInput();
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $userId = Auth::user()->no_id;
        $catalog = Catalog::where('id',$id)->where('created_by',$userId)->firstOrFail();
        
        return view('catalog.show',compact('catalog'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menacari katalog'. $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $userId = Auth::user()->no_id;
            $catalog = Catalog::where('id', $id)->where('created_by', $userId)->firstOrFail();

            $validated = $request->validate([
                'description' => 'nullable|string',
            ]);

            $catalog->update($validated);

            return redirect()->route('catalog.index')->with('success', 'Katalog berhasil diperbarui');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('catalog.index')->withErrors('Katalog tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui katalog: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $userId = Auth::user()->no_id;
            $catalog = Catalog::where('id', $id)->where('created_by', $userId)->firstOrFail();
            $catalog->delete();

            return redirect()->route('catalog.index')->with('success', 'Katalog berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('catalog.index')->withErrors('Katalog tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus katalog: ' . $e->getMessage());
        }
    }
}
