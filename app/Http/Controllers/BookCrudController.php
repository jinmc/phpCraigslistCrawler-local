<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BookRequest as StoreRequest;
use App\Http\Requests\BookRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class BookCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BookCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Book');
        $this->crud->setRoute( '/book');
        $this->crud->setEntityNameStrings('book', 'books');

        $this->crud->removeAllButtons();



        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns

        $this->crud->addColumn([
            'label' => '#',
            'name' => 'row_number',
            'type' => 'row_number',
            'orderable' => false,
        ]);

//        $this->crud->setFromDb();


        $this->crud->addColumn([
           'label' => 'Title',
           'name' => 'name'
        ]);

        $this->crud->addColumn([
            'label' => 'price',
            'name' => 'price'
        ]);

//        $this->crud->addColumn([
//            // 1-n relationship
//            'label' => "Student", // Table column heading
//            'type' => "select",
//            'name' => 'student_id', // the column that contains the ID of that connected entity;
//            'entity' => 'Student', // the method that defines the relationship in your Model
//            'attribute' => "name", // foreign key attribute that is shown to user
//            'model' => Student::class, // foreign key model
//        ]);
//
//        $this->crud->addColumn([
//            // 1-n relationship
//            'label' => "Program", // Table column heading
//            'type' => "select",
//            'name' => 'program_id', // the column that contains the ID of that connected entity;
//            'entity' => 'Program', // the method that defines the relationship in your Model
//            'attribute' => "program_name", // foreign key attribute that is shown to user
//            'model' => Program::class, // foreign key model
//        ]);

        // add asterisk for fields that are required in BookRequest
//        $this->crud->setRequiredFields(StoreRequest::class, 'create');
//        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
