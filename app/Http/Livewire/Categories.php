<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;

class Categories extends Component
{
    public $categories, $name, $slug, $category_id;
    public $modal,$modaldelete = 0;
    public $editing=null;

    /**
     * render function
     *
     * @return void
     */
    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.categories');
    }

    /**
     * create function
     *
     * @return void
     */
    public function create(){
        $this->cleanInputs();
        $this->openModal();

    }

    /**
     * openModal function
     *
     * @return void
     */
    public function openModal(){
        $this->modal = true;
    }

    /**
     * closeModal function
     *
     * @return void
     */
    public function closeModal(){
        $this->modal = false;
    }

    /**
     * cleanInputs function
     *
     * @return void
     */
    public function cleanInputs(){
        $this->name = '';
        $this->slug = '';
    }

    /**
     * update function
     *
     * @param integer $id
     * @return void
     */
    public function update(int $id){
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->openModal();
    }

    /**
     * delete function
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $this->category_id = $id;
        $this->openModalDelete($this->category_id);
    }

     /**
     * delete function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteRegister($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Categoria Eliminada');


        $this->closeModalDelete();
    }

     /**
     * openModalDelete function
     *
     * @return void
     */
    public function openModalDelete($id){
        $this->modaldelete = true;
    }

    /**
     * closeModalDelete function
     *
     * @return void
     */
    public function closeModalDelete(){
        $this->modaldelete = false;
    }



    /**
     * save function
     *
     * @return void
     */
    public function save()
    {
        $this->editing = $this->category_id;
        $this->validate([
            'name' => ['required', Rule::unique('categories')->ignore($this->editing)],
            'slug' => 'required'
        ]);

        Category::updateOrCreate(['id'=>$this->category_id],
            [
                'name' => $this->name,
                'slug' => $this->slug
            ]);

         session()->flash('message',
            $this->category_id ? 'Categoria actualizada correctamente' : 'Categoria creada correctamente');

         $this->closeModal();
         $this->cleanInputs();
    }

}
