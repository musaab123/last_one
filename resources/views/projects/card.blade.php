<div class="bg-white  p-5 rounded shadow " style="height:200px">
			
			 <h3 class=" text-xl py-4 -ml-5 mb-3 border-l-4 border-blue pl-4">

			 	<a href="{{ $project->path() }}">{{ $project->title}}</a>
			 	



			 </h3>

			 <div class="text-gray">{{Illuminate\Support\Str::limit($project->description, 250)}}</div>
</div>

