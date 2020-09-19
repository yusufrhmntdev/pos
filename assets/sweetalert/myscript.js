// $('#username').on('submit',function(e){
//   e.preventDefault();
//   const href = $(this).attr('href');
//   Swal.fire({
//       title: 'Are you sure you want to delete this data?',
//       text: "",
//       icon: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//       if (result.value) {
//           document.location.href = href;
        
//       }
//     })
// });
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure you want to delete this data?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
          
        }
      })
});