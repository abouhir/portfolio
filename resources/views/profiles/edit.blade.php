

@extends('layouts.left-menu' , 
[
    "page_name" =>"Profile" ,
    "route_create" => route("profile.create"),
    "route_show" => route("profile.show"),
    "route_update" => route("profile.edit"), 
    "action" => "update"
])

@section('content')


    @if ($errors->any())
    <div class="row mt-3 mb-3">
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}  
        </div>
    </div>
@endif
<div class="edit-profile scrollbar">  
<form action="{{route("profile.update")}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <!--Coverture Image -->
    <div class="offset-2 col-8 img-fluid">
        <div class="row">
        <div class="col-12  " style="background: url('@php echo $profile->coverture_image!='../default_image_coverture' ? asset('../storage/profiles_images_covertures/'.$profile->coverture_image) : asset('default-images/coverture-image.svg')    @endphp')  no-repeat ;
        background-size: 100% 300px;
        height: 300px;
        width: 100%;
        border-radius: 0px 0px 15px 15px;"> 
                        <div class="offset-7 col-5" style="margin-top: 230px;">
                        <div class="row">
                            <label for="coverture-image"  class="form-label " >
                            <a class="offset-1 col-10 btn btn-clr text-center">
                                <div class=""> 
                                    <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="18" height="18" x="2" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                        <path xmlns="http://www.w3.org/2000/svg" d="M27.348,7H23.054l-.5-1.5A3.645,3.645,0,0,0,19.089,3H12.911A3.646,3.646,0,0,0,9.447,5.5L8.946,7H4.652A3.656,3.656,0,0,0,1,10.652v14.7A3.656,3.656,0,0,0,4.652,29h22.7A3.656,3.656,0,0,0,31,25.348v-14.7A3.656,3.656,0,0,0,27.348,7ZM29,25.348A1.654,1.654,0,0,1,27.348,27H4.652A1.654,1.654,0,0,1,3,25.348v-14.7A1.654,1.654,0,0,1,4.652,9H9.667a1,1,0,0,0,.948-.684l.729-2.187A1.65,1.65,0,0,1,12.911,5h6.178a1.649,1.649,0,0,1,1.567,1.13l.729,2.186A1,1,0,0,0,22.333,9h5.015A1.654,1.654,0,0,1,29,10.652Z" fill="#FFFFFF" data-original="#FFFFFF" class="icon-btn"></path>
                                        <path xmlns="http://www.w3.org/2000/svg" d="M16,10a7.5,7.5,0,1,0,7.5,7.5A7.508,7.508,0,0,0,16,10Zm0,13a5.5,5.5,0,1,1,5.5-5.5A5.506,5.506,0,0,1,16,23Z" fill="#FFFFFF" data-original="#FFFFFF" class="icon-btn"></path><circle xmlns="http://www.w3.org/2000/svg" cx="26" cy="12" r="1" fill="#FFFFFF" data-original="#FFFFFF" class="icon-btn"></circle>
                                    </g>
                                    </svg>
                                    <span class="ms-1 pt-1 text-center">
                                    Changer la photo de coverture
                                    </span>
                                </div>
                            </a>
                            </label>
                        </div>
                    
                    <input class="form-control form-control" name="coverture_image" id="coverture-image" type="file" hidden>
                
                
            </div>
        
            <div class="row">
                <div class=" offset-md-2 col-md-10 text-danger">
                    @foreach ($errors->get('coverture_image') as $error)
                        {{"*".$error."*"}}
                    @endforeach
                </div>
            </div>
          </div>
        </div>   
   </div>
    
   
    
  <!-- Image Profile -->
  <div class="row">     
            <div class="offset-2 col-8  mt-3">
                <div class="bg-edit-profile">
                <div class="row mb-3">
                <div class="col-12">
                        <div class="col-6">
                            <img width="100%" class="rounded-circle img-profile"  src="{{asset("storage/profiles_images/".$profile->image)}}" class="mt-3" />
                            
                            <label for="image-profile" class="form-label">
                            <a class="btn btn-clr text-center ms-3 ">
                                <div>
                                    <svg class="ms-3" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" >
                                        <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m22.4 32h-12.8a9.61 9.61 0 0 1 -9.6-9.6v-12.8a9.61 9.61 0 0 1 9.6-9.6h12.8a9.61 9.61 0 0 1 9.6 9.6v12.8a9.61 9.61 0 0 1 -9.6 9.6zm-12.8-29.87a7.48 7.48 0 0 0 -7.47 7.47v12.8a7.48 7.48 0 0 0 7.47 7.47h12.8a7.48 7.48 0 0 0 7.47-7.47v-12.8a7.48 7.48 0 0 0 -7.47-7.47z" fill="#FFFFFF" data-original="#FFFFFF" class="icon-btn"></path>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m16 18.13a6.4 6.4 0 1 1 6.4-6.4 6.41 6.41 0 0 1 -6.4 6.4zm0-10.66a4.27 4.27 0 1 0 4.27 4.27 4.27 4.27 0 0 0 -4.27-4.27z" fill="#FFFFFF" data-original="#FFFFFF" class="icon-btn"></path>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m23.48 24.66a1.06 1.06 0 0 1 -.72-.28 7.45 7.45 0 0 0 -5.06-2h-3.39a7.45 7.45 0 0 0 -5.06 2 1.07 1.07 0 1 1 -1.44-1.58 9.58 9.58 0 0 1 6.5-2.53h3.38a9.58 9.58 0 0 1 6.51 2.55 1.07 1.07 0 0 1 -.72 1.85z" fill="#FFFFFF" data-original="#FFFFFF" class="icon-btn"></path>
                                        </g>
                                    </svg>
                                    <span class="ms-1 me-3  text-center">
                                   Changer la photo de profile
                                    </span>
                                </div>
                            </a>
                        </label>
                        </div>
                    
            </div>
        </div>
           
            <div class="col-md-10">
                <input class="form-control form-control" name="image" id="image-profile" type="file" hidden>
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('image') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
       
<!-- user name -->
<div class="col-8">
    <div class="row">
        <div class="col-12">
            <label for="name" class="form-label lbl-clr">Username <span class="text-danger">*</span></label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input class="form-control input-form" value="{{$profile->user->name}}" name="name" id="name" required >
    </div>
</div> 
<div class=" offset-md-2 col-md-10 text-danger">
    @foreach ($errors->get('name') as $error)
        {{"*".$error."*"}}
    @endforeach
</div>
</div>


<!--email -->

<div class="col-8">
    <div class="row">
        <div class="col-12 mt-2">
            <label for="email" class="form-label lbl-clr">Email <span class="text-danger">*</span></label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input class="form-control input-form" value="{{$profile->user->email}}" name="email" id="email" required >
    </div>
</div> 
<div class=" offset-md-2 col-md-10 text-danger">
    @foreach ($errors->get('email') as $error)
        {{"*".$error."*"}}
    @endforeach
</div>
</div>
        <!--Description-->

     
        <div class="col-8 mt-2">
            <div class="row">
                <div class="col-12">
                    <label for="description" class="form-label lbl-clr">Description <span class="text-danger">*</span></label>
                </div>
            </div> 
    
        <div class="row mt-2">
            <div class="col-12">
                <textarea class="form-control input-form scrollbar" rows="3" name="description"  placeholder="Description" required>{{$profile->description}}</textarea>  
            </div>
        </div> 
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('description') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>



  <!-- Adresse -->

  <div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="adresse" class="form-label lbl-clr">Adresse <span class="text-danger">*</span></label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
    <textarea class="form-control input-form" rows="3" name="adresse" value="{{$profile->adresse}}" placeholder="Adresse" required>{{$profile->adresse}}</textarea> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('adresse') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div>   


 <div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="telephone" class="form-label lbl-clr">Telephone <span class="text-danger">*</span></label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input type="tel" class="form-control input-form " name="telephone" value="{{$profile->telephone}}" placeholder="Telephone" required/> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('telephone') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div>   


  <!-- facebook -->

  <div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="facebook" class="form-label lbl-clr" >Facebook url </label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input type="text" class="form-control input-form" name="facebook" value="{{$profile->facebook}}" placeholder="Facebook Url"/> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('adresse') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div>   
   
    
   <!-- github -->

   <div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="github" class="form-label lbl-clr">GitHub url </label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input type="text" class="form-control input-form" name="github" value="{{$profile->github}}" placeholder="Github Url"/> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('adresse') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div>  

<!--linkedin-->
 <div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="linkedin" class="form-label lbl-clr" >Linkedin Url </label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input type="text" class="form-control input-form " name="linkedin" value="{{$profile->linkedin}}" placeholder="Linkedin Url"/> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('adresse') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div> 


<!--linkedin-->
<div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="password" class="form-label lbl-clr" >Password</label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input type="password" class="form-control input-form " name="password" id="password" required placeholder="Password"/> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('adresse') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div> 


 <!--linkedin-->
<div class="col-8 mt-3">
    <div class="row">
        <div class="col-12">
            <label for="new-password" class="form-label lbl-clr" >Noveaux password</label>
        </div>
    </div> 

<div class="row mt-2">
    <div class="col-12">
        <input type="password" class="form-control input-form " name="new_password" id="new-password"  placeholder="Password"/> 
    </div>
</div> 
<div class=" row text-danger">
    <div class="col-12">
    @foreach ($errors->get('adresse') as $error)
    {{"*".$error."*"}}
    @endforeach
</div>
</div>
 </div> 






    <div class="row mb-5 mt-5">
        <div class="offset-2 ">
            <button  type="submit" class="col-4 btn btn-clr " >Modifier</button>
        </div>
    </div>



</div>
</div>




 
  </div>  
</form>
</div>



@endsection





