<?php

namespace App\Http\Livewire\Admin\Santri;

use App\Models\Category;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $category_id, $tanggal_lahir, $tempat_lahir, $alamat, $image, $status, $santri_id;

    protected $rules = [
        'name' => 'required|min:6',
        'slug' => 'required|min:6',
        'category_id' => 'required',
        'tanggal_lahir' => 'required',
        'tempat_lahir' => 'required',
        'alamat' => 'required',
        'image' => 'nullable|mimes:jpg,bmp,png',
        'status' => 'required',
    ];

    public function resetInput()
    {
        $this->name = "";
        $this->slug = "";
        $this->category_id = "";
        $this->tanggal_lahir = "";
        $this->tempat_lahir = "";
        $this->alamat = "";
        $this->image = "";
        $this->status = "";
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function storeSantris()
    {
        $this->validate([
            'name' => 'required|min:6',
            'slug' => 'required|min:6',
            'category_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'image' => 'nullable|mimes:jpg,bmp,png',
            'status' => 'required',
        ]);

        // $filename = $this->image->store('images', 'public');

        Santri::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'user_id' => auth()->user()->id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'alamat' => $this->alamat,
            'status' => $this->status == true ? '1' : '0',
        ]);

        return redirect('admin/santri')->with('message', 'added santri successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function updateSantri(int $santri_id)
    {
        // $this->santri_id = $santri_id;
        $this->santri_id = $santri_id;
        $santri = Santri::findOrFail($santri_id);
        $this->name = $santri->name;
        $this->slug = $santri->slug;
        $this->category_id = $santri->category_id;
        $this->tempat_lahir = $santri->tempat_lahir;
        $this->tanggal_lahir = $santri->tanggal_lahir;
        $this->alamat = $santri->alamat;
        $this->status = $santri->status;
        // $this->image = $santri->image;
    }

    public function editSantris()
    {
        $this->validate([
            'name' => 'required|min:6',
            'slug' => 'required|min:6',
            'category_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'image' => 'nullable|mimes:jpg,bmp,png',
            'status' => 'required',
        ]);

        // $filaname = $this->isUploaded->store('images', 'public');

        Santri::findOrFail($this->santri_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'user_id' => auth()->user()->id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'alamat' => $this->alamat,
            'status' => $this->status == true ? '1' : '0',
            // 'image' => $filaname,
        ]);
        return redirect('admin/santri')->with('message', 'updated santri successfully');
        $this->dispatchBrowserEvent('close-modal');

        $this->resetInput();

    }

    public function deleteSantri($santri_id)
    {
        $this->santri_id = $santri_id;
    }

    public function destroySantris()
    {
        $santri = Santri::findOrFail($this->santri_id);
        $santri->delete();
        return redirect('admin/santri')->with('message', 'deleted santri successfully');
        $this->dispatchBrowserEvent('close-modal');

    }
    public function render()
    {
        $categories = Category::all();
        $santris = Santri::orderBy('id', 'DESC')->paginate(2);
        return view('livewire.admin.santri.index', compact('categories', 'santris'))->extends('layouts.master')->section('content');
    }

}
