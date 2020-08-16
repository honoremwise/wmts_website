 <!-- Start Slider -->
 <section id="mu-slider">
 <?php $cond = array('status' =>'Active','categ_id'=>'10'); ?>
 <?php $sliders = App\Article::select('id','art_content')->where($cond)->first(); ?>
 <?php  ?>
 <?php if (!empty($sliders)): ?>
   <?php $photosliders=App\Article::find($sliders['id'])->photos()->where('photo_status','Active')->get(); ?>
   <?php foreach ($photosliders as $value): ?>
     <?php $name=$value->photo_name; ?>
     <div class="mu-slider-single">
       <div class="mu-slider-img">
         <figure>
           <img src="{{asset('images/'.$name)}}" alt="">
         </figure>
       </div>
       <div class="mu-slider-content">
         <?php $id=$value->id; ?>
         <h4><?php $get_caption=DB::table('photos')->where('id',$id)->value('caption')?>
         {{$get_caption}}
         </h4>
         <span></span>
         <h2>Education For Everyone</h2>
         <p> <?php $get_title=DB::table('articles')->where('id',$id)->value('title')?>
         {{$get_title}} </p>
         <a href="#" class="mu-read-more-btn"><?php $get_id=DB::table('articles')->where('id',$id)->value('id')?>
         {{$get_id}} </a>
       </div>
     </div>
   <?php endforeach; ?>
 <?php else: ?>

 <?php endif; ?>

  </section>
  <!-- End Slider -->
