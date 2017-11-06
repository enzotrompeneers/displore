export class Dropdown
{
	constructor()
	{
		this.dropdown = document.getElementsByClassName("dropdown-holder");

		document.onclick = this.closeDropdown.bind(document, this.dropdown);

		for(let dropdownIndex = 0; dropdownIndex < this.dropdown.length; dropdownIndex++)
		{
			let dropdownButton = this.dropdown[dropdownIndex].getElementsByClassName("dropdown")[0];
			let dropdownMenu = this.dropdown[dropdownIndex].getElementsByClassName("dropdown-menu")[0];
			dropdownButton.onclick = this.openDropdown.bind(dropdownMenu, dropdownMenu);
		}

		
	}

	openDropdown(dropdownMenu)
	{
		dropdownMenu.classList.add("visible");
	}

	closeDropdown(dropdown)
	{
		if(event.srcElement.classList.contains("dropdown"))
		{
			return;
		}

		for(let dropdownIndex = 0; dropdownIndex < dropdown.length; dropdownIndex++)
		{
			let dropdownMenu = dropdown[dropdownIndex].getElementsByClassName("dropdown-menu")[0];

			if(dropdownMenu.classList.contains("visible"))
			{
				dropdownMenu.classList.remove("visible");
			}
		}
	}


}

new Dropdown();