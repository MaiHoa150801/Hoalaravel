@extends('matter');
@section('content');
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wapper">
											<div class="ribbon sale">Sale</div>
										</div>
										<div class="single-item-header">
											<a href="/chitietsp/{{$new->id}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price" style="font-size: 18px;">
											@if($new->promotion_price==0)
											<span  class="flash-sale">{{number_format($new->unit_price)}} đồng</span>
											@else
												<span  class="flash-del">{{number_format($new->unit_price)}} đồng</span>
												<span  class="flash-sale">{{number_format($new->promotion_price)}} đồng</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="/add-to-cart/{{$new->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="/chitietsp/{{$new->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach	
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content');