jQuery(function($){

  window.BILLING_FORM = new Vue({
  el: '#billing_form',
  data: {
   items_count:2,
   allItems:v('allItems')
  },
  computed: {
    
  },
  methods:{
    addNewItem:function(){
      this.items_count++;
      setTimeout(function() { $(".chosen-select").chosen().trigger("chosen:updated"); }, 100);
      
    }
  }
})
});