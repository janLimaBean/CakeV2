<h1>Add Post</h1>
<?php

/*We use the FormHelper to generate the opening tag for an HTML form. Here’s the HTML that $this->Form->create() generates:
           <form id="PostAddForm" method="post" action="/posts/add">

If create() is called with no parameters supplied, it assumes you are building a form that submits
via POST to the current controller’s add() action (or edit() action when id is included
in the form data). */
echo $this->Form->create('Post');
/*The $this->Form->input() method is used to create form elements of the same name. The first parameter tells CakePHP which field they correspond to, and the second parameter allows you to specify a wide array of options - in this case, the number of rows for the textarea. There’s a bit of introspection and automagic here: input() will output different form elements based on the model field specified.*/
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>