<p><b>Name : </b>{{$name}}</p>
@if ($email)
<p><b>Email : </b>{{$email}}</p>
@endif
@if ($contac_no)
<p><b>Contact No : </b>{{$contac_no}}</p>
@endif
@if ($company)
<p><b>Company Name : </b>{{$company}}</p>
@endif
@if ($designation)
<p><b>Designation : </b>{{$designation}}</p>
@endif
@if($position)
<p><b>Position : </b>{{$position}}</p>
@endif
@if($s_message)
<p><b>Message : </b>{{$s_message}}</p> 
@endif
@if($file)
<p><b>Attached File : </b><a href="{{ url('storage/file/') . '/' . $file }}" target="_blank">View File</a></p>
@endif
