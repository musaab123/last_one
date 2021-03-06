<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class ProjectTasksTest extends TestCase
{
    
    use RefreshDatabase;



/** @test */
public function guests_cannot_add_tasks_to_projects()
{
    $project = factory('App\Project')->create();

     $this->post($project->path() . '/tasks')->assertRedirect('login');






}






 /** @test */
 public function only_the_owner_of_project_may_add_tasks()
 {
         $this->signIn();

         $project = factory('App\Project')->create();
         $this->post($project->path() . '/tasks', ['body' => 'Test task']);
            // ->assertStatus(403);
         $this->assertDatabaseMissing('tasks', ['body'=> 'Test task']);
 }







    /** @test */

    public function a_project_can_have_tasks()
    {

        // $this->withoutExceptionHandling();

         $this->signIn();

        $project = factory(Project::class)->raw();

         $project = auth()->user()->projects()->create($project);

        // ->create(['owner_id' => auth()->id()]);

        $this->post($project->path() . '/tasks', ['body' => 'Test task']);

        $this->get($project->path())
            ->assertSee('Test task');

    
    }

    public function a_task_requires_a_body()
    {
         $this->signIn();

           $project = factory(Project::class)->raw();

         $project = auth()->user()->projects()->create($project);


        $attributes = factory('App\Task')->raw(['body'=>'']);
   $this->post($project->path() . '/tasks',  $attributes)->assertSessionHasErrors('body');
    }





}
