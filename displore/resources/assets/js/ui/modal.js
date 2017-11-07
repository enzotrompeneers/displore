export class Modal{

	constructor(modal_id, title, description, hooks){
		this.modal = document.getElementById(modal_id);

		this.title = title;
		this.description = description;
		this.hooks = hooks;

		this.modalCloseButton = document.getElementById("modal-close");
		this.modalOverlay = this.modal.parentNode;

		if(this.hooks.onHide === undefined){
			this.modalCloseButton.onclick = this.hide.bind(this.modalOverlay, this.modalOverlay);
			this.modalOverlay.onclick = this.hide.bind(this.modalOverlay, this.modalOverlay);
		}else{
			this.modalCloseButton.onclick = this.hide.bind(this.modalOverlay, this.modalOverlay, this.hooks.onHide);
			this.modalOverlay.onclick = this.hide.bind(this.modalOverlay, this.modalOverlay, this.hooks.onHide);
		}
		

		this.setContent();
	}

	setContent()
	{
		this.modal.getElementsByClassName("modal-title-text")[0].innerHTML = this.title;
		this.modal.getElementsByClassName("modal-content")[0].innerHTML = this.description;

		if(this.hooks.onLoad !== undefined)
		{
			this.hooks.onLoad();
		}
	}

	hide(modalOverlay, hideHook)
	{
		event.preventDefault();
		modalOverlay.style.display = "none";

		if(hideHook !== undefined)
		{
			hideHook();
		}
		
	}

	show()
	{
		this.modalOverlay.style.display = "block";

		if(this.hooks.onShow !== undefined)
		{
			this.hooks.onShow();
		}
		
	}
	
}