@section('style')
	<link rel="stylesheet" href="<?=BASE_LAYOUT?>datepicker/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="<?=BASE_LAYOUT?>datepicker/css/bootstrap-daterangepicker.css">
	<style>
		.hrow-gap1{
			margin: 20px 0px 0px 0px;
		}
		.hrow-gap2{
			margin: -30px 0px 0px 0px;
		}
		.hrow-gap3{
			margin: -30px 0px 0px 0px;
		}

		hanzmobview{
			display: inline;
		}
		@media screen and (max-width: 1024px){
			hanzmobview{
				display: none;
			}
			.art-one{
				padding: 10px;
			}
		}
		
		.daterangepicker {
			z-index: 9999999999;
		}
	</style>
@endsection