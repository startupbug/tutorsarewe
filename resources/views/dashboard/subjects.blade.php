<form action="{{route('tutor_subject')}}" method="post">
	{{csrf_field()}}
	<label>Subjects</label>
	<select class="form-control" id="sel1" name="subject_name">
		@foreach($subjects as $subject)
			<option value="{{$subject->id}}">{{$subject->subject}}</option>
		@endforeach
	</select>
	<input type="submit" name="submit">
</form>


<br>
<br>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@if(isset($all_subjects))
  	@foreach($all_subjects as $key => $subject)
	    <tr>
	      <th scope="row">{{$key+1}}</th>
	      <td>{{$subject->subject}}</td>
	      <td></td>
	    </tr>
    @endforeach
    @endif
  </tbody>
</table>