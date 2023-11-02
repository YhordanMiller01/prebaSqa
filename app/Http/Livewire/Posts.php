<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Posts extends Component
{
    public $posts, $title, $body, $post_id,$user_id,$category_id;
    public $modal,$modaldelete = 0;
    public $editing=null;

    /**
     * render function
     *
     * @return void
     */
    public function render()
    {
        $this->posts = Post::all();
        $categories_data = Category::all();

        return view('livewire.posts',compact('categories_data'));
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
        $this->title = '';
        $this->body = '';
        $this->category_id = '';
        $this->user_id = '';
    }

    /**
     * update function
     *
     * @param integer $id
     * @return void
     */
    public function update(int $id){

        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->category_id = $post->category_id;
        $this->user_id = Auth::user()->id;
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
        $this->post_id = $id;
        $this->openModalDelete($this->post_id);
    }

     /**
     * delete function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteRegister($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Eliminado');

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

        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => ['required']
        ]);


        Post::updateOrCreate(['id'=>$this->post_id],
            [
                'title' => $this->title,
                'body' => $this->body,
                'category_id' => $this->category_id,
                'user_id' => Auth::user()->id
            ]);

         session()->flash('message', $this->post_id ? 'Post actualizado correctamente' : 'Post creado correctamente');

         $this->closeModal();
         $this->cleanInputs();
    }
}
