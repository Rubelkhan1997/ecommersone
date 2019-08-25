@extends('dashboard.admindashboard')

@section('dashboard_content')
  <div class="continer">
    <div class="row">
       @if (App\Customerprofile::where('user_id', Auth::id())->exists())
         <div class="col-md-10 ">
           <div class="card shadow" style="margin-top:50px">
             <div class="card-header text-center">
               <h2>Update Profile</h2>
             </div>
               @if (session('update'))
                 <div class="alert alert-success">
                   <h4>{{ session('update') }}</h4>
                 </div>
               @endif
               @if (session('invalid'))
                 <div class="alert alert-danger">
                   <h4>{{ session('invalid') }}</h4>
                 </div>
               @endif
               <div class="card-body">
                 <form class="" action="{{ url('customer/profile/update/post') }}" method="post" enctype="multipart/form-data">
                   @csrf

                   <input type="hidden" name="customer_id" class="form-control" value="{{ $customerprofile->id }}">
                   <div class="form-group col-md-6">
                     <label><h4>First Name</h4> </label>
                     <input type="text" name="first_name" class="form-control" value="{{ $customerprofile->first_name }}">
                   </div>
                   <div class="form-group col-md-6">
                     <label><h4>Last Name</h4> </label>
                     <input type="text" name="last_name" class="form-control" value="{{ $customerprofile->last_name }}">
                   </div>
                   <div class="form-group col-md-6">
                     <label><h4>Phone Number</h4> </label>
                     <input type="text" name="phone_number" class="form-control" value="{{ $customerprofile->phone_number }}">
                   </div>
                   <div class="form-group col-md-6">
                     <label><h4>Image</h4> </label>
                     <input type="file" name="photo" class="form-control">
                   </div>

                   <div class="form-group col-md-12">
                     <label><h4>Address</h4> </label>
                     <textarea name="address" rows="5" class="form-control" >{{ $customerprofile->address }}</textarea>
                   </div>

                   <button type="submit" class="btn btn-info btn-block"><h4>Update Profile</h4> </button>
                 </form>
               </div>
             </div>
           </div>
         @else
          <div class="col-md-10 ">
            <div class="card shadow" style="margin-top:50px">
              <div class="card-header text-center">
                <h2>Add Profile</h2>
              </div>
                @if (session('add'))
                  <div class="alert alert-success">
                    <h4>{{ session('add') }}</h4>
                  </div>
                @endif
                @if (session('invalid'))
                  <div class="alert alert-danger">
                    <h4>{{ session('invalid') }}</h4>
                  </div>
                @endif
                <div class="card-body">
                  <form class="" action="{{ url('customer/profile/post') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                      <label><h4>First Name</h4> </label>
                      <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                      <span class="text-danger">{{ ($errors->has('first_name'))? $errors->first('first_name'):'' }} </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label><h4>Last Name</h4> </label>
                      <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                      <span class="text-danger">{{ ($errors->has('last_name'))? $errors->first('last_name'):'' }} </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label><h4>Phone Number</h4> </label>
                      <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                      <span class="text-danger">{{ ($errors->has('phone_number'))? $errors->first('phone_number'):'' }} </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label><h4>Image</h4> </label>
                      <input type="file" name="photo" class="form-control">
                      <span class="text-danger">{{ ($errors->has('photo'))? $errors->first('photo'):'' }} </span>
                    </div>

                    <div class="form-group col-md-12">
                      <label><h4>Address</h4> </label>
                      <textarea name="address" rows="5" class="form-control" >{{ old('address') }}</textarea>
                      <span class="text-danger">{{ ($errors->has('address'))? $errors->first('address'):'' }} </span>
                    </div>

                    <button type="submit" class="btn btn-success btn-block"><h4>Add Profile</h4> </button>
                  </form>
                </div>
              </div>
            </div>
          @endif
      </div>
    </div>
@endsection
