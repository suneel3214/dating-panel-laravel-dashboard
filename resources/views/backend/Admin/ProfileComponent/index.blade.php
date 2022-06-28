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
                  </span> PROFILE
                </h3>
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <span></span>All User'S Profile <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                                <th>Age</th>
                                <th>Country</th>
                                <th>Contact</th>
                                <th>Date</th>
                                <th>Profile</th>
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
                                      <td>{{$item->age}}</td>
                                      <td>{{$item->country}}</td>
                                      <td>{{$item->contact}}</td>
                                      <td>{{$item->created_at->format('d-m-Y')}}</td>
                                      <td>
                                      <img src="{{asset('/image/'.$item->image)}}" alt="">
                                      </td>
                                      <td>
                                      <a 
                                        href="javascript:void(0)" 
                                        id="show-user" 
                                        data-url="{{ route('admin.user.show', $item->id) }}" 
                                        class="btn btn-success btn-sm"
                                        >View</a>
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
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="text-center">
                     <img class="profileView-img shadow" id="image" src="#" alt="">
                  </div>
                <table  class="table">
                  <tr>
                    <th>Name:</th>
                    <td><span id="name"></span></td>
                  </tr>
                  <tr>
                    <th>Country:</th>
                    <td><span id="country"></td>
                  </tr>
                  <tr>
                    <th>About:</th>
                    <td><span id="about"></span></td>
                  </tr>
                  <tr>
                    <th>Age:</th>
                    <td><span id="age"></td>
                  </tr>
                  <tr>
                    <th>Ethnicity:</th>
                    <td><span id="ethnicity"></span></td>
                  </tr>
                  <tr>
                    <th>Sexuality:</th>
                    <td><span id="sexuality"></td>
                  </tr>
                  <tr>
                    <th>Gender:</th>
                    <td><span id="gender"></span></td>
                  </tr>
                  <tr>
                    <th>Smoking:</th>
                    <td><span id="smoking"></td>
                  </tr>
                  <tr>
                    <th>Contact:</th>
                    <td><span id="contact"></span></td>
                  </tr>
                  <tr>
                    <th>Eye Color:</th>
                    <td><span id="eye"></td>
                  </tr>
                  <tr>
                    <th>Hair Color:</th>
                    <td><span id="hair_color"></span></td>
                  </tr>
                  <tr>
                    <th>Hair Lenght:</th>
                    <td><span id="hair_length"></td>
                  </tr>
                  <tr>
                    <th>Body Size:</th>
                    <td><span id="body_size"></span></td>
                  </tr>
                </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary btn btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
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
                      url: "/admin/user/profile/"+id,
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
          <?php
 
               $baseUrl = URL::to('/image/');
          ?>

          <script>
      
              $(document).ready(function () {
                
                /* When click show user */
                  $('body').on('click', '#show-user', function () {
                    var userURL = $(this).data('url');
                    var baseUrl = "{{URL::to('/image')}}" + '/';
                    $.get(userURL, function (data) {
                        $('#exampleModal').modal('show');
                        $('#id').text(data.id);
                        $('#name').text(data.name);
                        $('#country').text(data.country);
                        $('#about').text(data.about);
                        $('#age').text(data.age);
                        $('#ethnicity').text(data.ethnicity);
                        $('#sexuality').text(data.sexuality);
                        $('#gender').text(data.gender);
                        $('#drinking').text(data.drinking);
                        $('#smoking').text(data.smoking);
                        $('#age').text(data.age);
                        $('#contact').text(data.contact);
                        $('#eye').text(data.eye);
                        $('#hair_color').text(data.hair_color);
                        $('#hair_length').text(data.hair_length);
                        $('#body_size').text(data.body_size);
                        $('#image').attr('src', baseUrl + data.image);
                        $('#created_at').text(data.created_at);
                        $('#updated_at').text(data.updated_at);
                    })
                });
                
              });
            
          </script>
      </div>
          <!-- content-wrapper ends -->
@extends('backend.partial.footer')

@endsection
