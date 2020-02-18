<div class="row">
	<div class="col-md-12">
		<h3 class="cus-color">Contact Us</h3>
		<hr>

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			@if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif
			<form class="form-horizontal cus-form" action="{{route('contactus.store')}}" method="POST">
				{{csrf_field()}}
			  <div class="form-group">
				<label class="control-label col-sm-3" for="name">First Name *</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control required" name="first_name" value={{old('first_name')}}>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3" for="name1">Last Name *</label>
				<div class="col-sm-9"> 
				  <input type="text" class="form-control required" name="last_name" value={{old('last_name')}}>
				</div>
			  </div>
			   
			  
			  <div class="form-group">
				<label class="control-label col-sm-3" for="Email">Email *</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control required" name="email" value={{old('email')}}>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3" for="Phone">Phone * ( include area code )</label>
				<div class="col-sm-9"> 
				  <input type="text" class="form-control required" name="phone" value={{old('phone')}}>
				</div>
			  </div>
			   
			  <div class="form-group">
				<label class="control-label col-sm-3" for="Additional">Message *</label>
				<div class="col-sm-9"> 
				  <textarea name="message" class="wpcf7-form-control  wpcf7-textarea required" cols="10">{{old('message')}}</textarea>
				</div>
			  </div>
			   
			  <div class="form-group"><div class="col-md-12"><p>mandatory field *</p></div></div>
			  <div class="form-group"> 
				<div class="col-sm-12">
				  <button type="submit" class="btn btn-primary">Send</button>
				</div>
			  </div>
			</form>
	</div>
</div>
</div>	