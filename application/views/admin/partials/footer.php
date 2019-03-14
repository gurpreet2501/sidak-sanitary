<?php $cacheVer = rand(1,10000); ?>     
            </div>
            <!-- /.container-fluid -->

        <div class="spacer-100"></div>
        </div>
        <!-- /#page-wrapper -->

    </div>  
    <!-- /#wrapper -->

    <!-- jQuery -->
<script type="text/javascript">
   window.for_js = {};
      <?php if(isset($for_js)): ?> 
        window.for_js = <?=json_encode($for_js)?>; 
      <?php endif; ?>
      function v(key,_default){
        if(window.for_js[key])
          return window.for_js[key];
        return _default;
      }
</script>

 <script src="<?=base_url('env.js?v='.$cacheVer);?>"></script> 
 <script src="<?=base_url('assets/js/env-support.js?v='.$cacheVer);?>"></script> 
<script
        src="https://code.jquery.com/jquery-3.2.0.min.js"
        integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
        crossorigin="anonymous"></script>

 
 <script src="<?=base_url('assets/js/mousetrap.min.js?v='.$cacheVer);?>"></script>
 <script src="<?=base_url('assets/js/ctrl-q-click.js?v='.$cacheVer);?>"></script>

 <script src="<?=base_url('assets/js/bootstrap.min.js?v='.$cacheVer);?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/chosen.jquery.js?v='.$cacheVer)?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/select2.js?v='.$cacheVer)?>"></script>

 <script type="text/javascript" src="<?=base_url('assets/js/jquery-validate.js?v='.$cacheVer)?>"></script>

 <script type="text/javascript" src="<?=base_url('assets/js/vue.min.js?v='.$cacheVer)?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/vue-select.js?v='.$cacheVer)?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/app.js?v='.$cacheVer)?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/vex.combined.min.js?v='.$cacheVer)?>"></script>
 <script type="text/javascript">
  function getBaseUrl(){
    return <?=json_encode(site_url())?>;
  }
 </script>
 <?php if($this->config->item('auto_logout')): ?>
   <script type="text/javascript" src="<?=base_url('assets/js/auto-logout.js?v='.$cacheVer)?>"></script>
<?php endif; ?>

 <?php  if(isset($js_files)): ?>
  <?php  foreach($js_files as $js_file): 
      if(strstr($js_file,'jquery-1.11.1.min.js')){
        continue;
      }
  ?>
    <script type="text/javascript" src="<?=at($js_file).'?v='.$cacheVer?>"></script>
  <?php endforeach; ?>
<?php endif;?>
 <script type="text/javascript" src="<?=base_url('assets/js/party-name-pop-up.js?v='.$cacheVer)?>"></script>

<script type="text/javascript">
jQuery(function(){
    
  $('form.validate').each(function(){
    $(this).validate();
  });
  
  // $('.account_selector').select2('open');

  //If value selected in chosen file. Then hide the enter_party box

  $(".chosen-select").chosen().change(function(key,val) {
   
  });

  //Remove Party/ phone and address fields on party select when party already exists
  
  $("#party_dd").chosen().change(function(key,val) {
    if(val.selected.length)
        $('.hide_party_info').hide();  
  });

  var d = new Date();

  $("._datepicker" ).datepicker({ 
      defaultDate:d,
      maxDate: "+0D",
      dateFormat: 'yy-mm-dd', 
      yearRange: '1960:'+d.getFullYear(),
   });
})
</script>
<!-- Hiding the domestic usertype column when export customer is added  -->
<script>
  function goBack() {
      window.history.back();
  }
</script>

<div style='height:20px;'></div>  
</body>
</html>

