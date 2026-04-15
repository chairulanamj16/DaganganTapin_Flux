<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class KategoriForm extends Form
{
    // use WithFileUploads;
    public ?Category $category = null;

    public $kategori = '';
    public $slug = '';
    public TemporaryUploadedFile|string|null $logo = null;

    protected function rules()
    {
        return [
            'kategori' => [
                'required',
                'string',
                Rule::unique('categories', 'kategori')->ignore($this->category),
            ],
            'slug' => [
                'required',
                'string',
                Rule::unique('categories', 'slug')->ignore($this->category),
            ],
            'logo' => [
                'mimes:jpeg,jpg,png,gif',
                Rule::requiredIf(!$this->category),
            ],
        ];
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
        $this->kategori = $category->kategori;
        $this->slug = $category->slug;
        // $this->logo = $category->logo;
    }

    public function store()
    {
        $this->category = null;
        $this->validate();

        $category = new Category();
        $category->uuid = str()->uuid();
        $category->kategori = $this->kategori;
        $category->slug = $this->slug;
        $logo = $this->logo->store('assets/categories', 'public');
        $category->logo = $logo;
        $category->save();
    }

    public function update()
    {
        $this->validate();

        $category = $this->category;
        $category->kategori = $this->kategori;
        $category->slug = $this->slug;
        if ($this->logo) {
            File::delete('storage/' . $category->logo);
            $category->logo = $this->logo->store('assets/categories', 'public');
        }
        $category->save();
    }

    public function delete()
    {
        $this->category->delete();
        // $this->category->forceDelete();
    }
}
