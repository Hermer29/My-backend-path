const button = document.querySelector("button");
const body = document.querySelector("body");
let colorToggle = true;

button.onclick = () =>
{
	if(colorToggle)
	{
		body.style.backgroundColor = "black";
		body.style.color = "white";
		button.textContent = "light theme";
	}
	else
	{
		body.style.backgroundColor = "white";
		body.style.color = "black";
		button.textContent = "dark theme";
	}
	colorToggle = !colorToggle;
}