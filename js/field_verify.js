function field_verify(id, v){
	var sign = _(id);
	var modal_head = _('modal_head');
	if(v == 1){
		modal_head.style.color = '#fff';
		sign.classList.remove("bg-danger");
		sign.classList.add("bg-success");
	}else{
		modal_head.style.color = '#fff';
		sign.classList.remove("bg-success");
		sign.classList.add("bg-danger");
	}
}