<?php

/**
 * taskmanager actions.
 *
 * @package    LifeManager
 * @subpackage taskmanager
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taskmanagerActions extends sfActions
{

  public function initialize($context, $moduleName, $actionName) {
      parent::initialize($context, $moduleName, $actionName);
      //ADD GLOBAL BEHAVIOURS HERE
  }

 /**
  * Lists all tasks in the database
  *
  * @param sfRequest $request A request object
  */
  public function executeList(sfWebRequest $request)
  {
    $tasks = Doctrine::getTable('Tasks')->getAllTasksByQuad();

    $this->first_quad = $tasks['first'];
    $this->second_quad = $tasks['second'];
    $this->third_quad = $tasks['third'];
    $this->fourth_quad = $tasks['fourth'];
  }

 /**
  * Lists all tasks in the database in matrix form
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $tasks = Doctrine::getTable('Tasks')->getAllTasksByQuad();

    $this->first_quad = $tasks['first'];
    $this->second_quad = $tasks['second'];
    $this->third_quad = $tasks['third'];
    $this->fourth_quad = $tasks['fourth'];
  }
   /**
  * Inserts a new task to the list
  *
  * @param sfRequest $request A request object
  */
  public function executeAdd(sfWebRequest $request)
  {
    $task_form = new TasksForm();
    $this->form = $task_form;

    if($request->isMethod('post')) {
        $clicked_button = $request->getParameter('add_button');
        if($clicked_button) {
            $task_form->bind($request->getParameter('tasks'));
            if($task_form->isValid()) {

                $task = new Tasks();
                $form_values = $task_form->getValues();

                unset($form_values['task_id']);

                $task->fromArray($form_values);
                $task->save();

                $this->redirect('taskmanager/index');
            }
        }
        else {
            $this->redirect('taskmanager/index');
        }
    }
  }

  /**
  * Edits an existing task in the list
  *
  * @param sfRequest $request A request object
  */
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($task_id = $request->getParameter('id'));
    $this->forward404Unless($this->task = Doctrine::getTable('Tasks')->find($task_id));

    $task_form = new TasksForm($this->task);
    $this->form = $task_form;

    if($request->isMethod('post')) {
        $clicked_button = $request->getParameter('edit_button');
        if($clicked_button) {
            $task_form->bind($request->getParameter('tasks'));
            if($task_form->isValid()) {

                $form_values = $task_form->getValues();
                $this->task->fromArray($form_values);
                $this->task->save();

                $this->redirect('taskmanager/index');

            }
        }
        else {
            $this->redirect('taskmanager/index');
        }
    }
  }


  /**
  * Deletes an existing task in the list
  *
  * @param sfRequest $request A request object
  */
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($task_id = $request->getParameter('id'));
      $this->forward404Unless($this->task = Doctrine::getTable('Tasks')->find($task_id));

      if($request->isMethod('post')) {
          $clicked_button = $request->getParameter('delete_button');
          if($clicked_button) {

              $this->task->delete();
          }

          $this->redirect('taskmanager/index');
      }
  }
}
