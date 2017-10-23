export class Modal{

	constructor(modal_id, title, description){
		this.modal = document.getElementById(modal_id);

		this.title = title;
		this.description = description;

		this.setContent();
	}

	setContent()
	{
		this.modal.getElementsByClassName("modal-title-text")[0].innerHTML = this.title;
		this.modal.getElementsByClassName("modal-content")[0].innerHTML = this.description;
	}

	show()
	{
		this.modal.parentNode.style.display = "block";
	}
	
}