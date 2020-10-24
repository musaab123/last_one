

@extends('layouts.app')


@section('content')

	<header class="flex items-center mb-3 ">

		<div class="flex justify-between items-end w-full">

			<p class="text-grey text-sm font-normal p-3">

			<a href="/projects" class="text-grey text-sm font-normal">My Project</a> / {{$project->title}}
			</p>

		<a href="/projects/create" class="button p-2 px-5">Add Project</a>	


		</div>
	</header>
	
	<main>
		
		<div class="lg:flex">
			<div class="lg:w-3/4 px-3 mb-6">

				<div class="mb-8">
						<h2 class="text-lg text-grey font-normal mb-3">Tasks</h2>

						@forelse ($project->tasks as $task)

					<div class="bg-white  p-5 rounded shadow mb-3">{{ $task->body }}</div>

					@empty
				<div class="bg-white  p-5 rounded shadow mb-3">


					<form action="{{ $project->path() . '/tasks' }}" method="POST">
						@csrf

					<input placeholder="Begin adding task .." class="w-full" name="body">

					</form>

				</div>

						@endforelse
				</div>

				<div>

						<h2 class="text-lg text-grey  font-normal mb-3">General Notes</h2>

						<textarea class="bg-white  p-5 rounded shadow w-full" style="min-height: 200px"> </textarea>
				</div>

			</div>
			<div class="lg:w-1/4 px-3">
					@include('projects.card')
			</div>
		</div>



	</main>


  
@endsection 
