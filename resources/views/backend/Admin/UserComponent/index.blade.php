@extends('layouts.app')
@extends('backend.partial.header')
@extends('backend.partial.sidenav')
@section('content')
@include('sweetalert::alert')
     <div class="main-panel" style="width: 100%;">
          <div class="content-wrapper">
             <div class="page-header">
                <h3 class="page-title">
                  <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account"></i>
                  </span> USER
                </h3>
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <span></span>All User's <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                  </ul>
                </nav>
             </div>
             <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="table-responsive">
                              <table class="table">
                              <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Intrested</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                              </thead>
                              <?php $i = 1 ?>
                                @if(isset($data))
                                @foreach ($data as $item)
                                  <tbody>
                                      <tr>
                                      <td>{{$i ++}}</td>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->email}}</td>
                                      <td>{{$item->intrested}}</td>
                                      <td>
                                      @if($item->status == 1)
                                        <a href="{{route('user.approve', $item->id)}}" class="btn btn-success approve-btn btn-sm approve-btn">APPROVE</a>
                                        @else
                                        <a href="{{route('user.approve', $item->id)}}" class="btn btn-danger unapprove-btn btn-sm">UNAPPROVE</a>
                                      @endif
                                      </td>
                                      <td>
                                        <button class="deleteRecord btn btn-danger btn-sm" data-id="{{ $item->id }}" >Delete</button>
                                      </td>
                                      </tr>
                                  </tbody>
                                @endforeach
                                @endif
                            </table>
                          </div>
                     </div>
                  </div>
                  {!! $data->links() !!}
                </div>
            </div>
          </div>
          <script>
            $(document).ready(function() {
                $(".deleteRecord").click(function(){
                  var id = $(this).data("id");
                  // alert(id);
                  var token = $("meta[name='csrf-token']").attr("content");
                  
                  $.ajax(
                  {
                      url: "/admin/users/"+id,
                      type: 'DELETE',
                      data: {
                            "id": id,
                            "_token": token,
                      },
                      success: function (){
                            console.log("it Works");
                            window.location.reload(true);
                      }
                  });
                });
            });
          </script>
      </div>
          <!-- content-wrapper ends -->
@extends('backend.partial.footer')

@endsection
