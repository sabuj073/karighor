@extends('layouts.backend.master')
@section('title','Section Content')
@section('content')
<div class="container-fluid page__heading-container">
  <div class="page__heading d-flex align-items-end">
      <div class="flex">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Section Content</li>
              </ol>
          </nav>
          <h1 class="m-0">Section Content</h1>
      </div>
  </div>
</div>
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
              <h4 class="text-center">Section Content</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table">
                      <thead class="">
                          <tr>
                              <th>Section Name</th>
                              <th>Header</th>
                              <th>Sub Header</th>
                              <th>Content</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody class="table">
                          @foreach ($sectionContent as $content)
                              <tr>
                                  <td class="">{{ $content->sec_name }}</td>
                                  <td>{{ $content->header }}</td>
                                  <td>{{ $content->sub_header }}</td>
                                  <td>{{ $content->content }}</td>
                                  <td class="td_btn">                                      
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                    onclick="updatedata('{{ $content->id }}','{{ $content->header }}','{{ $content->sub_header }}','{{ $content->content }}')"
                                    class="btn btn-sm btn-info">Edit</a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
  <script>
    CKEDITOR.replace('editor');
</script>
</section>

@endsection
<script>
  function updatedata(id,header,sub_header,content) {
      $("#id").val(id);
      $("#header").val(header);
      $("#sub_header").val(sub_header);
      CKEDITOR.instances['editor'].setData(content)
  }
</script>
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit partner Info</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body"> 
              <form action="{{ route('backend.sectionContent.update',$content->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class=" form-group">
                    <label for="">Header:</label>
                      <input type="hidden" name="id" id="id" class="form-control">
                      <input type="text" name="header" id="header" class="form-control" value="{{ $content->header }}">
                  </div>                  
                  <div class="form-group mt-3">
                    <label for="">Sub Header:</label>
                      <input type="text" name="sub_header" id="sub_header" class="form-control" value="{{ $content->sub_header }}">
                  </div>                  
                  <div class="form-group mt-3">
                    <label for="">Content:</label>
                     <textarea name="content" id="editor" class="form-control" rows="5"></textarea>
                  </div>                  
                  <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
          </div>
      </div>
  </div>
</div>