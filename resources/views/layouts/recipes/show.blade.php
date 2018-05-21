<!doctype html>
<html lang="{{ app()->getLocale() }}">
   
<head>
      @include('inc/head')

</head>
<body>
     
    @include('inc/navbar')
    
    @if( is_null($recipes) )
            <div class="col-md-6 offset-3">
            <h1 class="alert alert-danger text-center">
                This recipe doesn't exist
            </h1> 
            </div>
    @else
           <div class="row">
                <div class="col-sm-9">
                    <h1> {{ $recipes->title }} </h1>
                    
                       @if( isset($recipes['image']) )
                        
                            <div class="container">
                               <img src="{{ asset('image/'.$recipes->image) }}" alt="Image" class="img-fluid"  style=" max-height:400px; width: auto;" >  
                            </div> 
                        @endif
                        
                       
                    <p> {{ $recipes->description }} </p> 
                </div> 
                <div class="col-sm-3">
                   <div class="well">

                        <div class="col-sm-9">
                                  {!! Html::linkRoute('recipes.edit', 'Edit', array($recipes->id), array('class'=>'btn btn-primary btn-block') ) !!}
                                  <br>    
                        </div>
                        
                        <div class="col-sm-9">
                                {!! Form::open( ['route' => ['recipes.destroy', $recipes->id], 'method' => 'DELETE'] ) !!}
                                    
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
                                  
                                {!! Form::close()!!}
                                  
                        </div>

                        <div class="col-sm-9">
                            @if(!$favorite_recipes->contains('recipe_id', -1))
                                        @if($favorite_recipes->contains('recipe_id', $recipe->id))
                                            <a href="{{route('recipes.make_fav', $recipe->id)}}" class='btn btn-default btn-sm'> Mark as favorite <i class="fas fa-star"></i> </a>
                                        @else
                                            <a href="{{route('recipes.make_fav', $recipe->id)}}" class='btn btn-default btn-sm'> Delete from favorite <i class="far fa-star"></i> </a>
                                        @endif
                            @endif
                        </div>

                   </div>
                </div>
            </div>
             
            <div class="row">
                <div class="col-sm-6">
                    <h5>Created at : </h5>
                    <p>{{ date('M j, Y', strtotime($recipes->created_at)) }}</p>
                </div>
                <div class="col-sm-6">
                    <h5>Updated at : </h5>
                    <p>{{ date('M j, Y', strtotime($recipes->updated_at)) }}</p>
                </div>  
            </div>
    @endif
    
    

<footer> @include('inc/footer') </footer>   
</body>
</html>
