<div class="action-product">
<span class="table-icon">
    <a href="{{route('admin.service.edit', $id)}}" onclick="">
        <i class="fa fa-pencil text-primary font-size-18" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
    </a>
</span> 
<span class="table-icon">
    <form method="POST" action="{{ route('admin.service.destroy', $id) }}" style=" display: inline-block;">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash font-size-18"></i></button>
    </form>
</span>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>