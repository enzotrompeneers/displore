export class FileUpload{

	constructor()
	{
		this.fileupload = document.getElementsByClassName("file-upload-holder");

		if(this.fileupload === null){
			return;
		}

		this.events();
	}

	showInformation(label, input)
	{
		label.innerHTML = "Je hebt " + input.files.length + " afbeeldingen geupload";
	}

	events()
	{
		for(let fileUpload = 0; fileUpload < this.fileupload.length; fileUpload++)
		{
			let input = this.fileupload[fileUpload].children[1];
			let label = this.fileupload[fileUpload].children[0];

			input.onchange = this.showInformation.bind(input, label, input);
		}
	}
}

new FileUpload();
