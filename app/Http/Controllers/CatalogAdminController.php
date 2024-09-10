<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try {
            $catalog = Catalog::where('id',$id)->firstOrFail();

            return view('catalog.show',compact('catalog'));
        } catch (\Exception $e) {
           return redirect()->back()->withErrors('Terjadi kesalahan saat mencari katalog'.$e->getMessage())->withInput();
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
        //
        try {
            $catalog = Catalog::where('id',$id)->firstOrFail();

            $validated = $request->validate([
                'description' => 'nullable|string',
            ]);

            $catalog->update($validated);

            return redirect()->route('catalog.index');
        }  catch (ValidationException $e) {
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
    public function destroy(string $id)
    {
        //
        try {
            $catalog = Catalog::where('id', $id)->firstOrFail();
            $catalog->delete();

            return redirect()->route('catalog.index')->with('success', 'Katalog berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('catalog.index')->withErrors('Katalog tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus katalog: ' . $e->getMessage());
        }

    }
}
