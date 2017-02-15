<?php
class PostsController extends AppController {

    // Using cake helpers for html and form
    public $helpers = array('Html', 'Form');
    // Using cake components to display error messages
    public $components = array('Flash');

    public function index(){
        /* 1. note post model is available autumatically because of the naming convetion of cake.
           2. set('string', passing var) - take the passing argument and pass it into the view as defined "string" var
        */
        $this->set('posts', $this->Post->find('all'));
    }

    // passing $id from the index.ctp html->link
    public function view($id = null) {
        if (!$id) {
        // Error handling by cake throw exception
            throw new NotFoundException(__('Post invalid/not found'));
        }
        $post = $this->Post->findById($id);
        if(!$post) {
            throw new NotFoundException(__('Post invalid/not found'));
        }
        $this->set('post',$post);
    }

    public function add(){
        //Every CakePHP request includes a CakeRequest object which is accessible using $this->request
        if($this->request->is('post')){
        //We call the create() method first in order to reset the model state for saving new information.
        //It does not actually create a record in the database, but clears Model::$id and sets Model::$data
        //based on your database field defaults.
           $this->Post->create();
       
            //When a user uses a form to POST data to your application, that information is available in 
            //$this->request->data. You can use the pr() or debug() functions to print it out if you want 
            //to see what it looks like.
            if($this->Post->save($this->request->data)){
                $this->Flash->success(__('Your post has been saved.'));
            //The param array('action' => 'index') translates to URL /posts 
            //(that is, the index action of the posts controller)
            return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add post.'));
        }
        //note if above does not apply by default the add.ctp view will be loaded.
    }

    public function edit($id=null) {
        //One thing to note here: CakePHP will assume that you are editing a model if the ‘id’ field is
        //present in the data array. If no ‘id’ is present (look back at our add view), CakePHP will assume
        //that you are inserting a new model when save() is called.
        if(!$id){
            throw new NotFoundException(__('Invalid Post'));
        }
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid Post'));
        }
        if($this->request->is(array('post','put'))){
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)){
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }
        
        //If there is no data(post data)set to $this->request->data, we simply set it to the previously
        //retrieved post. 
        
        //Above code only fires when you submit the post request. Before the post request
        //when you click on edit you submit a get request. To populate the html body fields to display
        //the post values in the form field and for use in a post request(if no changes made) we need
        //to set the body data to something($post)

        //Remember this - When a user uses a form to POST data to your application, that information is 
        //available in $this->request->data.
        if(!$this->request->data){
            $this->request->data = $post;
        }
    }

    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Post->delete($id)){
            $this->Flash->success(
                __('The post with id: %s has been deleted.',h($id))
                );
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted', h($id))
            );
        }
        return $this->redirect(array('action'=> 'index'));
    }


} //end of PostController
?>