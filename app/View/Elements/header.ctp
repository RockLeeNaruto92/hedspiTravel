<div class="header_resize">
  <div class="searchform">
    <?php echo $this->element("search_form"); ?>
  </div>
  <div class="logo">
    <img src="/images/logo.jpg" width=167>
  </div>
  <div class="clr"></div>
  <div class="menu_nav">
    <ul>
      <li class="<?php if ($this->params['controller'] == 'tours' && $this->params['action'] != 'book') echo 'active';?>">
        <a href="/tours/">
          <span>Home Page</span>
        </a>
      </li>
      <li class="<?php if ($this->params['controller'] == 'statics' && $this->params["action"] == "support") echo 'active';?>">
        <a href="#">
          <span>Support</span>
        </a>
      </li>
      <li class="<?php if ($this->params['controller'] == 'statics' && $this->params["action"] == "about") echo 'active';?>">
        <a href="#">
          <span>About us</span>
        </a>
      </li>
      <li class="<?php if ($this->params['controller'] == 'tickets' && $this->params["action"] == "book") echo 'active';?>">
        <a href="#">
          <span>Book tickets</span>
        </a>
      </li>
      <li class="<?php if ($this->params['controller'] == 'statics' && $this->params["action"] == "contact") echo 'active';?>">
        <a href="#">
          <span>Contact us</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="clr"></div>
  <div class="slider">
    <?php echo $this->element("slider"); ?>
  </div>
  <div class="clr"></div>
</div>
