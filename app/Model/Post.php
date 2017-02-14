<?php

class Post extends AppModel {
//The $validate array tells CakePHP how to validate your data when the save() method is called.
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );


} // end of Post Model
?>