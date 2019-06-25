
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  
  <!--/ Form Search End /-->

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      
      <a class="navbar-brand text-brand" href="<?php echo e(route('home')); ?>"><img style="max-width:80px;" src="<?php echo e(asset(\App\Model\SiteSetting::latest()->value('logo'))); ?>" alt=""></a>
     
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.html">Program</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Nutrition</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="property-grid.html">Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog-grid.html">Podcast</a>
          </li>
          
        </ul>
      </div>
      <div id="text-6" class="widget widget_text">
              <div class="textwidget">
                  <a href="/my-account-fitness" class="social_user">User</a>
                  <a href="/login/" class="social_user">User<span class="glyphicon glyphicon-user"></span></a>
                  <a href="/cart" class="social_cart">Cart<span class="glyphicon glyphicon-shopping-cart"></span></a>
               
              </div>

            </div>
      
    </div>
  </nav>
  <!--/ Nav End /--><?php /**PATH /var/www/html/ta2workout/resources/views/web/layouts/header.blade.php ENDPATH**/ ?>