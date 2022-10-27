<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $category_id;

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'status' => ['nullable'],
        ];
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function storeCategory()
    {
        // buat validasi
        $validateData = $this->validate();
        // ambil model databasesnya
        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        return redirect('admin/category')->with('message', 'added category successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function updateCategory(int $category_id)
    {
        $this->category_id = $category_id;
        $category = Category::findOrFail($category_id);
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->status = $category->status;
    }

    public function editCategory()
    {
        $validateData = $this->validate();
        Category::findOrFail($this->category_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        return redirect('admin/category')->with('message', 'deleted category successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyBrands()
    {
        $category = Category::findOrFail($this->category_id);
        $category->delete();
        session()->flash('message', 'deleted category successfully');
        $this->dispatchBrowserEvent('close-modal');

    }
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(2);
        return view('livewire.admin.category.index', compact('categories'))->extends('layouts.master')->section('content');
    }
}
