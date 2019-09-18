// alert success
const flashSuccess = $('.success').data('success');
console.log(flashSuccess);
if (flashSuccess) {

	const Toast = Swal.mixin({
		toast: true,
		width : 300,
		position: 'top',
		showConfirmButton: false,
		timer: 5000
	})

	Toast.fire({
		type: 'success',
		title: flashSuccess + ' successfully'
	})
}


// alert custom
const flasCus = $('.cus').data('cus');
console.log(flasCus);
if (flasCus) {

	const Toast = Swal.mixin({
		toast: true,
		width : 300,
		position: 'top',
		showConfirmButton: false,
		timer: 5000
	})

	Toast.fire({
		type: 'warning',
		title: flasCus 
	})
}





// alert error
const flashErr = $('.err').data('err');
console.log(flashErr);
if (flashErr) {

	const Toast = Swal.mixin({
		toast: true,
		width : 300,
		position: 'top',
		showConfirmButton: false,
		timer: 5000
	})

	Toast.fire({
		type: 'error',
		title:'Error' + flashErr 
	})
}


// alert hapus

$('.del-btn').on('click', function (e) {
	const href = $(this).attr('href');
	e.preventDefault();

	Swal.fire({
		title: 'Are you sure?',
		text: "Maybe this data is related to other data!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href
		}
	})

});