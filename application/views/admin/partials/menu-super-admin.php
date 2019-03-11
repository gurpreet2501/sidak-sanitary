<ul class="nav navbar-nav">
    <li class="">
      <a href='<?=site_url('/super_admin/index')?>'>Dashboard</a> 
    </li>
    <li class="">
      <a href='<?=site_url('/super_admin/add_party')?>'>Add Parties</a> 
    </li>

    <li class="">
      <a href='<?=site_url('/super_admin/create_bill')?>'>Create Bill</a> 
    </li>

    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=site_url('/super_admin/add_items')?>">Manage Items</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?=site_url('/super_admin/add_category')?>">Add Item Category</a></li>
            <li><a href="<?=site_url('/super_admin/add_colors')?>">Add Item Colors</a></li>
          </ul>
        </li>
</ul>
