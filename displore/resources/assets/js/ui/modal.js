export class Modal{

	constructor(modal_id, title, description, hooks){
		this.modal = document.getElementById(modal_id);

		this.title = title;
		this.description = description;
		this.hooks = hooks

		this.modalCloseButton = document.getElementById("modal-close");
		this.modalOverlay = this.modal.parentNode;

		this.modalCloseButton.onclick = this.hide.bind(this.modalOverlay, this.modalOverlay, this.hooks.onHide);
		this.modalOverlay.onclick = this.hide.bind(this.modalOverlay, this.modalOverlay, this.hooks.onHide);

		this.setContent();
	}

	setContent()
	{
		this.modal.getElementsByClassName("modal-title-text")[0].innerHTML = this.title;
		this.modal.getElementsByClassName("modal-content")[0].innerHTML = this.description;

		if(this.hooks.onLoad !== null)
		{
			this.hooks.onLoad();
		}
	}

	hide(modalOverlay, hideHook)
	{
		event.preventDefault();
		modalOverlay.style.display = "none";
		hideHook();
	}

	show()
	{
		this.modalOverlay.style.display = "block";
		this.hooks.onShow();
	}
	
}