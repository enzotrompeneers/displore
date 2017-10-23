export class Image{

	constructor(){
		this.image = document.getElementsByClassName("image-overlay");
		this.imageDelete = document.getElementsByClassName("image-delete");


		for(let imageIndex = 0; imageIndex < this.image.length; imageIndex++)
		{
			this.image[imageIndex].addEventListener('click', this.delete, false);
			this.imageDelete[imageIndex].addEventListener('click', this.delete, false);
		}
		
	}

	delete(event){
		let image = event.target;

		if(image.className === "image-delete"){
			image = event.target.parentNode;
		}

		axios.post('/afbeelding/verwijderen/' + image.dataset.id, {
			"_method": "DELETE"
		});

		image.parentNode.remove();
	}

}

new Image();