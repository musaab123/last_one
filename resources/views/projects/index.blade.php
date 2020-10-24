
 @extends('layouts.app')


@section('content')



	<header class="flex items-center mb-3 ">

		<div class="flex justify-between items-end w-full">

			<h2 class="text-grey text-sm font-normal p-3">New Project</h2>

		<a href="/projects/create" class="button p-2 px-5">Add Project</a>	


		</div>
	</header>
	
<main class="lg:flex p-3 lg:flex-wrap -mx-3 ">
	@forelse($projects as $project)

	<div class=" lg:w-1/3 px-3 pb-6">


	@include('projects.card')

	</div>

	@empty
		<div>No project yet .</div>

		@endforelse

</main>


@endsection 


