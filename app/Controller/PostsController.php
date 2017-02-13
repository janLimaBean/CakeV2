<?php
class PostsController extends AppController {

    // Using cake helpers for html and form

    public $helpers = array('Html', 'Form');

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

}
?>