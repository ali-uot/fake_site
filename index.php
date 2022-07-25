<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<link href="css/fake.css" rel="stylesheet" id="bootstrap-css">
<title>استمارة حجب المواقع الالكترونية</title>
<link rel="shortcut icon" href="images/logo.png" />
<style>
body{
    font-family: 'Droid Arabic Kufi', sans-serif;
	background:#c3c4d56b;
}
#logo{
	margin-top:20px;
	width:130px;
}
#copyright{
	margin-top:30px;
}
.form-control{
    text-align: right;
    direction:rtl;
}
.register-heading{
	font-weight:bold;
}
h3{
	font-weight:bold;
}
.form-group{
	margin-bottom:5px;
}
.my_btn{
	margin-top:10px;
}
</style>
</head>
<body>
<div class="container register" dir="">
	<div class="row">
		<div class="col-md-3 register-left">
			<img src="images/lo.gif" alt=""/>
			<h3>مرحباً بكم</h3>
			<p>يرجى ملء استمارة حجب الموقع الالكتروني و ارسالها ليتسنى لنا ابلاغ اللجنة العليا الوطنية للامن الالكتروني ومكافحة خطاب الكراهية</p>
			<input type="submit" name="" value="الشروط"/><br/>
		</div>
		<div class="col-md-9 register-right">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				
					<div class="row">
						<div class="col-md-2 offset-md-9 col-2 offset-8">
							<img src="images/lo.gif" id="logo"/>
						</div>
					</div>
					
					<h3 class="register-heading" style="margin-top:0px;">استمارة حجب المواقع الالكترونية</h3>
					<div class="row register-form">
					
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" id="dept_name" class="form-control" placeholder="اسم التشكيل" value="" />
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control" id="site_type">
									<option class="hidden"  selected disabled>نوع الموقع المراد حجبه</option>
									<option>موقع الكتروني (Website)</option>
									<option>صفحات على مواقع التواصل الاجتماعي</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" id="reason">
									<option class="hidden"  selected disabled>اسباب حجب الموقع</option>
									<option>ارهابي او مروج للارهاب</option>
									<option>خطاب كراهية</option>
									<option>انتحال شخصية او صفة مؤسسة حكومية</option>
									<option>الابتزاز و القذف و التشهير</option>
									<option>اخرى</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" id="phone" minlength="11" maxlength="11" class="form-control" placeholder="رقم الهاتف" value="" />
							</div>
							<div class="form-group">
								<input type="email" id="email" class="form-control" placeholder="البريد الالكتروني" value="" />
							</div>
							
							
						</div>
						

						<div class="col-md-12">
							<div class="form-group">
								<input type="text" id="site_link" class="form-control" placeholder="رابط الموقع" value="" />
							</div>
						</div>


						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" onclick="send();" class="btn btn-primary w-100 my_btn"  value="ارسال المعلومات"/>
							</div>
						</div>
						<div class="col-md-12" id="copyright">
							&copy; Mustansiriyah University Alright reserved
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	
	<div class="modal fade mod_marg" id="warning" role="dialog" dir="rtl">
			<div class="modal-dialog">
					<div class="modal-content">
							<div class="modal-header bg-danger" id="modal_head">
									<h5 class="modal-title" id="dialog_title"></h5>
							</div>
							<div class="modal-body" style="text-align:right;">
								<p id="dialog_content"></p>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary pull-right" data-bs-dismiss="modal">اغلاق</button>
							</div>
					</div>
			</div>
	</div>
	
<script>
function _(el){
	return document.getElementById(el);
}
var dialog_title = _('dialog_title');
var dialog_content = _('dialog_content');
</script>
<script>
function send(){
	var site_link = _('site_link').value;
	var dept_name = _('dept_name').value;
	var phone = _('phone').value;
	var email = _('email').value;
	var site_type = _('site_type').value;
	var reason = _('reason').value;
	if(site_link.length>3 && dept_name.length>3 && phone.length>10 && email.length>3 && site_type.length>3 && reason.length>3){
		var formdata = new FormData();
		formdata.append("site_link", site_link);
		formdata.append("dept_name", dept_name);
		formdata.append("phone", phone);
		formdata.append("email", email);
		formdata.append("site_type", site_type);
		formdata.append("reason", reason);
		var ajax = new XMLHttpRequest();
		ajax.addEventListener("load", completeSend, false);
		ajax.open("POST", "send.php");
		ajax.send(formdata);
	}else{
		field_verify('modal_head', 0);
		dialog_title.innerHTML = "تنبيه !";
		dialog_content.innerHTML = "يجب ملء جميع الحقول";
		$('#warning').modal('show');
	}
}
function completeSend(event){
	var s = event.target.responseText;
	var res = JSON.parse(s);
	var error = Number(res[0].error);
	if(error == 0){
		field_verify('modal_head', 1);
		dialog_title.innerHTML = res[0].message_title;
		dialog_content.innerHTML = res[0].error_message;
		$('#warning').modal('show');
	}else{
		field_verify('modal_head', 0);
		dialog_title.innerHTML = res[0].message_title;
		dialog_content.innerHTML = res[0].error_message;
		$('#warning').modal('show');
	}
}
</script>
<script src="js/field_verify.js"></script>
</div>
</body>