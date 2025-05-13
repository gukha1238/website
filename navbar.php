<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url()?>">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url()?>">Home</a>
        </li>
        
       </ul>
	   
	   
	   <ul class="navbar-nav mb-2 mb-lg-0">
	   <?php $session=session(); ?>
	   <?php if($session->loginned=="loginned"): ?>
	   
	   <li class="nav-item">
          <a class="nav-link active"
		  aria-current="page"
		  href="<?=base_url()?>/<?=$session->user_type=="user"?"user_dashboard":"user_dashboard"?>">
		   <?=ucfirst($session->username)?></a>
		  </li>
		  
        <li class="nav-item">
          <a class="nav-link active"
		  aria-current="page"
		  href="<?=base_url()?>/logout">
		  logout</a>
		  </li>
		  <?php else: ?>
		  <li class="nav-item">
          <a class="nav-link active"
		  aria-current="page"
		  href="<?=base_url()?>/login">
		  <i class="bi bi-person-fill-add"></i>Login</a>
		  </li>
		  <?php endif ?>
       
      </ul>
      
    </div>
  </div>
</nav>